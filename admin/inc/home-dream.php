<?php


require_once './vendor/autoload.php';
use App\classes\Home;
$queryResult=Home::getAllPublishedHomeDream();


?>


<?php
$i=1;
while ($row=mysqli_fetch_assoc($queryResult)) { ?>



            <p class="category-description">
                <?php echo $i++.".".$row['category_description'];?>

            </p>


<?php } ?>
