<!DOCTYPE html>
<html lang="en" ng-app="libraryApp">
<head>
  <meta charset="UTF-8">
  <title>LMS | Update Book</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>
<body>
  <nav>
    <a href="insertBook.php">Insert Book</a>
    <a class="active" href="updateBook.php">Update Book</a>
    <a href="deleteBook.php">Delete Book</a>
    <a href="DisplayBookDetails.php">Display Book</a>
  </nav>
  <div class="container" ng-controller="UpdateBookController">
    <div>
      <h1>UPDATE BOOK</h1>
      <form ng-submit="updateBook()">
        <div>
          <label>Enter Book ID:</label>
          <input type="text" ng-model="book.id" required>
        </div>
        <div>
          <label>New Title:</label>
          <input type="text" ng-model="book.title">
        </div>
        <div>
          <label>New Author:</label>
          <input type="text" ng-model="book.author">
        </div>
        <div>
          <label>New Genre:</label>
          <input type="text" ng-model="book.genre">
        </div>
        <button type="submit">Update Book</button>
      </form>
      <div class="response-msg" ng-if="responseMsg">{{ responseMsg }}</div>
    </div>
  </div>

  <script>
    angular.module('libraryApp', [])
    .controller('UpdateBookController', function($scope, $http, $timeout) {
      $scope.updateBook = function() {
        $http.put('updateRecord.php', $scope.book).then(function(response) {
          console.log('Response from PHP script:', response.data);
          $scope.responseMsg = response.data;
          $timeout(function() { $scope.responseMsg = ''; }, 3000);
        });
      };
    });
  </script>
</body>
</html>
