<?php

require "../vendor/autoload.php";
use App\classes\Header;
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


if(isset($_POST['btn'])){
    $message=Header::saveCategoryInfo($_POST);
}

if(isset($_POST['search_btn'])){
    $search_text= $_POST['search_text'];
    $queryResult=Header::getCategoryById($search_text);

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clean Blog:Add</title>

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
                <li class="active"><a href="add-header.php">Add Header<span class="sr-only">(current)</span></a></li>
                <li><a href="manage-header.php">Manage Header</a></li>

            </ul>
            <form class="navbar-form navbar-left" action="" method="POST">
                <div class="form-group">
                    <input type="text" name="search_text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" name="search_btn" class="btn btn-default">Submit</button>
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

<?php if(isset($queryResult)) { ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <h2 class="text-center text-success"><?php echo $message;?></h2>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="text-center text-success">Your Choose Category Goes Here</h2>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Category Title</th>
                                <th>Category Descriptiopn</th>
                                <th>Author Name</th>
                                <th>Category Image</th>
                                <th>Publication Status</th>

                            </tr>
                            <?php while ($CategoryInfo=mysqli_fetch_assoc($queryResult)){ ?>
                                <tr>
                                    <td><?php echo $CategoryInfo['category_title'];?></td>

                                    <td><?php echo $CategoryInfo['category_description'];?></td>
                                    <td><?php echo $_SESSION['name'];?></td>

                                    <td><img src="<?php echo $CategoryInfo['category_image']; ?>" alt="" style="height: 50px;width: 100px;"></td>
                                    <td><?php echo $CategoryInfo['publication_status']==1 ?'published' : 'Unpublish';?></td>

                                </tr>
                            <?php } ?>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>

<?php }
else { ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2 class="text-center text-success"><?php echo $message;?></h2>
                <div class="well">

                    <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Category Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="category_title" class="form-control" id="inputEmail3" placeholder="Category Title">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Category Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="category_description" rows="10"></textarea>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Category Image</label>
                            <div class="col-sm-10">
                                <input  name="category_image" type="file" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Publication Status</label>
                            <div class="col-sm-10">
                                <select name="publication_status" class="form-control">
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="btn" class="btn btn-success btn-block">Save Category Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>