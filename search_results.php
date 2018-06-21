<?php
session_start();
include 'Property.php';

$obj=new Property;
$msg='';

if(isset($_REQUEST['query']) ){
   
$results='';
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
	<title>Search - Property</title>
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
			<!-- <div class="col-xs-12 col-sm-2" >
				<div class="page-header">
					<h3> <i class="fa fa-user"></i> Starred Friends </h3>
				</div>
				<span id="friendlist">
					
				</span>
			</div> -->
			<div class="col-xs-12 col-sm-12" >
				<?=$msg?>
				<div id="postDiv">
					<?php
					if($results){
						foreach ($results as $property) {
							?>
					
					<div class="jumbotron text-center">
						<h2><a href="propertyDetail.php?id=<?=$property["id"]?>">Featured Property</a></h2>
						<center><img class="img img-responsive" src="assets/images/<?=$property["image"]?>" ></center><br>
						<p> <i class="fa fa-hotel"></i> <i class="fa fa-bath"></i> <i class="fa fa-wifi"></i>   <?=$property["book_price"]?> $  </p>
						<p><?=$property["description"]?></p> 
					</div>
					
					</div> <!-- /jumbotron -->


					<?php
					}	}
				?>
				</div>
				<div id="loading"></div>
				
			</div>  <!-- /col -->
		</div> <!-- /row -->
	</div>  <!-- /container -->
<?php include 'footer.php';?>
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>