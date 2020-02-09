<?php 
	require_once 'inc/header.php'; 
	if (isset($_POST['submit'])) {
		$update = $db->update('members',array('full_name'=>$_POST['f_name']),array('id'=>$_SESSION['user_data']['id']));
		if ($update == true) {
			$resultArray = $db->select('members',array('id'=>$_SESSION['user_data']['id']));
			$_SESSION['user_data'] = $resultArray[0];
			echo '<script>alert("Profile Updated");</script>';
		}
		
	}
?>
<div class="container main-content">
	<h3>Edit Profile</h3>
	<hr>
	<form action="" method="post">
		<div class="row">
			<div class="col-md-2" ><p style="padding-top:5px;">Full Name:</p> </div>
			<div class="col-md-4"><input type="text" name="f_name" placeholder="Enter your Full Name" value="<?=$_SESSION['user_data']['full_name'];?>" class="form-control" required></div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-2" ><p style="padding-top:5px;">Email : </p> </div>
			<div class="col-md-4"><a href="changeEmail.php" class="btn btn-default"><i>Click Here to Change Email </i></a>(<?=$_SESSION['user_data']['email']?>)</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-2" ><p style="padding-top:5px;">Password : </p> </div>
			<div class="col-md-4"><a href="changePassword.php" class="btn btn-default"><i>Click Here to Change Password </i></a></div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-2"> </div>
			<div class="col-md-4"><input type="submit" name="submit" value="Update Profile" class="btn btn-primary"></div>
		</div>
	</form>
</div>
<?php require_once 'inc/footer.php'; ?>