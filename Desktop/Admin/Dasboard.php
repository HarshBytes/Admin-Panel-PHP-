<!DOCTYPE html>
<html>
<head>
	<title>Swadisht App</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		/* Custom styles */
		.section-1 {
			background-color: #f8f9fa; 
			padding: 20px;
		}

		.section-1 h1 {
			color: #76473A; 
			font-weight: bold;
			
		}
		.section-2 h2{
			color: teal; 
		}

		.section-2 p {
			color: #6c757d; 
		}

		.section-3 {
			background-color: #f8f9fa; 
			padding: 20px;
		}

		.section-3 h2 {
			color: teal;
			font-size: 24px;
			margin-bottom: 20px;
			
		}

		.section-3 ul {
			list-style-type: none;
			padding-left: 0;
		}

		.section-3 li {
			margin-bottom: 10px;
		}
	
.center-image{
	display: block;
  margin-left: auto;
  margin-right: auto;
}
.image-crop {
  width: 400px; /* Set the desired width for the cropped image */
  height: 400px; /* Set the desired height for the cropped image */
  overflow: hidden;
  display: block;
  margin-left: auto;
  margin-right: auto;
}
		
	</style>
</head>
<body>
	<?php
	include("header.php");
	?>

	<main>
		<div class="section-1">
			<div class="container text-center">
				<h1 class="display-4">Welcome to Swadisht App</h1>
				
			</div>
		</div>

		<div class="section-2">
			<div class="container">
				<h2>About Swadisht App</h2>
				<p class="lead">
					Swadisht App is a revolutionary platform that brings together food lovers and restaurants. With our app, you can explore a wide range of delicious cuisines, place orders, and have them delivered right to your doorstep. We strive to provide a seamless and delightful experience for all food enthusiasts.
				</p>
				<div class="image-crop">
				<img src="https://www.amusingfoodie.com/wp-content/uploads/2012/08/elegant-finger-foods-homecoming-pin-512x1024.png" alt="Image 2" class="img-fluid center-image" align="text-center">
			</div>
			</div>
		</div>

		<div class="section-3">
			<div class="container">
				<h2>Our Services</h2>
				<p>
					At Swadisht App, we offer a variety of services to enhance your food experience:
				</p>
				<ul>
					<li>Explore a vast collection of restaurants and menus</li>
					<li>Place orders with just a few clicks</li>
					<li>Customize your orders based on your preferences</li>
					<li>Track your order in real-time</li>
					<li>Enjoy fast and reliable delivery</li>
				</ul>
				<img src="https://www.telegraph.co.uk/content/dam/Travel/2016/june/french-waiter-AP-TRAVEL-xlarge.jpg" alt="Image 3"class="img-fluid center-image" height="500px" width="500px" >
			</div>
		</div>
	</main>

	<?php
	include("footer.php");
	?>
</body>
</html>
