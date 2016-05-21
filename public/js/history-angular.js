var app = angular.module('angularTable', []);

app.controller('listdata',function($scope, $http){
    //declare an empty array
    $scope.historyData = [];
    //Get content from api
    $http.get('/api/user-history').success(function(response){
        //ajax request to fetch data into $scope.data
        $scope.historyData = response;
    });

    //Order by keyname the $scope
    $scope.sort = function(keyname){
        $scope.sortKey = keyname;   //set the sortKey to the param passed
        $scope.reverse = !$scope.reverse; //if true make it false and vice versa
    }
});


//# sourceMappingURL=history-angular.js.map
