<!DOCTYPE html>
<html lang="en" ng-app="libraryApp">
<head>
  <meta charset="UTF-8">
  <title>LMS | Insert Book</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>
<body>
  <nav>
    <a class="active" href="inserBook.php">Insert Book</a>
    <a href="updateBook.php">Update Book</a>
    <a href="deleteBook.php">Delete Book</a>
    <a href="DisplayBookDetails.php">Display Book</a>
  </nav>

  <div class="container" ng-controller="LibraryController">
    <h1>INSERT BOOK</h1>
    <form ng-submit="insertBook()">
      <label>ID:</label>
      <input type="text" ng-model="book.id" required><br>
      <label>Title:</label>
      <input type="text" ng-model="book.title" required><br>
      <label>Author:</label>
      <input type="text" ng-model="book.author" required><br>
      <label>Genre:</label>
      <input type="text" ng-model="book.genre" required><br>
      <button type="submit">Insert Book</button>
    </form>
    <div class="response-msg" ng-if="responseMsg">{{ responseMsg }}</div>
  </div>

  <script>
    angular.module('libraryApp', [])
    .controller('LibraryController', function($scope, $http, $timeout) {
      $scope.book = {};
      $scope.insertBook = function() {
        console.log('Book Data:', $scope.book); // Log the book data
        $http.post('insertRecord.php', $scope.book).then(function(response) {
          console.log('Response from PHP script:', response.data);
          $scope.book = {};
          $scope.responseMsg = response.data;
          $timeout(function() { $scope.responseMsg = ''; }, 3000);
        });
      };
    });
  </script>

</body>
</html>
