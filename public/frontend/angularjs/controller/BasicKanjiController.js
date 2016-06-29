/**
 * Created by thanghepxp on 29/04/2016.
 */
angularjs.controller("BasicKanjiController", function($scope, $routeParams, $http, $timeout) {
    $scope.title = "512 từ Kanji cơ bản";
    $http.get(base_url + "chude/json_result_bai_coban")	
	    .then(function(response) { 
	        //First function handles success
	        $scope.lessonIds = response.data;
	    }, function(response) {
	        //Second function nhandles eror
	     	$scope.lessonIds = 'Wrong';
	    });    

    // $('.banner').removeClass('hidden');
    $('.left-menu').attr('style', 'margin-top:-40px');
    $('.main-content').attr('style', 'margin-top:-63px');

    $timeout( function () {
        $('.basickanji').addClass('active-menu-left');

        $timeout( function () {
            angular.element('.lesson0').triggerHandler('click');
             $timeout( function () {
                $('.item-ad0').addClass('basickanji-item-active');
            }, 100);
        }, 100);
    }, 100);



    $scope.selectLessonIkanji = function(id_bai) {
        $scope.isFlashCard = false;
        $('.item-subleft-menu').removeClass('item-subleft-menu-active');
        $('.itemLesson' + id_bai).addClass('item-subleft-menu-active');

        $http.get(base_url + "tuvung/tuvung/json_data_kanji?id_bai=" + id_bai )
        .then(function(response) {
            //First function handles success
            $scope.datas = response.data;
        }, function(response) {
            //Second function handles error
            $scope.datas = "Something went wrong";
        }); 
         
        $scope.viewDetailIKanji = function(id_tuvung) {
                $('#myIKanji').focus();
                  // $scope.detailKanji = $scope.datas;
                  $http.get(base_url + "tuvung/tuvung/json_data_detailKanji?id_tuvung=" +  id_tuvung )
                .then(function(response) {
                    //First function handles success
                    $scope.detailKanji  = response.data;
                }, function(response) {
                    //Second function handles error
                    $scope.datas = "Something went wrong";
                });

                $('#myIKanji').focus();
                  // $scope.detailKanji = $scope.datas;
                  $http.get(base_url + "tuvung/vidu_tuvung/json_data_examplekanji?id=" +  id_tuvung)
                .then(function(response) {
                    //First function handles success
                    $scope.note  = response.data;
                }, function(response) {
                    //Second function handles error
                    $scope.note = "Something went wrong";
                });  
        }  
    }
    
});