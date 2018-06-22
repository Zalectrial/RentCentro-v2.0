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
                    <h1> <?=urldecode($_GET["page"])?></h1>
					<div class="jumbotron text-center">
						<p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus consectetur quas, natus ab soluta fugiat pariatur quidem atque nostrum et minus, esse aperiam reprehenderit iusto a voluptates inventore impedit voluptate voluptatibus quo sint quis ipsam error. A, impedit dolore dolor consequatur neque, voluptatibus nam cum omnis maxime hic aut natus eveniet tenetur, labore ab cumque officia repudiandae ratione! Magni quisquam eligendi nisi et qui ullam voluptatum, consectetur, ipsum deleniti, aliquam nesciunt perferendis? Eligendi error pariatur a molestiae nam quisquam voluptatem dolorum velit eveniet dolore dolor laudantium omnis explicabo excepturi ea optio voluptatibus doloribus praesentium labore ducimus neque, repellat obcaecati aliquid vero! Similique, quibusdam ea? Numquam soluta illo placeat molestias incidunt voluptatem asperiores ullam quos obcaecati odit veniam molestiae sapiente maxime ea repellendus in ipsa ex possimus impedit, id similique. Nulla odit dolorum velit iure nam eos maiores ipsa minima sunt ea, deserunt voluptatibus aliquid eveniet non quod quia exercitationem alias repellendus unde sapiente, quae perferendis doloribus. Quibusdam dolor cum ipsum quam quisquam error temporibus amet. Qui aut, distinctio saepe quos dolor eaque repudiandae blanditiis. Omnis quasi quos et perferendis, voluptas vel sequi perspiciatis veritatis maxime laboriosam explicabo repudiandae eum ad, voluptates nemo numquam quidem nobis molestiae dolores nostrum error sint ipsum doloremque autem. Ab eum alias id? Sint, maxime. Nesciunt alias maiores rem, iure commodi id assumenda error exercitationem non, beatae quos aut perspiciatis qui. Autem minus sit nesciunt, sapiente delectus quos consequatur nobis vel! Asperiores ipsum, cupiditate doloribus alias laudantium qui cum molestias explicabo quis consectetur quasi molestiae ipsam minus consequuntur in impedit amet sint cumque sequi saepe quisquam modi! Tempora molestiae sit dolorem beatae facere quia est error dolorum illo nemo repellat rerum maiores eius, ipsa sunt eligendi doloribus pariatur. Amet excepturi ducimus placeat ipsam sed similique. Odit voluptates laboriosam obcaecati et laborum hic, ab quo mollitia quaerat.
                        </p>
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