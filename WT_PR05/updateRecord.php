<?php
include 'ConnectionFile.php';

$postData = file_get_contents("php://input");
$data = json_decode($postData, true);

$id = $data['id'];
$title = $data['title'];
$author = $data['author'];
$genre = $data['genre'];

$sql = "UPDATE books SET title = '$title', author = '$author', genre = '$genre' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Book updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
