<?php
session_start();
include 'Property.php';

$obj=new Property;
//$xml=$obj->getXML();
$msg='';
if(isset($_POST['street_no']) && isset($_POST['street_name'])&& isset($_POST['city']) && isset($_POST['postcode'])){
    
    
    
    if($obj->saveProperty()){
        $msg="<div class='alert alert-success'> Property Added Successfully </div>";
        
    }else{
        $msg="<div class='alert alert-danger'>  Failed </div>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add property</title>
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
                        <h3 class="panel-title">Add property details</h3>
                    </div>
                    <div class="panel-body">
                        <form accept-charset="UTF-8" role="form" method='post' enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter street number" name="street_no" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter street Name" name="street_name" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter city" name="city" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Postcode" name="postcode" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="" name="availablity" type="date" value="<?=date('Y-m-d')?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="wholesale price" name="book" type="text" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="commision" name="comm" type="text" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="bedrooms" name="bed" type="text" value="">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" placeholder="description" name="description" ></textarea>
                            </div>

                            <div class="form-group">
                                <label>Images </label>
                                <input class="form-control" name="file" type="file" value="">
                            </div>

                            
                            <div class="form-group">
                                <input class="form-control" placeholder="bathrooms" name="bath" type="text" value="">
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="land size in Sq.ft" name="land" type="text" value="">
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Energy rating" name="energy" type="text" value="">
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="building size in Sq.ft" name="building" type="text" value="">
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

                            <div class="form-group">
                                <input class="form-control" name="spa" type="checkbox" value="1"> Spa
                            </div>

                            
                            <input class="btn btn-success btn-block btn-lg " type="submit" value="Save">
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