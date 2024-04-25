<!DOCTYPE html>
<html lang="en" ng-app="libraryApp">
<head>
  <meta charset="UTF-8">
  <title>LMS | Delete Book</title>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <nav>
    <a href="insertBook.php">Insert Book</a>
    <a href="updateBook.php">Update Book</a>
    <a class="active" href="deleteBook.php">Delete Book</a>
    <a href="DisplayBookDetails.php">Display Book</a>
  </nav>
  <div class="container" ng-controller="DeleteBookController">
    <div>
      <h1>DELETE BOOK</h1>
      <label>Enter Book ID to Delete:</label>
      <input type="text" ng-model="bookId" required><br>
      <button ng-click="deleteBook()" ng-disabled="!bookId">Delete Book</button>
      <div ng-if="responseMsg">{{ responseMsg }}</div>
    </div>
  </div>

  <script>
    angular.module('libraryApp', [])
    .controller('DeleteBookController', function($scope, $http, $timeout) {
      $scope.deleteBook = function() {
        $http.delete('deleteRecord.php?id=' + $scope.bookId).then(function(response) {
          console.log('Response from PHP script:', response.data);
          $scope.responseMsg = response.data;
          $timeout(function() { $scope.responseMsg = ''; }, 3000);
        });
      };
    });
  </script>
</body>
</html>
