<?php
session_start();
include 'Property.php';

$obj=new Property;
//$xml=$obj->getXML();
$msg='';
if(isset($_POST['email']) && isset($_POST['password'])&& isset($_POST['password2']) && isset($_POST['fname'])){
    if($_POST['password2'] == $_POST['password']){
        $email=trim($_POST['email']);
        $pass=trim($_POST['password']);
        $fname=trim($_POST['fname']);
        $lname=trim($_POST['lname']);
        $phone=trim($_POST['phone']);
        if($obj->add_user($fname,$lname,$phone,$email,$pass)){
            $msg="<div class='alert alert-success'> Registered Successfully </div>";
            
        }else{
            $msg="<div class='alert alert-danger'> Registeratio Failed </div>";
        }
    }else{
        $msg="<div class='alert alert-warning'> Please check your password </div>";
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
                        <h3 class="panel-title">Please Register</h3>
                    </div>
                    <div class="panel-body">
                        <form accept-charset="UTF-8" role="form" method='post'>
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter your First Name" name="fname" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter your Last Name" name="lname" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter your E-mail" name="email" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter your Phone" name="phone" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter your Password" name="password" type="password" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Re-Enter your Password" name="password2" type="password" value="">
                            </div>

                            <div class="form-group">
                                <a href="register.php" class="btn btn-success">Login</a>
                            </div>
                            
                            <input class="btn btn-success btn-block btn-lg " type="submit" value="Register">
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