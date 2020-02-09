<?php
	require_once 'inc/header.php';
	$result = $db->select('sub_categories');
	$result_cat = $db->select('categories');

	if (isset($_GET['edit']) && isset($_SESSION['login'])) {
		$num_row = $db->select('products',array('id'=>$_GET['edit']));
		if (count($num_row) > 0) {
			$data = $num_row[0];

		}
	}

	if (isset($_POST['submit_products'])) {
		$productValidation = $db->select('products',array('product_name'=>$_POST['product_name']));
		if (count($productValidation) > 0) {
			echo '<script>alert("Product Name Aleardy Used!!");</script>';
			echo '<script>window.history.back();</script>';
		} else {
			/* Image File */
			$imageFile = $_FILES['product_image']['name'];
			$imageFileTemp = $_FILES['product_image']['tmp_name'];
			$imageFileExplode = explode('.',$imageFile);
			$imageFileExtention = strtolower(end($imageFileExplode));
			$imageFileUrl = 'uploads/'.uniqid().'.'.$imageFileExtention;
			/* Product Attachment */
			$prductAttachment = $_FILES['product_attachment']['name'];

			if ($prductAttachment != '') {
				/* Product Attachment */
				$prductAttachment = $_FILES['product_attachment']['name'];
				$prductAttachmentTemp = $_FILES['product_attachment']['tmp_name'];
				$prductAttachmentExplode = explode('.',$prductAttachment);
				$prductAttachmentExtention = strtolower(end($prductAttachmentExplode));
				$prductAttachmentUrl = 'uploads/'.uniqid().'.'.$prductAttachmentExtention;
			} else {
				$prductAttachmentUrl = '';
			}


			if ($imageFileExtention == 'jpg' || $imageFileExtention == 'png' || $imageFileExtention == 'gif' || $imageFileExtention == 'jpeg') {
				if (move_uploaded_file($imageFileTemp, $imageFileUrl)) {
					if (($prductAttachmentUrl != '') && ($prductAttachmentExtention == 'pdf')){
						move_uploaded_file($prductAttachmentTemp, $prductAttachmentUrl);
					}
					$query = $db->insert('products',array(
						'product_name' => $_POST['product_name'],
						'product_description' => $_POST['product_description'],
						'product_category' => $_POST['product_cat'],
						'popular' => $_POST['popular_product'],
                        'new_product' => $_POST['new_product'],
						'product_image' => $imageFileUrl,
						'product_attachment' => $prductAttachmentUrl
					));
					if ($query == true) {
						echo '<script>alert("Product Added Successfully");</script>';
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


	if (isset($_POST['update_products'])) {
		$product = $db->select('products',array('id'=>$_GET['edit']));
		if (count($product) > 0 ) {
			if ($product[0]['product_name'] != $_POST['product_name']) {
				$productValidation = $db->select('products',array('product_name'=>$_POST['product_name']));
				if (count($productValidation) > 0) {
					echo '<script>alert("Product Name Aleardy Used!!");</script>';
					$update = false;
				} else {
					$update = true;
				}
			} else {
				$update = true;
			}
		} else {
			header('Location: editproduct.php');
		}
		if ($update == true) {
			/* Image File */
			$imageFile = $_FILES['product_image']['name'];
			$imageFileTemp = $_FILES['product_image']['tmp_name'];
			$imageFileExplode = explode('.',$imageFile);
			$imageFileExtention = strtolower(end($imageFileExplode));
			$imageFileUrl =  'uploads/'.uniqid().'.'.$imageFileExtention;
			/* Product Attachment */
			$prductAttachment = $_FILES['product_attachment']['name'];
			$prductAttachmentTemp = $_FILES['product_attachment']['tmp_name'];
			$prductAttachmentExplode = explode('.',$prductAttachment);
			$prductAttachmentExtention = strtolower(end($prductAttachmentExplode));
			$prductAttachmentUrl = 'uploads/'.uniqid().'.'.$prductAttachmentExtention ;

			if ($imageFile!='' && $prductAttachment == '') {
				if (($imageFileExtention == 'jpg' || $imageFileExtention == 'png' || $imageFileExtention == 'gif' || $imageFileExtention == 'jpeg')) {
					if (move_uploaded_file($imageFileTemp, $imageFileUrl)) {
						$query = $db->update('products',array(
							'product_name' => $_POST['product_name'],
							'product_description' => $_POST['product_description'],
							'product_category' => $_POST['product_cat'],
							'popular' => $_POST['popular_product'],
                            'new_product' => $_POST['new_product'],
							'product_image' => $imageFileUrl,
						),array('id'=>$_GET['edit']));
						if ($query == true) {
							header('Location: editproduct.php?update');
						}
					} else {
						echo '<script>alert("Please Try Again, Internal Error Occurred !!!");</script>';
					}
				} else {
					echo '<script>alert("Please Upload Correct File!!");</script>';
				}
			} else if ($imageFile =='' && $prductAttachment != '') {
				if ($prductAttachmentExtention == 'pdf') {
					if (move_uploaded_file($prductAttachmentTemp, $prductAttachmentUrl)) {
						$query = $db->update('products',array(
							'product_name' => $_POST['product_name'],
							'product_description' => $_POST['product_description'],
							'product_category' => $_POST['product_cat'],
							'popular' => $_POST['popular_product'],
                            'new_product' => $_POST['new_product'],
							'product_attachment' => $prductAttachmentUrl,
						),array('id'=>$_GET['edit']));
						if ($query == true) {
							header('Location: editproduct.php?update');
						}
					} else {
						echo '<script>alert("Please Try Again, Internal Error Occurred !!!");</script>';
					}
				} else {
					echo '<script>alert("Please Upload Correct File!!");</script>';
				}
			} else if ($imageFile !='' && $prductAttachment != '') {
				if (($imageFileExtention == 'jpg' || $imageFileExtention == 'png' || $imageFileExtention == 'gif' || $imageFileExtention == 'jpeg') && ($prductAttachmentExtention == 'pdf')) {
					if (move_uploaded_file($imageFileTemp, $imageFileUrl) && move_uploaded_file($prductAttachmentTemp, $prductAttachmentUrl)) {
						$query = $db->update('products',array(
							'product_name' => $_POST['product_name'],
							'product_description' => $_POST['product_description'],
							'product_category' => $_POST['product_cat'],
							'popular' => $_POST['popular_product'],
                            'new_product' => $_POST['new_product'],
							'product_image' => $imageFileUrl,
							'product_attachment' => $prductAttachmentUrl
						),array('id'=>$_GET['edit']));
						if ($query == true) {
							header('Location: editproduct.php?update');
						}
					} else {
						echo '<script>alert("Please Try Again, Internal Error Occurred !!!");</script>';
					}
				} else {
					echo '<script>alert("Please Upload Correct File!!");</script>';
				}
			}
			else {
				$query = $db->update('products',array(
					'product_name' => $_POST['product_name'],
					'product_description' => $_POST['product_description'],
					'popular' => $_POST['popular_product'],
                    'new_product' => $_POST['new_product'],
					'product_category' => $_POST['product_cat']
				),array('id'=>$_GET['edit']));
				if ($query == true) {
					header('Location: editproduct.php?update');
				}
			}
		}


	}
?>
<div class="container main-content">
	<h3>Add Products</h3>
	<hr>
	<?php if(count($result) > 0) : ?>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-2" ><p style="padding-top:5px;">Product Name:</p> </div>
				<div class="col-md-4"><input type="text" name="product_name" placeholder="Enter your Product Name Name" value="<?php if (isset($_GET['edit']) && isset($_SESSION['login'])) { echo $data['product_name']; } else { echo ''; } ?>" class="form-control" required></div>
			</div>
			<br>
			
			<div class="row">
				<div class="col-md-2" ><p style="padding-top:5px;">Product Category:</p> </div>
				<div class="col-md-4">
					<select name="product_cat_big" class="form-control" id="product_cat_big">
						<option <?php if (isset($_GET['edit']) && isset($_SESSION['login'])) {echo '';} else {echo 'selected';} ?> value="">Select your Category</option>
						<?php
							foreach($result_cat as $item_cat) :
						?>
							<option value="<?=$item_cat['id'];?>"><?=strtoupper($item_cat['category_name']);?></option>
						<?php endforeach;?>
					</select>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-2" ><p style="padding-top:5px;">Product Sub Category:</p> </div>
				<div class="col-md-4">
					<select name="product_cat" class="form-control" id="product_cat" required>
						<option <?php if (isset($_GET['edit']) && isset($_SESSION['login'])) {echo '';} else {echo 'selected';} ?> value="">Select your Sub Category</option>
						<?php
							foreach($result as $item) :
								if ($data['product_category']==$item['id']) {
									$selected = 'selected';
								} else {
									$selected = '';
								}
						?>
								
						<?php endforeach;?>
					</select>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-2" ><p style="padding-top:5px;">Popular Product:</p> </div>
				<div class="col-md-4">
				<?php
					if (isset($_GET['edit']) && isset($_SESSION['login'])) {
						if($data['popular'] == 'yes') {
							$yes_selected = 'selected';
						} else {
							$yes_selected = '';
						}
					}else {
					      	$yes_selected = '';
					}
				?>
					<select name="popular_product" class="form-control" required>

						<option value='no'>NO</option>
						<option value='yes' <?=$yes_selected;?>>YES</option>
					</select>
				</div>
			</div>
			<br>

            <div class="row">
				<div class="col-md-2" ><p style="padding-top:5px;">New Product:</p> </div>
				<div class="col-md-4">
				<?php if (isset($_GET['edit']) && isset($_SESSION['login'])) {
					if($data['new_product'] == 'yes') {
						$yes_new_selected = 'selected';
					} else {
						$yes_new_selected = '';
					}
				      } else {
				      	$yes_new_selected = '';
				      }
				?>
					<select name="new_product" class="form-control" required>

						<option value='no'>NO</option>
						<option value='yes' <?=$yes_new_selected ;?>>YES</option>
					</select>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-2" ><p style="padding-top:5px;">Product Description:</p> </div>
				<div class="col-md-10">
					<textarea name="product_description" id="product_description" placeholder="Enter your Product Description"class="form-control" rows="10" required><?php if (isset($_GET['edit']) && isset($_SESSION['login'])) { echo $data['product_description']; } else { echo ''; } ?></textarea>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-2" ><p style="padding-top:5px;">Product Image:</p> </div>
				<div class="col-md-4">
					<input type="file" name="product_image" style="margin-top:7px;" <?php if (isset($_GET['edit']) && isset($_SESSION['login'])) { echo ''; } else { echo 'required'; } ?>>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-2" ><p style="padding-top:5px;">Product Attachment (Example: PDF File)</p> </div>
				<div class="col-md-4">
					<input type="file" name="product_attachment" style="margin-top:7px;" <?php if (isset($_GET['edit']) && isset($_SESSION['login'])) { echo ''; } else { echo ''; } ?>>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-2"> </div>
				<div class="col-md-4"><input type="submit" name="<?php if (isset($_GET['edit']) && isset($_SESSION['login'])) { echo 'update_products'; } else { echo 'submit_products'; } ?>" value="<?php if (isset($_GET['edit']) && isset($_SESSION['login'])) { echo 'Update'; } else { echo 'Add'; } ?> Product" class="btn btn-primary"></div>
			</div>
		</form>
	<?php else : ?>
		<p style="color:red;font-size:18px;">Note : At least one Sub category is required to add <i>Products</i>.</p>
		<p>No Sub Category Added Yet. <a href="addsubcategory.php">Click Here</a> to Add New Sub Category. </p>
	<?php endif;?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#product_cat_big").on('change', function () { 
			var sub_cat = '<?= json_encode($result); ?>';
			sub_cat = JSON.parse(sub_cat);
			$("#product_cat").empty();
			$("#product_cat").append(new Option("Select your Sub Category", ""));
			for (var i = 0; i < sub_cat.length; i ++) {
				if (sub_cat[i].parent_cat_id == $("#product_cat_big").val()) {
					$("#product_cat").append(new Option(sub_cat[i].sub_cat.toUpperCase(), sub_cat[i].id));
				}
			}
		})
	});
</script>
<?php require_once 'inc/footer.php'; ?>
