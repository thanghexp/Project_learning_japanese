angularjs.controller("MinaController", function($scope, $routeParams, $http, $timeout) {
	/* LIST lession */
    $scope.lessionName = { 
    		0 : 'Từ mới', 
    		1 : 'Ngữ pháp',
    		2 : 'Kaiwa',	
    	};

    $('.left-menu').attr('style', 'margin-top:12px');
     $('.banner').addClass('hidden');

	$('.tabmina1').addClass('item-header-active');
    $scope.titleSub = 'Từ mới';

    $http.get(base_url + "chude/json_result_theloai")
    .then(function(response) {
        //First function handles success
        $scope.theloais = response.data;
    }, function(response) {
        //Second function nhandles eror
     	$scope.theloais = 'Wrong';
    });

	$http.get(base_url + "chude/json_result_bai")
	    .then(function(response) {
	        //First function handles success
	        $scope.lessionId = response.data;
	    }, function(response) {
	        //Second function nhandles eror
	     	$scope.lessionId = 'Wrong';
	    });
	// $(".music-alphabet").removeClass("music-alphabet-load"), null != p && (p[0].pause(), p[0].currentTime =f 0, p = null, $("#music-alphabet>source").attr("src", ""))


	$timeout(function() {
		
		$('.minna').addClass('active-menu-left');
		angular.element('.tabmina1').triggerHandler('click');
		$timeout(function() {
			$('.tabmina1').addClass('item-header-active');
		}, 100);

	}, 100);



    $scope.selectTabMina = function(theloaiid) {

		$timeout(function() {
			angular.element('.itemLesson1').triggerHandler('click');
		}, 100);


    	$scope.datas = '';

    	$scope.activeTab = theloaiid;
    	$('.item-header').removeClass('item-header-active');
		$('.tabmina' + theloaiid).addClass('item-header-active');
		$('.item-subleft-menu').removeClass('item-subleft-menu-active');



			//id_Bai va id_theloai => id_audio
	    	if(theloaiid == 1) {
				//$scope.listens= "http://localhost/learn_japanese/uploads/audio/0613.mp3";
	    		$scope.titleSub = 'Từ mới';

	    		$scope.selectLessonMina = function(baiid) {
	    			$('.item-subleft-menu').removeClass('item-subleft-menu-active');
        			$('.itemLesson' + baiid).addClass('item-subleft-menu-active');

		    		$http.get(base_url + "tumoi/json_result_tumoi/" + baiid)
					    .then(function(response) {
					        //First function handles success
					        $scope.datas = response.data;
					    }, function(response) {
					        //Second function nhandles eror
					     	$scope.datas = 'Wrong';
					    });
					$('#music-kotoba').play;
					$http.get(base_url + "audio/json_encode_audio/" + baiid + "/" + theloaiid)
						.then(function(response) {
							//First function handles success
							$scope.listens = "http://localhost/learn_japanese/" + response.data[0].audio;

						}, function(response) {
							//Second function nhandles eror
							$scope.datas = 'Wrong';
						});


				}
	    	}
	    	else if(theloaiid == 2) {
	    		$scope.titleSub = 'Ngữ pháp';

	    		$scope.selectLessonMina = function(baiid) {
			   		$('.item-subleft-menu').removeClass('item-subleft-menu-active');
			   		$('.itemLesson' + baiid).addClass('item-subleft-menu-active');

			   		$scope.grammar

	    		    $http.get(base_url + "nguphap/json_result_nguphap/" + baiid)
					    .then(function(response) {
					        //First function handles success
					        $scope.datas = response.data;
					    }, function(response) {
					        //Second function nhandles eror
					     	$scope.datas = 'Wrong';
					    });  				   
				}      
				
				// $scope.listens = "";
				// $('#music-kaiwa').play;	
				$scope.clickGrammar = function(event, id_nguphap) {
	    			$http.get(base_url + "nguphap/noidung_nguphap/json_result_noidung/" + id_nguphap)
				    .then(function(response) {
				        //First function handles success
						$scope.contents = response.data;
						var b = event.currentTarget;
						// if(b.className.indexOf("open") != -1) {
						// 	b.className.indexOf("open");
						// }
						-1 == b.className.indexOf("open") ? ($('.list-grammar').removeClass('open'), b.className += " open") : b.className.replace("open", "");
						
						
				    }, function(response) {
				        //Second function nhandles eror
				     	$scope.contents = 'Wrong';	
				    });	
	    		}   
	    		   			    		
	    	} 
	    	else if(theloaiid == 3) {
	    		$scope.titleSub = 'Kaiwa';	  

    		   $scope.selectLessonMina = function(baiid) {
    		   		$('.item-subleft-menu').removeClass('item-subleft-menu-active');
    		   		$('.itemLesson' + baiid).addClass('item-subleft-menu-active');

	    		    $http.get(base_url + "kaiwa/json_result_kaiwa/" + baiid)
					    .then(function(response) {
					        //First function handles success
					        $scope.datas = response.data;
					    }, function(response) {
					        //Second function nhandles eror
					     	$scope.datas = 'Wrong';
					    });  				   

					$scope.listens = "";
					$('#music-kaiwa').play;
				   $http.get(base_url + "audio/json_encode_audio/" + baiid + "/" + theloaiid)
					   .then(function(response) {
						   //First function handles success
						   $scope.listens =  "http://localhost/learn_japanese/" + response.data[0].audio;
						   //alert($scope.listens );

					   }, function(response) {
						   //Second function nhandles eror
						   $scope.datas = 'Wrong';
					   });
	    		   }
	    	} 
	    	else if(theloaiid == 4) {
	    	// 	$http.get(base_url + "chude/json_result_jspt")	
			   //  .then(function(response) { 
			   //      //First function handles success
			   //      $scope.lessionJLPT = response.data;
			   //  }, function(response) {
			   //      //Second function nhandles eror
			   //   	$scope.lessionJLPT = 'Wrong';
			   //  });    
		    
		    // $scope.isTest = true;
		    // $scope.showTest = false;              
		    // $scope.buttonDisabled = false;
		    // $scope.showNext = 0;

		    // $timeout( function () {
		    //     $('.jlpttest').addClass('active-menu-left');
		    //     $timeout( function () {
		    //         angular.element('.tabjp0').triggerHandler('click');
		    //          $timeout( function () {
		    //             $('.tabjp0').addClass('item-subleft-menu-active');
		    //         }, 100);
		    //     },100);     
		    // }, 100);

		    // $scope.selectLessonMina = function(id_bai) {
		    //     var array_id_question = [];
		    //     var array_answer = [];
		    //     var size;
		    //     var data_noidung = [];
		    //     var data_dapan = [];

		    //     $scope.isFlashCard = false;
		    //     $('.item-subleft-menu').removeClass('item-subleft-menu-active');
		    //     // $('.itemLesson' + id_bai).addClass('item-subleft-menu-active');
		    //     $timeout( function () {
		    //         $('.tabjlpt' + id_bai).addClass('item-subleft-menu-active');
		    //     }, 100);

		    //     $scope.isTest = true;
		    //     $scope.buttonDisabled = false;
		    //      $(".finish-test-jlpt").fadeOut(0);

		    //     $scope.showTest = false;
		    //     $scope.showNext = 0;
		    //     $('.select-alphabet').css({"left":"150%"});
		    //     $('.item-test-alphabet').css({"left" : "0%"});

		    //     $scope.size = 0;
		    //     $http.get(base_url + "cauhoi/json_count_cauhoi/" + id_bai)
		    //             .then(function(response) {
		    //                 $scope.size = response.data;
		    //                 size = response.data;

		    //             }, function(response) {
		    //                 $scope.size = "Something went wrong ";
		    //         });

		    //     $scope.trueAnswer = 0;

		    //     // GET JSON CAUHOI 
		    //     var index = 0;
		    //     var id  = null;
		    //     $http.get(base_url + "cauhoi/json_data_cauhoi_test/" + id_bai )
		    //         .then(function(response) {
		    //             $scope.questions = response.data[index].noidung;
		    //             $scope.ids = response.data[index].id;

		    //             for(var i = 0 ;i < size ;i ++) {
		    //                 array_id_question[i] = response.data[i].id;    
		    //             }

		    //             if($scope.questions == null) {
		    //                 $scope.showNext = 3;
		    //             }

		    //             $http.get(base_url + "cauhoi/dapan/json_data_dapan?id_cauhoi=" + $scope.ids)
		    //                 .then(function(response) {
		    //                     $scope.answers = response.data;
		    //                     $scope.id = response.data[index].id;

		    //                     for(var i = 0 ; i < 4; i ++) {
		    //                         if(response.data[i].dapandung == 1) {
		    //                             $scope.testAnswer = response.data[i].dapan;        
		    //                         }
		    //                     }
		                       

		    //                 }, function(response) {
		    //                     $scope.answers = "Something went wrong ";
		    //             });

		    //         }, function(response) {
		    //             $scope.questions = "Something went wrong ";
		    //     });

		    //      $scope.chooseAnswer = function(idx, result) {
		                            
		    //         // $(".item-conten  t-alphabet div:first").show();
		    //         $('.card-choice' ).removeClass('box-choice');
		    //         $('.testjlpt' + idx).addClass('box-choice');
		    //         $scope.buttonDisabled = true;
		            
		    //          $scope.checkTest = function() {
		    //             if(result == 1) {
		    //                 var trueAns = $scope.trueAnswer++; 
		    //                 $(".progress-bar").animate({width: $scope.trueAnswer / $scope.size * 100 + "%"}, 100);
		    //                 $('.box-notify-correct').addClass('box-notify-show');

		    //             } else {
		    //                 $('.box-notify-fails').addClass('box-notify-show');
		    //             }
		    //             $scope.showNext = 1;
		    //                 $scope.buttonDisabled = false;
		    //         }
		    //     }

		    //     $scope.finish = function() {
		    //         // $scope.trueAns = trueAns;
		    //         $('.box-notify').removeClass('box-notify-show');
		    //         $(".finish-test-jlpt").fadeIn(3e3)
		    //         $scope.showNext = 3;
		    //     }

		    //     $scope.refresh = function() {
		    //         $scope.isTest = true;
		    //         $scope.showTest = false;              
		    //         // $scope.buttonDisabled = false;
		    //         $scope.showNext = 0;
		    //         $(".box-notify").removeClass("box-notify-show"), $(".finish-test-jlpt").hide(), $(".item-test-alphabet div:first").animate({left: "-150%"}, 350, function() {
		    //             $('.select-alphabet').css({"left":"0%"});
		    //             $('.item-test-alphabet').css({"left" : "150%"});
		    //         });                     

		    //         $scope.trueAnswer = 0;
		    //         index = 0;                   
		    //     }    

		    //     //  Question.dapans = [1,2,3,4]
		    //     //  Question.dapans = []
		        
		    //     $scope.next = function() {
		            
		    //         index ++ ;
		    //         if(index >= $scope.size) {
		    //                 $scope.showNext = 2;

		    //         } else {
		    //                 $('.card-choice' ).removeClass('box-choice');
		    //                 $('.box-notify').removeClass('box-notify-show');
		    //                 // $(".box-notify").removeClass("box-notify-show");
		    //                 $(".jlpt-test-item div:first").next().show();
		    //                 $(".jlpt-test-item div:first").animate({left: "-150%"}, 300, function () {
		    //                     $(this).css("left", "150%");
		    //                     $(this).appendTo(".item-content-alphabet");
		    //                     $(this).hide();
		    //                 }), 
		    //                 $(".jlpt-test-item div:first").next().animate({left: "0"}, 300);



		    //                 $http.get(base_url + "cauhoi/json_data_cauhoi_row/" + array_id_question[index] )
		    //                     .then(function(response) {
		    //                         $scope.questions = response.data.noidung;

		    //                     $http.get(base_url + "cauhoi/dapan/json_data_dapan?id_cauhoi=" + array_id_question[index])
		    //                         .then(function(response) {
		    //                             $scope.answers = response.data;
		    //                             for(var i = 0 ;i< 4;i ++) {
		    //                                 if(response.data[i].dapandung == 1) {
		    //                                     $scope.testAnswer = response.data[i].dapan;        
		    //                                 }
		    //                             }
		                                

		    //                             // alert($scope.questions);
		              
		    //                             $scope.showNext = 0;

		    //                         }, function(response) {
		    //                             $scope.answers = "Something went wrong ";
		    //                     });

		    //                     }, function(response) {
		    //                         $scope.questions = "Something went wrong ";
		    //                 });
		    //         }           
		    //     }
		    
		    //     $('.jlpt-test-item-1').css({"display": "block", "left": "0%"});
		    //     $('.jlpt-test-item-2').css({"display": "none", "left": "150%"});
		    // }
    	} 

	}
})