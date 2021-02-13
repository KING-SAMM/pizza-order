<?php
  include_once "connection.php";

  // sql to delete a record
  $sql = "DELETE FROM Pizzas WHERE id = $id_to_delete";

  if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
  } else {
    echo "Error deleting record: " . $conn->error;
  }

  $conn->close();
?>