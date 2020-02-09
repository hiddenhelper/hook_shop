<?php
	require_once 'inc/header.php';
	$result = $db->select('sub_categories');
	if (isset($_GET['edit']) && isset($_GET['name'])) {
		if (trim($_GET['edit']) === '' || trim($_GET['name']) === '') {
			header('Location: editproduct.php');
		}
	} else {
		header('Location: editproduct.php');
	}
	if (isset($_POST['submit'])) {
		$cat_id = $_POST['cat_id'];
		$q = $db->select('products',['id'=>$_GET['edit']]);
		if (count($q) > 0) {
				$q2 = $db->insert('products',[
					'product_name' => $q[0]['product_name'],
					'product_description' => $q[0]['product_description'],
					'product_category' => $cat_id,
					'product_image' => $q[0]['product_image'],
					'product_attachment' => $q[0]['product_attachment'],
					'popular' => $q[0]['popular'],
					'new_product' => $q[0]['new_product']
				]);
				if ($q2===true) {
					echo '<script>alert("Product Cloned Successfully!!");</script>';
				} else {
					echo '<script>alert("Internal Error!! Please Try Again Later...");</script>';
				}
		} else {
			echo '<script>alert("Internal Error!! Please Try Again Later...");</script>';
		}
	}


?>
<div class="container main-content">
	<h3>Clone <?=$_GET['name'];?> to New Categories</h3>
	<hr>
	<form action="" method="post">
		<div class="row">
			<div class="col-md-2" ><p style="padding-top:5px;">Select Category:</p> </div>
			<div class="col-md-4">
				<select class="form-control" name="cat_id" required>
					<option value="">Select your Category</option>
					<?php
						foreach($result as $item) :
					?>
						<option value="<?=$item['id'];?>"><?=strtoupper($item['sub_cat']);?></option>
					<?php endforeach;?>
				</select>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-4"><a href='editproduct.php' style="margin-right:5px;" class="btn btn-default">Go Back</a><input type="submit" name="submit" value="Clone Product" class="btn btn-primary"></div>
		</div>
	</form>
</div>
<?php require_once 'inc/footer.php'; ?>
