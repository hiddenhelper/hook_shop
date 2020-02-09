<?php
	require_once 'inc/header.php';
	$result = $db->select('sub_categories');
	if (isset($_GET['delete']) && isset($_SESSION['login'])) {
		$num_row = $db->select('sub_categories',array('id'=>$_GET['delete']));
		if (count($num_row) > 0) {
			$deleted = $db->delete('sub_categories',array('id'=>$_GET['delete']));
			if ($deleted === true) {
				header('Location: editsubcategory.php');
			}
		}
	}
	if(isset($_GET['updated'])) {
		echo '<script>alert("Category Updated !!");</script>';
	}

	function cmp_parent($a, $b) {
		if ( $a['parent_cat_id'] == $b['parent_cat_id'] ) return 0;
		return ($a['parent_cat_id']< $b['parent_cat_id'])? -1:1;
	}

	if(isset($_GET['sort_parent'])) {
		usort($result, "cmp_parent");
	}

	function cmp_sub($a, $b) {
	    return strcmp($a['sub_cat'], $b['sub_cat']);
	}

	if(isset($_GET['sort_sub'])) {
		usort($result, "cmp_sub");
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
							Parent Category Name
						</div>
						<div class="col-md-3">
							<form method="get">
								<input type="submit" name="sort_parent" id="sort_parent" value="Sort by Parent" />
							</form>
						</div>
					</div>
				</th>
				<th>
					<div class="row">
						<div class="col-md-6">
							Sub Category Name
						</div>
						<div class="col-md-3">
							<form method="get">
								<input type="submit" name="sort_sub" id="sort_sub" value="Sort by Sub" />
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
					$parent_cat = $db->select('categories',['id'=>$item['parent_cat_id']]);
			?>
				<tr>
					<td><?=$i;?></dh>
					<td><?=strtoupper($parent_cat[0]['category_name']);?></td>
					<td><?=strtoupper($item['sub_cat']);?></td>
					<td><a href="addsubcategory.php?edit=<?=$item['id'];?>&parent_id=<?=$parent_cat[0]['id'];?>&name=<?=$item['sub_cat'];?>">Edit</a></td>
					<td><a href="editsubcategory.php?delete=<?=$item['id'];?>" style="color:red;">Delete</a></td>
				</tr>
			<?php
				$i++;
				endforeach;
			?>
		</table>
	<?php else : ?>
		<p>No Category Added Yet. <a href="addsubcategory.php">Click Here</a> to Add New Sub Category</p>
	<?php endif;?>
</div>
<?php require_once 'inc/footer.php'; ?>
