/**
 * Created by thanghepxp on 29/04/2016.
 */

angularjs.controller("JlptTestController", function($scope, $routeParams, $http, $timeout) {
    $scope.title = 'Luyện thi JLPT N1 -> N5';
    $http.get(base_url + "chude/json_result_jspt")	
	    .then(function(response) { 
	        //First function handles success
	        $scope.lessionJLPT = response.data;
	    }, function(response) {
	        //Second function nhandles eror
	     	$scope.lessionJLPT = 'Wrong';
	    });    

    // $('.banner').removeClass('hidden');
    $('.left-menu').attr('style', 'margin-top:-40px');
    $('.main-content').attr('style', 'margin-top:-40px');
    
    
    $('.select-alphabet').css({"left":"0%"});
    $('.item-test-alphabet').css({"left" : "150%"});

    $scope.isTest = true;
    $scope.showTest = false;              
    $scope.buttonDisabled = false;
    $scope.showNext = 0;

    $timeout( function () {
        $('.jlpttest').addClass('active-menu-left');
        $timeout( function () {
            angular.element('.tabjp0').triggerHandler('click');
             $timeout( function () {
                $('.tabjp0').addClass('item-subleft-menu-active');
            }, 100);
        },100);     
    }, 100);


    var array_id_question = [];
    var array_answer = [];
    var size = 0;
    var data_noidung = [];
    var data_dapan = [];
    var index = 0;
    var id  = null;
    var a,b;
    var rs = null;
    var bai = null;

    $scope.selectTabJLPT = function(id_bai) {
        bai = id_bai;

        $scope.isFlashCard = false;
        $('.item-subleft-menu').removeClass('item-subleft-menu-active');

        $timeout( function () {
            $('.tabjlpt' + bai).addClass('item-subleft-menu-active');
        }, 300);

        $scope.isTest = true;
        $scope.buttonDisabled = false;

         $(".finish-test-jlpt").fadeOut(0);

        $scope.showTest = false;
        $scope.showNext = 0;

        $scope.size = 0;
        $http.get(base_url + "cauhoi/json_count_cauhoi/" + bai)
                .then(function(response) {
                    $scope.size = response.data;
                    size = response.data;

                }, function(response) {
                    $scope.size = "Something went wrong ";
            });

        $scope.trueAnswer = 0;

        // GET JSON CAUHOI 
        index = 0;

        $http.get(base_url + "cauhoi/json_data_cauhoi_test/" + bai )
            .then(function(response) {

                $scope.questions = response.data[index].noidung;

                b = null;
                b = response.data[index].id;

                for(var i = 0 ;i < size ;i ++) {
                    array_id_question[i] = response.data[i].id;    
                }

                if($scope.questions == null) {
                    $scope.showNext = 3;
                }

                $http.get(base_url + "cauhoi/dapan/json_data_dapan?id_cauhoi=" + b)
                    .then(function(response) {
                        $scope.answers = response.data;
                        $scope.id = response.data[index].id;

                        for(var i = 0 ; i < 4; i ++) {
                            if(response.data[i].dapandung == 1) {
                                $scope.testAnswer = response.data[i].dapan;        
                            }
                        }

                    }, function(response) {
                        $scope.answers = "Something went wrong ";
                });

            }, function(response) {
                $scope.questions = "Something went wrong ";
        });

        $('.jlpt-test-item-1').css({"display": "block", "left": "0%"});
        $('.jlpt-test-item-2').css({"display": "none", "left": "150%"});
    }

    $scope.chooseAnswer = function(idx, result) {             
        // $(".item-conten  t-alphabet div:first").show();
        $('.card-choice' ).removeClass('box-choice');
        $('.testjlpt' + idx).addClass('box-choice');
        $scope.buttonDisabled = true;
        rs = result;
         
    }

    $scope.checkTest = function() {
        index ++ ;
        if(rs == 1) {
            var trueAns = $scope.trueAnswer++; 
            $(".progress-bar").animate({width: $scope.trueAnswer / $scope.size * 100 + "%"}, 100);
            $('.box-notify-correct').addClass('box-notify-show');

        } else {
            $('.box-notify-fails').addClass('box-notify-show');
        }
        $scope.showNext = 1;
        $scope.buttonDisabled = false;
    }

    $scope.finish = function() {
        $('.box-notify').removeClass('box-notify-show');
        $(".finish-test-jlpt").fadeIn(3e3)
        $scope.showNext = 3;


    }

    $scope.refresh = function() {
        // $scope.isTest = true;
        // $scope.showTest = false;         
        // $scope.showNext = 0;
        $timeout( function () {
            angular.element('.tabjlpt' + bai).triggerHandler('click');
        }, 100);
        // $scope.buttonDisabled = false;

        

        $(".box-notify").removeClass("box-notify-show"), $(".finish-test-jlpt").hide(), $(".item-test-alphabet div:first").animate({left: "-150%"}, 350, function() {
            $('.select-alphabet').css({"left":"0%"});
            $('.item-test-alphabet').css({"left" : "150%"});
        });                     

        $scope.trueAnswer = 0;
        index = 0;                   
    }    

    //  Question.dapans = [1,2,3,4]
    //  Question.dapans = []
    
    $scope.next = function() {      
        if(index >= $scope.size) {
            $scope.showNext = 2;
        } else {
            $('.card-choice' ).removeClass('box-choice');
            $('.box-notify').removeClass('box-notify-show');

            $http.get(base_url + "cauhoi/json_data_cauhoi_row/" + array_id_question[index] )
                .then(function(response) {
                    $scope.questions = response.data.noidung;

                $http.get(base_url + "cauhoi/dapan/json_data_dapan?id_cauhoi=" + array_id_question[index])
                    .then(function(response) {
                        $scope.answers = response.data;

                        for(var i = 0 ;i< 4;i ++) {
                            if(response.data[i].dapandung == 1) {
                                $scope.testAnswer = response.data[i].dapan;        
                            }
                        }
      
                        $scope.showNext = 0;

                    }, function(response) {
                        $scope.answers = "Something went wrong ";
                });

                }, function(response) {
                    $scope.questions = "Something went wrong ";
            });               
        }           
    }

    
});