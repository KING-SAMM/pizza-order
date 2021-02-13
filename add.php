<?php

    include("config/connection.php");

    $email = $title = $ingredients = "";

    $errors = array('email' => '', 'title' => '', 'ingredients' => '' );

    if(isset($_POST['submit'])) 
    {
        // echo htmlspecialchars($_POST['email']);
        // echo htmlspecialchars($_POST['title']);
        // echo htmlspecialchars($_POST['ingredients']);

        // Check email
        if(empty($_POST['email'])) 
        {
            $errors['email'] =  "An email is required. <br>";
        } 
        else 
        {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
                $errors['email'] =  "Invalid email";
            }
        }

        // Check title
        if(empty($_POST['title'])) 
        {
            $errors['title'] = "A title is required. <br>";
        } 
        else 
        {
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]*$/', $title)) 
            {
                $errors['title'] = "Title must be letters and spaces only.";
            }
        }

        // Check ingredient
        if(empty($_POST['ingredients'])) 
        {
            $errors['ingredients'] = "At least one ingredient is required. <br>";
        } 
        else 
        {
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]*)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) 
            {
                $errors['ingredients'] = "Ingredients must be a comma separated list.";
            }
        }

        // Redirect to index page if no errors
        if(array_filter($errors)) 
        {
            
        } 
        else 
        {
            $email = $conn->real_escape_string($_POST['email']);
            $title = $conn->real_escape_string($_POST['title']);
            $ingredients = $conn->real_escape_string($_POST['ingredients']);

            include_once "config/insert.php";
        
        }
    } // End post check

?>


<!DOCTYPE html>
<html lang="en">

    <?php include("templates/header.php"); ?>

    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form action="add.php" method="POST" class="white">
            <label for="email">Your Email</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <div class="red-text"><?php echo $errors['email']; ?></div>

            <label for="title">Pizza Title</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">
            <div class="red-text"><?php echo $errors['title']; ?></div>

            <label for="ingredients">Ingredients (comma separated)</label>
            <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients); ?>">
            <div class="red-text"><?php echo $errors['ingredients']; ?></div>

            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth=0">
            </div>
        </form>
    </section>
    
    <?php include("templates/footer.php"); ?>
</html>