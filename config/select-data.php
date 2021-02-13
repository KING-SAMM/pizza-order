<?php
include("connection.php");

// Write query
$sql = "SELECT id, title, ingredients FROM Pizzas ORDER BY created_at";

// Mkae query and get result
$result = $conn->query($sql);

// Fetch the resulting rows as an array
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
    // Push each row into a pizzas array
    $pizzas[] = $row;
    }

    return $pizzas;
    

} 
else 
{
    echo "0 results";
}

$conn->close();


?>