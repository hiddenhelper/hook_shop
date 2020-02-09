<?php
	require_once 'inc/header.php';
	$result = $db->select('products');
	if (isset($_GET['delete']) && isset($_SESSION['login'])) {
		$num_row = $db->select('products',array('id'=>$_GET['delete']));
		if (count($num_row) > 0) {
			$deleted = $db->delete('products',array('id'=>$_GET['delete']));
			if ($deleted === true) {
				header('Location: editproduct.php');
			}
		}
	}
	if(isset($_GET['update'])) {
		echo '<script>alert("Product Update Successfully");</script>';
	}

	function cmp_name($a, $b) {
		return strcmp($a['product_name'], $b['product_name']);
	}

	if(isset($_GET['sort_name'])) {
		usort($result, "cmp_name");
	}

	function cmp_cat($a, $b) {
	    if ( $a['product_category'] == $b['product_category'] ) return 0;
		return ($a['product_category']< $b['product_category'])? -1:1;
	}

	if(isset($_GET['sort_cat'])) {
		usort($result, "cmp_cat");
	}
?>
<div class="container main-content">
	<h3>View /  Edit Product</h3>
	<hr>
	<?php if(count($result) > 0) : ?>
		<table class="table table-stri">
			<tr>
				<th>S NO.</th>
				<th>
					<div class="row">
						<div class="col-md-6">
							Product Name
						</div>
						<div class="col-md-3">
							<form method="get">
								<input type="submit" name="sort_name" id="sort_name" value="Sort by name" />
							</form>
						</div>
					</div>
				</th>
				<!--<th>Product Desciption</th>-->
				<th>
					<div class="row">
						<div class="col-md-6">
							Product Category
						</div>
						<div class="col-md-3">
							<form method="get">
								<input type="submit" name="sort_cat" id="sort_cat" value="Sort by category" />
							</form>
						</div>
					</div>
				</th>

				<th>Clone Product</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php
				$i = 1;
				foreach ($result as $item) :
			?>
				<tr>
					<td><?=$i;?></dh>
					<td><?=strtoupper($item['product_name']);?></td>
					<!--<td>
						<?php
						if (strlen($item['product_description']) > 20) {
							echo substr($item['product_description'], 0,20).'...';
						} else {
							echo $item['product_description'];
						}
						?>
					</td>-->
					<td>
						<?php
							$cat_name = $db->select('sub_categories',array('id'=>$item['product_category']));
							echo strtoupper($cat_name[0]['sub_cat']);
						?>
					</td>
					<td><a href="cloneproduct.php?edit=<?=$item['id'];?>&name=<?=$item['product_name'];?>">Clone Product</a></td>
					<td><a href="addproduct.php?edit=<?=$item['id'];?>">Edit</a></td>
					<td><a href="editproduct.php?delete=<?=$item['id'];?>" style="color:red;">Delete</a></td>
				</tr>
			<?php
				$i++;
				endforeach;
			?>
		</table>
	<?php else : ?>
		<p>No Product Added Yet. <a href="addproduct.php">Click Here</a> to Add New Category</p>
	<?php endif;?>
</div>
<?php require_once 'inc/footer.php'; ?>
