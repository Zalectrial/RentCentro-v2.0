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
					<table class="table table-striped table-responsive table-bordered ">
						<thead>
							<tr>
								<td>Image</td>
								<td>Property</td> 
								<td>Postcode</td> 
								<td>City/Suburb</td> 
								<td>Street Name</td> 
								<td>Street Number</td> 
								<td>Price</td> 
								<td>Bedrooms</td>
							</tr>
						</thead>
					<?php
					if($results){
						foreach ($results as $property) {
							?>
					<tr>
						<td class="col-xs-2">
							<a href="propertyDetail.php?id=<?=$property["id"]?>">
								<img class="img img-responsive col-xs-12" src="assets/images/<?=$property["image"]?>" >
							</a>
						</td>
						<td><p> <?=$property["description"]?><p> </td>
						<td> <?=$property["postcode"]?> </td>
						<td> <?=$property["city"]?> </td>
						<td> <?=$property["street_name"]?> </td>
						<td> <?=$property["street_no"]?> </td>
						<td>$ <?=$property["book_price"] + (( $property["book_price"] * $property["commission_rate"])/100)?> </td>
						<td> <?=$property["bedroom"]?> </td>
					</tr>

					<?php
					}	}
				?>
				</table>
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