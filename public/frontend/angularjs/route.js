angularjs.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/alphabet', {
                templateUrl: angularjs_url + 'html/alphabet.html',
                controller:  'AlphabetController'
            }).
            when('/mina', {
                templateUrl: angularjs_url + 'html/mina.html',
                controller:   'MinaController'
            }).
            when('/basickanji', {
                templateUrl: angularjs_url + 'html/basickanji.html',
                controller:   'BasicKanjiController'
            }).
            when('/advankanji', {
                templateUrl: angularjs_url + 'html/advankanji.html',
                controller:   'AdvanKanjiController'
            }).
            when('/luyenthi', {
                templateUrl: angularjs_url + 'html/mina.html',
                controller:   'MinaController'
            }).
            when('/jlpttest', {
                templateUrl: angularjs_url + 'html/jlptTest.html',
                controller:   'JlptTestController'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);

