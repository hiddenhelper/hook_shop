<?php 
	require_once 'inc/header.php'; 
	if (isset($_POST['submit'])) {
		if (md5($_POST['cpass']) == $_SESSION['user_data']['password']) {
			if ($_POST['npass'] == $_POST['cnpass']){
				$result = $db->update('members',array('password'=>md5($_POST['npass'])),array('id'=>$_SESSION['user_data']['id']));
				if ($result == true) {
					$resultArray = $db->select('members',array('id'=>$_SESSION['user_data']['id']));
					$_SESSION['user_data'] = $resultArray[0];
					echo '<script>alert("Password Updated!!!");</script>';
				}
			} else {
				echo '<script>alert("Password donot match. Please confirm your password carefully!!!");</script>';
			}
		} else {
			echo '<script>alert("Invalid Current Password!!!");</script>';
		}
	}
?>
<div class="container main-content">
	<h3>Edit Password</h3>
	<hr>
	<form action="" method="post">
		<div class="row">
			<div class="col-md-2" ><p style="padding-top:5px;">Current Password:</p> </div>
			<div class="col-md-4"><input type="password" name="cpass" placeholder="Enter your Current Password" value="" class="form-control" required></div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-2" ><p style="padding-top:5px;">New Password:</p> </div>
			<div class="col-md-4"><input type="password" name="npass" placeholder="Enter your New Password" value="" class="form-control" required></div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-2" ><p style="padding-top:5px;">Confirm New Password:</p> </div>
			<div class="col-md-4"><input type="password" name="cnpass" placeholder="Enter your New Password" value="" class="form-control" required></div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-2"> </div>
			<div class="col-md-4"><input type="submit" name="submit" value="Update Email" class="btn btn-primary"></div>
		</div>
	</form>
</div>
<?php require_once 'inc/footer.php'; ?>