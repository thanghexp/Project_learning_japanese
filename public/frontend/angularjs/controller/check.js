/**
 * Created by thanghepxp on 29/04/2016.
 */
angularjs.controller("JlptTestController", function($scope, $routeParams, $http) {
    $scope.title = 'Luyện thi JLPT N1 -> N5';
    $http.get(base_url + "chude/json_result_jspt")	
	    .then(function(response) { 
	        //First function handles success
	        $scope.lessionJLPT = response.data;
	    }, function(response) {
	        //Second function nhandles eror
	     	$scope.lessionJLPT = 'Wrong';
	    });    

    $scope.selectTabJLPT = function(id_bai) {
        $scope.isFlashCard = false;
        $('.item-subleft-menu').removeClass('item-subleft-menu-active');
        $('.itemLesson' + id_bai).addClass('item-subleft-menu-active');

        $scope.isTest = true;
        $scope.buttonDisabled = false;

        $scope.showTest = false;
        $scope.showNext = 0;
        $('.select-alphabet').css({"left":"150%"});
        $('.item-test-alphabet').css({"left" : "0%"});

        

        $scope.size = 0;
        $http.get(base_url + "cauhoi/json_count_cauhoi/" + id_bai)
                .then(function(response) {
                    $scope.size = response.data;

                }, function(response) {
                    $scope.size = "Something went wrong ";
            });

        $scope.trueAnswer = 0;

        // GET JSON CAUHOI 
        var index = 0;
        var id  = null;
        var array_chose_answer = [];
        var array_chose_result = [];
        var array_chose_clicked = [];

        $http.get(base_url + "cauhoi/json_data_cauhoi_test/" + id_bai )
            .then(function(response) {
                $scope.questions = response.data[index].noidung;
                $scope.ids = response.data[index].id;
                if($scope.questions == null) {
                    $scope.showNext = 3;
                }

                $http.get(base_url + "cauhoi/dapan/json_data_dapan?id_cauhoi=" + $scope.ids)
                    .then(function(response) {
                        $scope.answers = response.data;
                        $scope.id = response.data[index].id;
                        var i= 0;
                        $scope.chooseAnswer = function(idx, result, id) {
                            i++;
                            array_chose_answer[i] = $scope.ids; // id cau hoi
                            array_chose_result[i] = result; // result true / false
                            array_chose_clicked[i] = idx; // box that me clicked
                            
                           

                            // $(".item-content-alphabet div:first").show();

                            $('.card-choice' ).removeClass('box-choice');
                            $('.testjlpt' + idx).addClass('box-choice');
                            // alert();

                            // $scope.showTest = 1;`
                            $scope.buttonDisabled = true;
                            
                             $scope.checkTest = function() {
                                // alert(idx);
                                // alert(result);
                                if(result == 1) {
                                    var trueAns = $scope.trueAnswer++; 
                                    $(".progress-bar").animate({width: $scope.trueAnswer / $scope.size * 100 + "%"}, 100);
                                    $('.box-notify-correct').addClass('box-notify-show');

                                    $scope.finish = function() {
                                        // $scope.trueAns = trueAns;
                                        $('.box-notify').removeClass('box-notify-show');
                                        $(".finish-test-jlpt").fadeIn(3e3)
                                        $scope.showNext = 3;
                                        
                                        for(var j=1; j < array_chose_answer.length; j ++) {
                                            // alert(array_chose_clicked[j]);
                                            var k = 0;
                                             $http.get(base_url + "cauhoi/json_data_cauhoi_row/" + array_chose_answer[j] )
                                                .then(function(response) {
                                                    // k++;
                                                    $scope.questions = response.data;
                                                    $scope.ids = response.data.id;

                                                    $http.get(base_url + "cauhoi/dapan/json_data_dapan?id_cauhoi=" + $scope.ids)
                                                        .then(function(response) {
                                                            // k = 0;
                                                            $scope.answers = response.data.dapan;
                                                            // $scope.id = response.data[index].id;

                                                            // alert($scope.questions);
                                          
                                                            // $scope.showNext = 0;

                                                        }, function(response) {
                                                            $scope.answers = "Something went wrong ";
                                                    });

                                                }, function(response) {
                                                    $scope.questions = "Something went wrong ";
                                            });
                                        }

                                       

                                    }

                                    $scope.refresh = function() {
                                            $scope.isTest = true;
                                            $scope.showTest = false;              
                                            $scope.buttonDisabled = false;
                                            $scope.showNext = 0;
                                        $(".box-notify").removeClass("box-notify-show"), $(".finish-test-jlpt").hide(), $(".item-test-alphabet div:first").animate({left: "-150%"}, 350, function() {
                                            $('.select-alphabet').css({"left":"0%"});
                                            $('.item-test-alphabet').css({"left" : "150%"});
                                        });                     

                                        $scope.trueAnswer = 0;
                                        index = 0;                   
                                    }        

                                } else {
                                    $('.box-notify-fails').addClass('box-notify-show');
                                }
                                $scope.showNext = 1;
                                    $scope.buttonDisabled = false;
                            }
                        }

                    }, function(response) {
                        $scope.answers = "Something went wrong ";
                });

            }, function(response) {
                $scope.questions = "Something went wrong ";
        });

                $scope.next = function() {
                    
                    index ++ ;
                    if(index >= $scope.size) {
                            $scope.showNext = 2;

                    } else {
                            $('.card-choice' ).removeClass('box-choice');
                            $('.box-notify').removeClass('box-notify-show');
                            // $(".box-notify").removeClass("box-notify-show");
                            $(".jlpt-test-item div:first").next().show();
                            $(".jlpt-test-item div:first").animate({left: "-150%"}, 300, function () {
                                $(this).css("left", "150%");
                                $(this).appendTo(".item-content-alphabet");
                                $(this).hide();
                            }), 
                            $(".jlpt-test-item div:first").next().animate({left: "0"}, 300);

                            $http.get(base_url + "cauhoi/json_data_cauhoi_test/" + id_bai )
                                .then(function(response) {
                                    $scope.questions = response.data[index].noidung;
                                    $scope.ids = response.data[index].id;

                                $http.get(base_url + "cauhoi/dapan/json_data_dapan?id_cauhoi=" + $scope.ids)
                                    .then(function(response) {
                                        $scope.answers = response.data;
                                        $scope.id = response.data[index].id;

                                        // alert($scope.questions);
                      
                                        $scope.showNext = 0;

                                    }, function(response) {
                                        $scope.answers = "Something went wrong ";
                                });

                                }, function(response) {
                                    $scope.questions = "Something went wrong ";
                            });
                    }           
                }
            
                // $('.jlpt-test-item-1').css({"display": "block", "left": "0%"});
                // $('.jlpt-test-item-2').css({"display": "none", "left": "150%"});
    }
    
});