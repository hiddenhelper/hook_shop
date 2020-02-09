<?php 
	require_once 'inc/header.php'; 
	if (isset($_POST['submit'])) {
		if ($_POST['email'] != $_SESSION['user_data']['email']) {
			$rows = $db->select('members',array('email'=>$_POST['email']));
			if (count($rows) > 0) {
				echo '<script>alert("Email Already Used!!!");</script>';
			} else {
				$update = $db->update('members',array('email'=>$_POST['email']),array('id'=>$_SESSION['user_data']['id']));
				if ($update == true) {
					$resultArray = $db->select('members',array('id'=>$_SESSION['user_data']['id']));
					$_SESSION['user_data'] = $resultArray[0];
					echo '<script>alert("Email Updated!!!");</script>';
				}
			}
			
		}
		
		
	}
?>
<div class="container main-content">
	<h3>Edit Profile</h3>
	<hr>
	<form action="" method="post">
		<div class="row">
			<div class="col-md-2" ><p style="padding-top:5px;">Enter New Email:</p> </div>
			<div class="col-md-4"><input type="email" name="email" placeholder="Enter your Full Name" value="<?=$_SESSION['user_data']['email'];?>" class="form-control" required></div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-2"> </div>
			<div class="col-md-4"><input type="submit" name="submit" value="Update Email" class="btn btn-primary"></div>
		</div>
	</form>
</div>
<?php require_once 'inc/footer.php'; ?>