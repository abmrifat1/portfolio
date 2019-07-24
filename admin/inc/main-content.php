<?php


require_once './vendor/autoload.php';
use App\classes\Home;
$queryResult=Home::getAllPublishedHomeDream();


?>


<?php

while ($row=mysqli_fetch_assoc($queryResult)) { ?>



    <p class="category-description">
        <?php  echo $row['category_description'].'<br/>';

        ?>

    </p>


<?php } ?>
