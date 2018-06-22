<?php
session_start();
include 'Property.php';

$obj=new Property;
$msg='';
if(isset($_POST['email']) && isset($_POST['password'])){
    $email=trim($_POST['email']);
    $pass=trim($_POST['password']);

    if($obj->authenticate($email,$pass)){
        header("location:./index.php");
        
    }else{
        $msg="<div class='alert alert-danger'>   <h3> Incorrect email or password !</h3> </div>";
        
    }
        
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Articles</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
</head>
<body>
	<div class="container" style="width:100%">
		<?php 
			include_once 'header.php';
		?>

		<div class="row">

            <div class="col-md-4 col-md-offset-4">
                <?=$msg?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please sign in</h3>
                    </div>
                    <div class="panel-body">
                        <form accept-charset="UTF-8" role="form" method='post'>
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter your E-mail" name="email" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter your Password" name="password" type="password" value="">
                            </div>

                            <div class="form-group">
                                <a href="register.php" class="btn">Register</a><br>
                                <a href="register.php" class="btn">Forgot password</a>
                            </div>
                            
                            <input class="btn btn-success btn-block btn-lg " type="submit" value="Login">
                        </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>  <!-- /row -->
		<?php
			include 'footer.php';
		?>
	</div>  <!-- /container -->

	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>