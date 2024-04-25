<?php
include 'ConnectionFile.php';

$postData = file_get_contents("php://input");
$data = json_decode($postData, true);

$id = $data['id'];
$title = $data['title'];
$author = $data['author'];
$genre = $data['genre'];

$sql = "INSERT INTO books (id, title, author, genre) VALUES ('$id', '$title', '$author', '$genre')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
