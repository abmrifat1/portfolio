
<?php



require_once './vendor/autoload.php';
use App\classes\Home;
$queryResult=Home::getAllPublishedMainSidebar();


?>



<?php while ($row=mysqli_fetch_assoc($queryResult)) { ?>

    <div class="left-content">
        <div class="single-content">
            <img src="admin/<?php echo $row['category_image'];?>" alt="">
            <h2 class="category-title">
                <?php echo $row['category_title'];?>
            </h2>
            <p class="post-meta" style="font-size: 12px;color: blueviolet;">Posted by:
                <a href="#"><?php echo $row['author_name']?></a></p>

                <p style="font-size: 12px;color: red">on September 28, 2017</p>
            <br/>
            <p class="category-description">
                <?php echo $row['category_description'];?>

            </p>
        </div>
           <br/>
    </div>

<?php } ?>

<!--    <div class="col-md-3">-->
<!--        <div class="row">-->
<!--            <div class="col-md-12">-->
<!---->
<!---->
<!--                --><?php //include 'admin/inc/main-sidebar.php';?>
<!--            </div>-->
<!---->
<!--        </div>-->
<!---->
<!--    </div>-->
