/**
 * Created by thanghepxp on 29/04/2016.
 */
angularjs.controller("AdvanKanjiController", function($scope, $routeParams, $http, $timeout) {
    $scope.title = "Từ Kanji nâng cao ";

   $http.get(base_url + "chude/json_result_bai_nangcao")	
	    .then(function(response) {
	        //First function handles success
	        $scope.groups = response.data;
	    }, function(response) {
	        //Second function nhandles eror
	     	$scope.groups = 'Wrong';
	    });

    $timeout( function () {
        $('.advankanji').addClass('active-menu-left');
        angular.element('.tabalphabet0').triggerHandler('click');

        $timeout( function () {
            angular.element('.lesson0').triggerHandler('click');
             $timeout( function () {
                $('.item-ad0').addClass('advankanji-item-active');
            }, 100);
        }, 100);
    }, 100);

    // $('.banner').removeClass('hidden');
    $('.left-menu').attr('style', 'margin-top:-40px');
    $('.main-content').attr('style', 'margin-top:-40px');
    

    $scope.isFlashCard = false;
    $scope.selectLessonGroup = function(lessionid) {
        $('.item-subleft-menu').removeClass('item-subleft-menu-active');
        $('.itemLesson' + lessionid).addClass('item-subleft-menu-active');

        $http.get(base_url + "tuvung/tuvung/json_data_kanji?id_bai=" + lessionid)
        .then(function(response) {
            //First function handles success
            $scope.datas = response.data;
        }, function(response) {
            //Second function handles error
            $scope.datas = "Something went wrong";
        });
         
    }

    $scope.viewDetailAdvanKanji = function(id_tuvung) {
        $('#myAdvanKanji').focus();
          // $scope.detailKanji = $scope.datas;
          $http.get(base_url + "tuvung/tuvung/json_data_detailKanji?id_tuvung=" +  id_tuvung )
        .then(function(response) {
            //First function handles success
            $scope.detailAdvanKanji  = response.data;
            $scope.hinhanh  = "http://localhost/learn_japanese/" + response.data[0].hinhanh;
        }, function(response) {
            //Second function handles error
            $scope.detailAdvanKanji = "Something went wrong";
        });

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
    
});