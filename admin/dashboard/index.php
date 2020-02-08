<?php require_once 'inc/header.php'; ?>
<div class="container main-content">
	<h3>Welcome, <?=ucfirst($_SESSION['user_data']['full_name']);?></h3>
	<hr>
	<div class="row">
		<div class="col-md-3">
			<div class="thumbnail text-center" >
				<h4>Add Products<h4>
				<a href="addproduct.php" class="btn btn-primary"><i class="fas fa-plus-square" ></i> Add Products</a>
				<div style="clear:both;"></div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="thumbnail text-center" >
				<h4>View/Edit Products<h4>
				<a href="editproduct.php" class="btn btn-success"><i class="fas fa-edit" ></i> View/Edit Products</a>
				<div style="clear:both;"></div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="thumbnail text-center" >
				<h4>Add Category<h4>
				<a href="addcategory.php" class="btn btn-default"><i class="fas fa-plus-square" ></i> Add Category</a>
				<div style="clear:both;"></div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="thumbnail text-center" >
				<h4>View/Edit Category<h4>
				<a href="editcategory.php" class="btn btn-danger"><i class="fas fa-edit" ></i> View/Edit Category</a>
				<div style="clear:both;"></div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3">
			<div class="thumbnail text-center" >
				<h4>Add Sub Category<h4>
				<a href="addsubcategory.php" class="btn btn-info"><i class="fas fa-plus-square" ></i> Add Sub Category</a>
				<div style="clear:both;"></div>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="thumbnail text-center" >
				<h4>View/Edit Sub Category<h4>
				<a href="editsubcategory.php" class="btn btn-warning"><i class="fas fa-edit" ></i> View/Edit Sub Category</a>
				<div style="clear:both;"></div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'inc/footer.php'; ?>