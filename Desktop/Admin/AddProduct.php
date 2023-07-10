<!DOCTYPE html>
<html>
<head>
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
	<div class="container">
		<main>
			<h1>Add Product</h1>
			<div class="row">
				<div class="col-md-8">
					<form action="proprocess.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="exampleInputEmail1">Select Category</label>
							<select name="Category" class="form-control">
								<?php 
									$conn = mysqli_connect("localhost", "root", "");
    								mysqli_select_db($conn, "ecommdb");
									$qry = "SELECT * FROM tbl_category";
									$raw = mysqli_query($conn, $qry);
									while ($res = mysqli_fetch_array($raw)) {
								?>
								<option value="<?php echo $res['id']; ?>"><?php echo $res['catname']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Product Name</label>
							<input type="text" name="pname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Indian, Italian, Mexican...">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Product Thumbnail</label>
							<input type="file" name="upload" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div>
						<div class="form-check">
							<label for="exampleInputPassword1">Product Description</label>
							<textarea name="pdesc" rows="10" cols="15" class="form-control" placeholder="Indian cuisine offers a diverse range of categories, including Curries, Biryani and Pulao, Tandoori, Dosa and Idli"></textarea>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Product Price</label>
							<input type="text" name="pprice" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Indian, Italian, Mexican...">
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
