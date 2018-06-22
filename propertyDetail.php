<?php
session_start();
include 'Property.php';

$obj=new Property;
if(isset($_POST["type"]) && isset($_SESSION["email"]))
{
	$to = $_SESSION["email"];
	$subject = "Property Booked !";
	$txt = "Thank you for booking Property on RentCentro \nBooking Detils: \nCheckin:".$_POST["checkin"]."\nCheckout:".$_POST["checkout"]."\nFor more info visit website\nRegards";
	$headers = "From: webmaster@rentcentro.com" . "\r\n" ;

	if(!mail($to,$subject,$txt,$headers))
		echo "mail not sent please upload project on live server";
}	
if(isset($_REQUEST["id"]) && $_REQUEST["id"]!="" && $_REQUEST["id"]>0){

	$property=$obj->getProperty($_REQUEST["id"]);
}else{
	header("location:./index.php");
}

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
					<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">Property Details</h1>
						</div>
						<!-- /.col-lg-12 -->
					</div>
					<!-- /.row -->
					<div class="row">
					
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<div class="product-item">
							<div class="pi-img-wrapper">
							<img src="assets/images/<?=$property["image"]?>" class="img-responsive" alt="Product Image">
							
							</div>
							<h2><?=$property["street_no"].", ".$property["street_name"].", ".$property["city"]?></h2>
							<div class="pi-price"> <h4>$ <?=$property["book_price"]?></h4></div>
							
							<div class="sticker sticker-new"></div>
						</div>
					</div> <!-- col-lg-4 ends -->
									
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id="table--div">
							
							<form action="" method="post">
							<table align="center" class="table table-condensed">
								<tr>
									<td>
										<i class="fa fa-hotel"></i>
									</td>
								</tr>
								<tr>
									<td>
										<i class="fa fa-bath"></i>
									</td>
								</tr>
								<?php	if($property["internet"]==1){  ?>
								<tr>
									<td>
										<i class="fa fa-wifi"></i>
									</td>
								</tr>
								<?php } 
									if($property["parking"]>=1){  ?>
								<tr>
									<td>
										<i class="fa fa-car"></i>
									</td>
								</tr>
								<?php } ?>

								<tr>
									<td>
										<input type="date" name="checkin" class="form-control" value="<?=date('Y-m-d')?>">
									</td>
								</tr>

								<tr>
									<td>
										<input type="date" name="checkout" class="form-control" value="<?=date('Y-m-d')?>">
									</td>
								</tr>

								<tr>
										<td>
									<input type="hidden" name="id" value="<?=$property["parking"]?>" >
									<input type="hidden" name="type" value="book" >
									<button type="submit" class="btn btn-primary col-sm-12">
									book
									</button>
									<td>
								</tr>

							</table>

								</form>
						</div> <!-- /.table-->
					</div> <!-- /.row -->
					<div class="row">
						<div class="col-md-8">
							<p>
							<?=$property["description"]?>
							</p>

						</div>
						<div class="col-md-8 col-md-offset-2">
							<h3> Property Details </h3>
							<table class="table table-responsive table-bordered">
								<tr>
									<td>		
										Bedrooms
									</td>
									<td>
										<?=$property["bedroom"]?>
									</td>
								</tr>
								<tr>
									<td>		
										Bathrooms
									</td>
									<td>
										<?=$property["bathroom"]?>
									</td>
								</tr>
								<tr>
									<td>		
										Buiding Size
									</td>
									<td>
										<?=$property["building_size"]?> Sq.ft
									</td>
								</tr>
								<tr>
									<td>		
										Land Size
									</td>
									<td>
										<?=$property["land_size"]?> Sq.ft
									</td>
								</tr>
								<tr>
									<td>		
										Parking Available
									</td>
									<td>
										<?=$property["parking"]?> 
									</td>
								</tr>
								<tr>
									<td>		
										furnished
									</td>
									<td>
										<?= $property["furnished"] == 1 ? "YES" : "NO" ?> 
									</td>
								</tr>
								<tr>
									<td>		
										Air-conditioning
									</td>
									<td>
										<?= $property["air_condition"] == 1 ? "YES" : "NO" ?> 
									</td>
								</tr>
								<tr>
									<td>		
										Swimming pool
									</td>
									<td>
										<?= $property["swimming_pool"] == 1 ? "YES" : "NO" ?> 
									</td>
								</tr>
								<tr>
									<td>		
										Spa
									</td>
									<td>
										<?= $property["spa"] == 1 ? "YES" : "NO" ?> 
									</td>
								</tr>
								<tr>
									<td>		
										Energy rating
									</td>
									<td>
										<?= $property["energy"]  ?> 
									</td>
								</tr>
								<tr>
									<td>		
										Internet inclusion
									</td>
									<td>
										<?= $property["internet"] == 1 ? "YES" : "NO" ?> 
									</td>
								</tr>
								





								
							</table>
						</div>
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
</body>
</html>