<?php
    include("connection.php");

    // Write query
    $sql = "SELECT * FROM Pizzas WHERE id = $id";


    // Mkae query and get result
    $result = $conn->query($sql);

    // Fetch the resulting pizza details an array
    if ($result->num_rows > 0) 
    {
        // Store array in $pizza variable 
        $pizza = $result->fetch_assoc();
        
        // Return pizza array
        return $pizza; 
    } 

    $conn->close();

?>