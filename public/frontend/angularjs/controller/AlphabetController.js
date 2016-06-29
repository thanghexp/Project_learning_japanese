angularjs.controller("AlphabetController", function($scope, $routeParams, $http, $timeout) {
     $scope.tabs = {0 : 'Hiragana', 1:  'Katakana', 2: 'Kiểm tra'};
     $scope.size = 0;
     $scope.trueAnswer = 0;

     $('.left-menu').attr('style', 'margin-top:12px');
     // $('.banner').addClass('hidden');

    $timeout( function () {
        $('.alphabet').addClass('active-menu-left');
        angular.element('.tabalphabet0').triggerHandler('click');

        $timeout( function () {
            angular.element('.code0').triggerHandler('click');
        }, 100);
    }, 100);


    var rs = null;
    var ans = null;
    var index = 0;
    var array_id = [];
    var size = 0;
    var x,y;

     $scope.changeType = function(key) {

         $scope.isTest = false;
         $scope.buttonDisabled = false;

     	$('.item-header').removeClass('item-header-active');
     	$('.tabalphabet'+key).addClass('item-header-active');


        // $(".item-content-alphabet div:first").next().hide();
        // $(".content-test-alphabet div:first").animate({left: "-150%"}, 350);

         	if(key == 2) {
                var id  = null;

                $scope.isTest = true;
                $scope.buttonDisabled = false;

                $scope.showTest = false;
                $scope.showNext = 0;

                $scope.testAlphabet = function(key) {
                  
                    $scope.showTest = true;
                    // alert();

                    $('.select-alphabet').css({"left":"150%"});
                    $('.item-test-alphabet').css({"left" : "0%"});

                    $scope.size = 0;
                    $http.get(base_url + "chucai/json_count_result")
                            .then(function(response) {
                                $scope.size = response.data;
                                size = $scope.size;

                            }, function(response) {
                                $scope.answers = "Something went wrong ";
                        });

                    $scope.trueAnswer = 0;
                    
                    
                    // index  = 0;
                    // GET JSON CAUHOI
                    var tam = 0;
                    $http.get(base_url + "chucai/json_data_chucai" )
                        .then(function(response) {
                            if( key == 'hiragana') {
                                $scope.questions = response.data[index].hiragana;
                            } else {
                                $scope.questions = response.data[index].katakana;
                            }
                            y = null;
                            y = response.data[index].id;
                            $scope.result = response.data[index].phatam;

                            for(var i =0; i<size; i++) {
                                array_id[i] =  response.data[i].id;
                            }
                            // GET JSON DAPAN
                            $http.get(base_url + "chucai/kiemtra/json_data_dapan/" + y)
                                .then(function(response) {
                                    $scope.answers = response.data;
                                    $scope.id = response.data[index].id;
                                }, function(response) {
                                    $scope.answers = "Something went wrong ";
                            });
                        }, function(response) {
                            $scope.questions = "Something went wrong ";
                    });

                    $('.item-test-alphabet-1').css({"display": "block", "left": "0%"});
                    $('.item-test-alphabet-2').css({"display": "none", "left": "150%"});

                    

                }

                $scope.chooseAnswer = function(idx, answer, result, event) {
                        rs = result;
                        ans = answer;
                        $(".item-content-alphabet div:first").show();

                        $('.card-choice' ).removeClass('box-choice');
                        $('.testAlphabet' + idx).addClass('box-choice');
                        // alert();

                        // $scope.showTest = 1;`

                        

                        $scope.buttonDisabled = true;
                    }

                    $scope.checkTest = function() {
                        if(rs == ans) {
                            var trueAns = $scope.trueAnswer++;
                            $(".progress-bar").animate({width: $scope.trueAnswer / $scope.size * 100 + "%"}, 100);
                            $('.box-notify-correct').addClass('box-notify-show');
                        } else {
                            $('.box-notify-fails').addClass('box-notify-show');
                        }
                        $scope.showNext = 1;
                        $scope.buttonDisabled = false;
                    }

                    $scope.benginTest = function() {
                        $scope.isTest = true;
                        $scope.showTest = false;
                        $scope.buttonDisabled = false;
                        $scope.showNext = 0;
                        $(".box-notify").removeClass("box-notify-show"), $(".finish-test-alphabet").hide(), $(".content-test-alphabet div:first").animate({left: "-150%"}, 350, function() {

                            
                            
                            $('.select-alphabet').css({"left":"0%"});
                        });
                    }

                    $scope.finish = function() {
                        // $scope.trueAns = trueAns;
                        $(".finish-test-alphabet").fadeIn(3e3)
                        $('.item-test-alphabet').css({"left" : "150%"});
                        $scope.showNext = 3;
                        index = 0;

                    }

                    $scope.next = function() {

                        $('.box-notify').removeClass('box-notify-show');

                        index ++ ;
                        if(index >= $scope.size) {                            
                            $scope.showNext = 2;

                        } else {
                            $(".box-notify").removeClass("box-notify-show");
                            $(".item-content-alphabet div:first").next().show();
                            $(".item-content-alphabet div:first").animate({left: "-150%"}, 100, function () {
                                $(this).css("left", "150%");
                                $(this).appendTo(".item-content-alphabet");
                                $(this).hide();
                            }),
                                $(".item-content-alphabet div:first").next().animate({left: "0"}, 300);

                            $timeout( function () {
                                $http.get(base_url + "chucai/json_data_chucai/" + array_id[index] )
                                    .then(function(response) {
                                        if( key == 'hiragana') {
                                            $scope.questions = response.data[0].hiragana;
                                        } else {
                                            $scope.questions = response.data[0].katakana;
                                        }
                                        x = null;
                                        x = response.data[0].id;
                                        $scope.result = response.data[0].phatam;

                                        $http.get(base_url + "chucai/kiemtra/json_data_dapan/" + x)
                                            .then(function(response) {
                                                $scope.answers = response.data;
                                                // $scope.id = response.data[index].id;
                                                $scope.showNext = 0;
                                            }, function(response) {
                                                $scope.answers = "Something went wrong ";
                                            });

                                    }, function(response) {
                                        $scope.questions = "Something went wrong ";
                                    });
                            }, 100);
                        }


                    }

                

     	} else {
            if(key == 0 ) {
         		$scope.showKatakana = false;     
            }		
     		
     		if(key == 1 ) {  
     			$scope.showKatakana = true;                     
     		}  

             $scope.viewDetailAlphabet = function(id) {
                    $('.kana-item-alphabet').removeClass('item-alphabet-active');
                    $('.alphabet-content-item' + id).addClass('item-alphabet-active');
                    // GET JSON VIDU
                    $http.get(base_url + "chucai/vidu/json_data_vidu?id=" + id)
                    .then(function(response) {
                        //First function handles success
                        $scope.examples = response.data;
                    }, function(response) {
                        //Second function handles error
                        $scope.examples = "Something went wrong";
                    });

                    // GET JSON HINHANH
                    $http.get(base_url + "chucai/json_data_file_hinhanh/" + id)
                    .then(function(response) {
                        //First function handles success
                        $scope.hinhanh_kata = response.data.hinhanh_cachviet_katakana;
                        $scope.hinhanh_hira = response.data.hinhanh_cachviet_hiragana;

                        $scope.audio = response.data.phatam_audio;

                        $scope.playAudio = function(audio) {
                            var b = "http://localhost/learn_japanese/" + $scope.audio;
                            var p = null;
                            $(".music-alphabet").addClass("music-alphabet-load"),
                                null == p && (p = $("#music-alphabet"), $("#music-alphabet>source").attr("src", b), 
                            p[0].autoplay = !0, 
                            p[0].load(), p[0].onended = function () {
                                k()
                            })
                        }
                    
                    }, function(response) {
                        //Second function handles error
                        $scope.hinhanh = "Something went wrong";
                    });
                    
                }

                 // GET JSON CHUCAI
                $http.get(base_url + "chucai/json_data_chucai")
                    .then(function(response) {
                        //First function handles success
                        $scope.datas = response.data;
                    }, function(response) {
                        //Second function handles error
                        $scope.datas = "Something went wrong";
                });     
     		// $scope.isTest = false;
     	}

    }

});