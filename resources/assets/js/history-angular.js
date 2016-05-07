var app = angular.module('angularTable', []);

app.controller('listdata',function($scope, $http){
    //declare an empty array
    $scope.historyData = [];
    window.alert("hi!");
    $http.get('/api/user-history').success(function(response){
        //ajax request to fetch data into $scope.data
        $scope.historyData = response;
    });

});