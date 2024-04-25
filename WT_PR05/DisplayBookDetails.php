<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AngularJS Database Display Example</title>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<nav>
    <a href="insertBook.php">Insert Book</a>
    <a href="updateBook.php">Update Book</a>
    <a href="deleteBook.php">Delete Book</a>
    <a class="active" href="DisplayBookDetails.php">Display Book</a>
  </nav>
<div class="container">
  <div ng-app="myApp" ng-controller="booksCtrl">
  <h1>DISPLAY BOOK</h1>
    <table border="1">
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
      </tr>
      <tr ng-repeat="book in books">
        <td>{{ book.ID }}</td>
        <td>{{ book.Title }}</td>
        <td>{{ book.Author }}</td>
        <td>{{ book.Genre }}</td>
      </tr>
    </table>
  </div>
</div>
<script>
  var app = angular.module('myApp', []);
  app.controller('booksCtrl', function($scope, $http) {
    $http.get('getData.php').then(function(response) {
      $scope.books = response.data.records;
    });
  });
</script>
</body>
</html>
