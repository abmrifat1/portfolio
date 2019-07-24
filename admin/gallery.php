
<?php

require "../vendor/autoload.php";

session_start();
if(!isset($_SESSION['id'])){
    header('Location:index.php');
}

$message='';
use App\classes\Category;

use App\classes\Login;
if(isset($_GET['logout'])){
    Login::adminLogout();
}

?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clean Blog:Dashboard</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>

<div class="well">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active"><a href="dashboard.php">Dashboard<span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="../Home.php">Live Protfolio<span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="../admin/add-gallery.php">Add Gallery<span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="../admin/manage-gallery.php">Manage Gallery<span class="sr-only">(current)</span></a></li>


        </ul>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'];?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="?logout=logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</div>

</div><!-- /.container-fluid -->
</nav>
<h2 class="text-success text-center">Welcome To Main Sidebar</h2>
<div class="wellt">





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>