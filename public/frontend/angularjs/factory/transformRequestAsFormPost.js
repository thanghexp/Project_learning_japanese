angularjs.config(function ($httpProvider) {
    $httpProvider.defaults.transformRequest.push(function (data, headerGetter) {
        console.log("transform Request");
        return data;
    });
    $httpProvider.defaults.transformResponse.push(function (data, headerGetter) {
        console.log("transform Response");
        return data;
    });
})