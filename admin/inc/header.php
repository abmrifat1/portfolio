

<?php



require_once './vendor/autoload.php';
use App\classes\Home;
$queryResult=Home::getAllPublishedHeader();
$row=mysqli_fetch_assoc($queryResult);

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Home</title>
    <link rel="stylesheet" href="assets/css/ex.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/js/bootstrap.min.js">

</head>



<body>
<div class="my-page">
    <div class="header">
        <div class="container">
            <div class="row">

                <div class="col-md-12 banner-bg">

                    <div class="banner">
                        <img src="admin/<?php echo $row['category_image'];?>" alt="">
                        <h2>
                            <?php echo $row['category_title'];?>
                        </h2>
                       <p><?php echo $row['category_description']?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="menu">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="menu-bar">

                        <ul>
                            <li><a href="Home.php">HOME</a></li>
                            <li><a href="About.php">ABOUT</a></li>
                            <li><a href="Protofolio.php">PROTFOLIO</a></li>
                            <li><a href="Gallery.php">GALLERY</a></li>
                            <li><a href="Contract.php">CONTACT</a></li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>