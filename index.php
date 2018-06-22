<?php
session_start();
include 'Property.php';

$obj=new Property;
$property=$obj->getProperty(1);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Property</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container" style="width:100%">
		<?php 
			include_once 'header.php';
		?>

		<div class="row">
			
			<div class="col-xs-12 col-sm-12" >
				
				<div id="postDiv">
					<div class="jumbotron text-center">
					<p>
						Rent-centro is bridge between buyers and sellers of rental properties.
					</p>
						<h2><a href="propertyDetail.php?id=<?=$property["id"]?>">Featured Property</a></h2>
						<center>
						<a href="propertyDetail.php?id=<?=$property["id"]?>">
							<img class="img img-responsive" src="assets/images/<?=$property["image"]?>" >
						</a>
						</center><br>
						<p> <i class="fa fa-hotel"></i> <i class="fa fa-bath"></i> <i class="fa fa-wifi"></i>   <?=$property["book_price"]?> $  </p>
						<p><?=$property["description"]?></p> 
					</div>
				</div>
				<div id="loading"></div>
				
			</div>  <!-- /col -->
		</div> <!-- /row -->
		<?php
			include 'footer.php';
		?>
	</div>  <!-- /container -->

	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			var alert ="<?= $_SESSION["alert"]?>";

			if(alert=="true")
			{
				$('#myModal').modal('show');
			}
		});
		
		<?php
		$_SESSION["alert"]="false";
		?>
	</script>
</body>
</html>