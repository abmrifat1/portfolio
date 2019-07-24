
<!--    <div class="right-content">-->
<!--        <div class="single-content">-->
<!--            <img src="assets/pic/intertreast.jpg" alt="">-->
<!--            <h2>Personal Interest</h2>-->
<!--            <ul>-->
<!--                <li>Math solving</li>-->
<!--                <li>Programing</li>-->
<!--                <li>Web page designing</li>-->
<!--                <li>Listening music</li>-->
<!--                <li>Driving</li>-->
<!--                <li>Reading Books</li>-->
<!--                <li>Learning  Vocabulary</li>-->
<!--                <li>play gittur.</li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <br/>-->
<!--    </div>-->


    <?php



    require_once './vendor/autoload.php';
    use App\classes\Home;
    $queryResult=Home::getAllPublishedSubSidebar();


    ?>



    <?php while ($row=mysqli_fetch_assoc($queryResult)) { ?>

        <div class="right-content">
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

