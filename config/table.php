<?php
include_once "connection.php";

//sql to create table
$sql = "CREATE TABLE Pizzas (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  ingredients VARCHAR(255) NOT NULL,
  email VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Pizzas created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>