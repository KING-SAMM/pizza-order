<?php
include_once "connection.php";

$sql = "INSERT INTO Pizzas (email, title, ingredients)
VALUES ('$email', '$title', '$ingredients')";

// Save to db and check for errors
if ($conn->query($sql) === TRUE) {
  // Redirect to index page on sucess
  header('Location: index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>