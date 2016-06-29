

angular.module('myApp', []).controller('maziiLearn', ['$scope, $http', function () {
        $http.state("advankanji", {
            url: "/advankanji",
            views: {
                "main-content": {
                    templateUrl: "views/advankanji/main.html",
                    controller: "AdvanKanjiController"
                }}});
    }]);