<?php
    include("config/connection.php");

    // Define $pizza variable to gain access to it in HTML
    $pizza = [];

    if(isset($_POST['delete']))
    {
        $id_to_delete = $conn->real_escape_string($_POST['id_to_delete']);

        include("config/delete_detail.php");

    }

    // Check GET request param
    if (isset($_GET['id']))
    {
        $id = $conn->real_escape_string($_GET['id']);

        include("config/select_details.php");
        
    }

?>

<!DOCTYPE html>
<html lang="en">

    <?php include("templates/header.php"); ?>

        <div class="container center grey-text">
            <?php if($pizza): ?>
                <h2><?php echo htmlspecialchars($pizza['title']); ?></h2>
                <p>
                    <strong>Created By</strong>
                    <h4><?php echo htmlspecialchars($pizza['email']); ?></h4>
                </p>
                <h5><?php echo date($pizza['created_at']); ?></h5>
                <strong>Ingredients</strong>
                <h5><?php echo htmlspecialchars($pizza['ingredients']); ?></h5>

                <form action="details.php" method="POST">
                    <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']; ?>">
                    <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
                </form>
                
            <?php else: ?>
                <h4>No such pizza exists!</h4>
            <?php endif; ?>
        </div>
    
    <?php include("templates/footer.php"); ?>

</html>