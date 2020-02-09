<?php 
	require_once 'inc/header.php'; 

	if (isset($_POST['submit'])) {
		$cat = htmlentities(strtolower($_POST['cat']));
		$num_row = $db->select('categories',array('category_name'=>$cat));
		if (count($num_row) > 0) {
				echo '<script>alert("Category Already Exist !!");</script>';
		} else {
			$result = $db->insert('categories',array('category_name'=>$cat));
			if ($result ===  true) {
				echo '<script>alert("Category Added Successfully !!");</script>';
			}
		}	
	}

	if (isset($_POST['update'])) {
		$cat = htmlentities(strtolower($_POST['cat']));
		$num_row = $db->select('categories',array('category_name'=>$cat));
		if (count($num_row) > 0) {
				echo '<script>alert("Category Already Exist !!");</script>';
		} else {
			$result = $db->update('categories',array('category_name'=>$cat),array('id'=>$_POST['catid']));
			if ($result ===  true) {
				header('location: editcategory.php?updated');
			} 
		}
		
	}

	if (isset($_GET['edit']) && isset($_SESSION['login'])) {
		$num_row = $db->select('categories',array('id'=>$_GET['edit']));
		if (count($num_row) > 0) {
			$data = $num_row[0];
		
		} 
	}


?>
<div class="container main-content">
	<h3>Add Categories</h3>
	<hr>
	<form action="" method="post">
		<?php if (isset($_GET['edit']) && isset($_SESSION['login'])) : ?>
			<input type="hidden" name="catid" value="<?=$_GET['edit'];?>">
		<?php endif; ?>
		<div class="row">
			<div class="col-md-2" ><p style="padding-top:5px;">Category Name:</p> </div>
			<div class="col-md-4"><input type="text" name="cat" placeholder="Enter your Category Name" value="<?php if (isset($_GET['edit']) && isset($_SESSION['login'])) { echo $data['category_name']; } else { echo ''; } ?>" class="form-control" required></div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-2"> </div>
			<div class="col-md-4"><input type="submit" name="<?php if (isset($_GET['edit']) && isset($_SESSION['login'])) { echo 'update'; } else { echo 'submit'; } ?>" value="<?php if (isset($_GET['edit']) && isset($_SESSION['login'])) { echo 'Update'; } else { echo 'Add'; } ?> Category" class="btn btn-primary"></div>
		</div>
	</form>
</div>
<?php require_once 'inc/footer.php'; ?>