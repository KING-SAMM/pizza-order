<?php
    include_once "config/select-data.php";
?>

<!DOCTYPE html>
<html lang="en">

    <?php include("templates/header.php"); ?>

    <h4 class="center grey-text">Pizzas</h4>

    <div class="container">
        <div class="row">
            <?php foreach($pizzas as $pizza): ?>
                <div class="col s6 md3">
                    <div class="card z-depth-1">
                        <img src="img/pizza.svg" alt="Pizza Image" class="pizza">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                            <ul>
                                <?php foreach(explode(',', $pizza['ingredients']) as $ingr): ?>

                                    <li>
                                        <?php echo htmlspecialchars($ingr); ?>
                                    </li>

                                <?php endforeach;  ?>
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">More info</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <?php include("templates/footer.php"); ?>
</html>