<?php 
	require_once 'inc/header.php';
	
	$result = $db->select('categories');

	if (isset($_GET['delete']) && isset($_SESSION['login'])) {
		$num_row = $db->select('categories',array('id'=>$_GET['delete']));
		if (count($num_row) > 0) {
			$deleted = $db->delete('categories',array('id'=>$_GET['delete']));
			if ($deleted === true) {
				header('Location: editcategory.php');
			}
		} 
	}
	if(isset($_GET['updated'])) {
		echo '<script>alert("Category Updated !!");</script>';
	}

	function cmp($a, $b) {
	    return strcmp($a['category_name'], $b['category_name']);
	}

	if(isset($_GET['sort_cat'])) {
		usort($result, "cmp");
	}
?>
<div class="container main-content">
	<h3>View /  Edit Categories</h3>
	<hr>
	<?php if(count($result) > 0) : ?>
		<table class="table table-stri">
			<tr>
				<th>S NO.</th>
				<th>
					<div class="row">
						<div class="col-md-6">
							Category Name
						</div>
						<div class="col-md-3">
							<form method="get">
								<input type="submit" name="sort_cat" id="sort_cat" value="Sort by Name" />
							</form>
						</div>
					</div>
				</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php 
				$i = 1;
				foreach ($result as $item) : 
			?>
				<tr>
					<td><?=$i;?></td>
					<td><?=strtoupper($item['category_name']);?></td>
					<td><a href="addcategory.php?edit=<?=$item['id'];?>">Edit</a></td>
					<td><a href="editcategory.php?delete=<?=$item['id'];?>" style="color:red;">Delete</a></td>
				</tr>
			<?php
				$i++; 
				endforeach;
			?>
		</table>
	<?php else : ?>
		<p>No Category Added Yet. <a href="addcategory.php">Click Here</a> to Add New Category</p>
	<?php endif;?>
</div>
<?php require_once 'inc/footer.php'; ?>