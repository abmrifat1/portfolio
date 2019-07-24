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

use App\classes\Gallery;

$queryResult=Gallery::getAllCategoryInfo();

if(isset($_GET['status'])) {
    $id=$_GET['id'];
    if ($_GET['status']=='unpublished') {
        Gallery::unpublishedCategoryInfo($id);
    }else if($_GET['status']=='published'){
        Gallery::publishedCategoryInfo($id);
    }

}

if (isset($_GET['p'])) {
    $id = $_GET['id'];
    Gallery::deleteCategoryInfoById($id);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clean Blog:Manage</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="dashboard.php">Dashboard<span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="../Home.php">Live Protfolio<span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="add-gallery.php">Add Gallery<span class="sr-only">(current)</span></a></li>
                <li><a href="manage-gallery.php">Manage Gallery</a></li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
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
    </div><!-- /.container-fluid -->
</nav>


<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <h2 class="text-center text-success"><?php echo $message;?></h2>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="text-center text-success">All Category Goes Here</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Image Id</th>

                            <th>Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $i=1;
                        while($row=mysqli_fetch_assoc($queryResult)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>

                                <td><img src="<?php echo $row['category_image'];?>" style="width: 80px;height: 80px"/></td>
                                <td><?php echo $row['publication_status'];?></td>
                                <td>

                                    <?php if($row['publication_status']==1) { ?>
                                        <a href="?status=unpublished&id=<?php echo $row['id'];?>" class="btn btn-success btn-xs" title="Publish Blog">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    <?php } else { ?>
                                        <a href="?status=published&id=<?php echo $row['id'];?>" class="btn btn-warning btn-xs" title="UnPublish Blog">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>

                                    <?php } ?>
                                    <a href="edit-gallery.php?id=<?php echo $row['id'];?>" class="btn btn-info btn-xs" title="Edit Blog">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>

                                    <a href="?p=r&id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete!!')" class="btn btn-danger btn-xs" title="Delete Blog">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>

                            </tr>
                        <?php } ?>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>



