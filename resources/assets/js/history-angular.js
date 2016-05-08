var app = angular.module('angularTable', []);

app.controller('listdata',function($scope, $http){
    //declare an empty array
    $scope.historyData = [];
    $http.get('/api/user-history').success(function(response){
        //ajax request to fetch data into $scope.data
        $scope.historyData = response;
    });

    $scope.sort = function(keyname){
        $scope.sortKey = keyname;   //set the sortKey to the param passed
        $scope.reverse = !$scope.reverse; //if true make it false and vice versa
    }
});

