<?php
require "../vendor/autoload.php";
session_start();
if(isset($_SESSION['id'])){
    header('Location:dashboard.php');
}

$message='';
use App\classes\Login;
if(isset($_POST['btn']))
    $message=Login::adminLoginCheck($_POST);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clean Blog</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">

            <div class="well" style="">
                <h2 class="text-center text-success">Admin Login</h2>
                <hr/>
                <h4 class="text-center text-danger"><?php echo $message;?></h4>
                <br/>
                <form action="" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Email Address</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" name="btn" class="btn btn-success btn-block">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/admin/js/bootstrap.min.js"></script>
</body>
</html>