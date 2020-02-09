<?php
	require_once 'inc/header.php';

	if (isset($_POST['submit'])) {
		$cat = htmlentities(strtolower($_POST['sub_cat']));
		$parent_cat = htmlentities(strtolower($_POST['parent_cat']));

		$imageFile = $_FILES['sub_categories_img']['name'];
		$imageFileTemp = $_FILES['sub_categories_img']['tmp_name'];
		$imageFileExplode = explode('.',$imageFile);
		$imageFileExtention = strtolower(end($imageFileExplode));
		$imageFileUrl = 'uploads/'.uniqid().'.'.$imageFileExtention;

		$num_row = $db->select('sub_categories',array('sub_cat'=>$cat));
		if (count($num_row) > 0) {
				echo '<script>alert("Category Already Exist !!");</script>';
		} else {
				if ($imageFileExtention == 'jpg' || $imageFileExtention == 'png' || $imageFileExtention == 'gif' || $imageFileExtention == 'jpeg') {
					if (move_uploaded_file($imageFileTemp, $imageFileUrl)) {
						$result = $db->insert('sub_categories',array('sub_cat'=>$cat,'parent_cat_id'=>$parent_cat,'img_url'=>$imageFileUrl));
						if ($result ===  true) {
							echo '<script>alert("SubCategory Added Successfully !!");</script>';
						}
					} else {
						echo '<script>alert("Please Try Again, Internal Error Occurred !!!");</script>';
						echo '<script>window.history.back();</script>';
					}
				} else {
					echo '<script>alert("Please Upload Correct File!!");</script>';
					echo '<script>window.history.back();</script>';
				}
			}

		}

	if (isset($_POST['update'])) {
		$cat = htmlentities(strtolower($_POST['sub_cat']));
		$parent_cat = htmlentities(strtolower($_POST['parent_cat']));

		$num_row = $db->select('sub_categories',array('sub_cat'=>$cat));

		$imageFile = $_FILES['sub_categories_img']['name'];

		if ($_GET['name'] != $cat) {
			if (count($num_row) > 0) {
					echo '<script>alert("SubCategory Already Exist !!");</script>';
					$status = false;
			} else {
					$status = true;
			}
		} else {
				$status = true;
		}

		if ($status === true ){
			if ($imageFile != '') {
			  $imageFileTemp = $_FILES['sub_categories_img']['tmp_name'];
			  $imageFileExplode = explode('.',$imageFile);
			  $imageFileExtention = strtolower(end($imageFileExplode));
			  $imageFileUrl = 'uploads/'.uniqid().'.'.$imageFileExtention;
			  if ($imageFileExtention == 'jpg' || $imageFileExtention == 'png' || $imageFileExtention == 'gif' || $imageFileExtention == 'jpeg') {
			    if (move_uploaded_file($imageFileTemp, $imageFileUrl)) {
			      $result = $db->update('sub_categories',array('sub_cat'=>$cat,'parent_cat_id'=>$parent_cat,'img_url'=>$imageFileUrl),array('id'=>$_POST['catid']));
			      if ($result ===  true) {
			        echo '<script>alert("SubCategory Updated Successfully !!");</script>';
			      }
			    } else {
			      echo '<script>alert("Please Try Again, Internal Error Occurred !!!");</script>';
			      echo '<script>window.history.back();</script>';
			    }
			  } else {
			    echo '<script>alert("Please Upload Correct File!!");</script>';
			    echo '<script>window.history.back();</script>';
			  }
			} else {
			  $result = $db->update('sub_categories',array('sub_cat'=>$cat,'parent_cat_id'=>$parent_cat),array('id'=>$_POST['catid']));
			  if ($result ===  true) {
			    echo '<script>alert("SubCategory Updated Successfully !!");</script>';
			    //header('location: editsubcategory.php?updated');
			  }
			}
		}

	}

	if (isset($_GET['edit']) && isset($_SESSION['login'])) {
		$num_row = $db->select('sub_categories',array('id'=>$_GET['edit']));
		if (count($num_row) > 0) {
			$data = $num_row[0];

		}
	}


?>
<div class="container main-content">
	<h3>Add Sub Categories</h3>
	<hr>
	<?php
	$categories = $db->select('categories');
	if (count($categories) > 0) {
	?>
	<form action="" method="post" enctype="multipart/form-data">
		<?php if (isset($_GET['edit']) && isset($_SESSION['login'])) : ?>
			<input type="hidden" name="catid" value="<?=$_GET['edit'];?>">
		<?php endif; ?>
		<div class="row">
			<div class="col-md-2" ><p style="padding-top:5px;">Parent Category:</p> </div>
			<div class="col-md-4">
				<select class="form-control" name="parent_cat">
					<?php
						foreach($categories as $item):
							if ($_GET['parent_id']==$item['id']) {
								$selected = 'selected';
							} else {
								$selected = '';
							}
					?>
					<option value="<?=$item['id'];?>" <?=$selected;?>><?=strtoupper($item['category_name']);?></option>
					<?php endforeach;?>
				</select>
			</div>
		</div>

		<br />
		<div class="row">
			<div class="col-md-2" ><p style="padding-top:5px;">Sub Category Name:</p></div>
			<div class="col-md-4"><input type="text" name="sub_cat" placeholder="Enter your Category Name" value="<?php if (isset($_GET['edit']) && isset($_SESSION['login'])) { echo $data['sub_cat']; } else { echo ''; } ?>" class="form-control" required></div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-2" ><p style="padding-top:5px;">Attachment (Example: Image File)</p> </div>
			<div class="col-md-4">
				<input type="file" name="sub_categories_img" style="margin-top:7px;" <?php if (isset($_GET['edit']) && isset($_SESSION['login'])) { echo ''; } else { echo 'required'; } ?>>
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-md-2"> </div>
			<div class="col-md-4"><input type="submit" name="<?php if (isset($_GET['edit']) && isset($_SESSION['login'])) { echo 'update'; } else { echo 'submit'; } ?>" value="<?php if (isset($_GET['edit']) && isset($_SESSION['login'])) { echo 'Update'; } else { echo 'Add'; } ?> Category" class="btn btn-primary"></div>
		</div>
	</form>
	<?php
	} else {
		?>
		<p>No Parent Category Added Yet. <a href="addcategory.php">Click Here</a> to Add New Parent Category</p>
		<?php
	}
	?>
</div>
<?php require_once 'inc/footer.php'; ?>
