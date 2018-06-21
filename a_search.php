<?php
session_start();
include 'Property.php';

$obj=new Property;
//$xml=$obj->getXML();

if(isset($_POST['query']) ){
   

    if($results=$obj->search()){
       
        
    }else{
        $msg=$msg="<div class='alert alert-danger'>  No results </div>";
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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Search</h3>
                    </div>
                    <div class="panel-body">
                        <form accept-charset="UTF-8" action="search_results.php" role="form" method='post'>
                        <fieldset>
                            <div class="form-group">
                                <input style="border-radius:5px;" class="form-control" placeholder="Search" name="query" type="text">
                            </div>
                            <div class="form-group">
                                <label> Check-in </label>
                                <input class="form-control" placeholder="Enter your Password" name="checkin" type="date" value="">
                            </div>
                            
                            <div class="form-group">
                                <label> Check-out </label>
                                <input class="form-control" placeholder="Enter your Password" name="checkout" type="date" value="">
                            </div>

                            <div class="form-group col-sm-6 col-sm-offset-6">
                                <select class="form-control" name="bed">
                                    <option  value="">Bedrooms</option>
                                    <option  value="1">1</option>
                                    <option  value="2">2</option>

                                    <option  value="3">3</option>
                                    <option  value="4">4</option>

                                </select>

                                <select class="form-control" name="bath">
                                    <option  value="">Bathrooms</option>
                                    <option  value="1">1</option>
                                    <option  value="2">2</option>

                                    <option  value="3">3</option>
                                    <option  value="4">4</option>
                                    
                                </select>
                                <br>
                                <a href="register.php" class="btn btn-default pull-right">Advanced</a><br>
                            </div>

                            
                            <div class="form-group">
                                <input class="form-control" placeholder="bathrooms" name="bath" type="text" value="">
                            </div>

                            <div class="form-group">
                                <input class="form-control" name="pet" type="checkbox" value="1"> Pets Allowed
                            </div>

                            <div class="form-group">
                                <input class="form-control" name="net" type="checkbox" value="1"> Internet
                            </div>

                            <div class="form-group">
                                <input class="form-control" name="swim" type="checkbox" value="1"> Swimming pool
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="ac" type="checkbox" value="1"> Air condition
                            </div>

                            
                            <div class="form-group">
                                <input class="form-control" name="furn" type="checkbox" value="1"> Furnished
                            </div>

                            
                            
                            <input class="btn btn-success btn-block btn-lg " type="submit" value="Search">
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