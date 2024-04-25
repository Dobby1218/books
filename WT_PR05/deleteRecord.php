<?php
include 'ConnectionFile.php';

$bookId = $_GET['id'];

$sql = "DELETE FROM books WHERE id = '$bookId'";

if ($conn->query($sql) === TRUE) {
    echo "Book deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
