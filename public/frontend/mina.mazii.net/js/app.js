var app = angular.module('myApp', [])
app.config(function ($routeProvider) {
    $routeProvider
            .when('/', {
                controller: 'HomeController',
                templateUrl: 'views/index.html'
            });
});
