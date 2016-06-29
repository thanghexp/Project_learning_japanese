angularjs.controller("MainController", function($scope, $routeParams) {
    // $scope.param = $routeParams.param;
    $scope.activeMenu  = function(type)
    {
    	$('.list-group-item').removeClass('active-menu-left'),
    	$('.' + type).addClass('active-menu-left')
    }
    
});