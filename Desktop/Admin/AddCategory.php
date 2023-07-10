<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		.container {
		display: block;
		margin-left: auto;
		margin-right: auto;
	}

	.form-group {
		background-color: #f8f9fa;
		padding: 20px;
	}

	.container h1 {
		color: #76473A;
		font-weight: bold;
	}

	.center-button {
		text-align: center;
	}


	</style>
</head>
<body>
	<?php 
		include("header.php");
		session_start();
	?>
	<div class="container" >
		<main>
			<h1>Add Category</h1>
			<div class="row">
				<div class="col-md-8">
					<form action="catprocess.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="exampleInputEmail1">Category Name</label>
							<input type="text" name="cname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Indian, Italian, Mexican...">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Category Thumbnail</label>
							<input type="file" name="upload" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Short Description</label>
							<textarea name="sdesc" rows="10" cols="15" class="form-control" placeholder="Indian cuisine offers a diverse range of categories, including Curries, Biryani and Pulao, Tandoori, Dosa and Idli"></textarea>
						</div>
						<div class="form-group d-flex justify-content-center">
						<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
					<?php 
						if (isset($_SESSION['msg1'])) {
					?>
						<div class="alert alert-success" role="alert">
  							<?php echo $_SESSION['msg1'];
  							unset($_SESSION['msg1']); ?>
						</div>
					<?php 
						}
						if (isset($_SESSION['msg2'])) {
					?>
						<div class="alert alert-danger" role="alert">
 							<?php echo $_SESSION['msg2'];
 							unset($_SESSION['msg2']); ?>
						</div> 
					<?php 
						}
					?>
				</div>
			</div>
		</main>
	</div>
	<?php 
		include("footer.php");
	?>
</body>
</html>
