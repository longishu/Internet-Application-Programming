<?php
include_once 'DBconnector.php';
include_once 'user.php';
include_once 'FileUploader.php';
$con = new DBconnector;
if(isset($_POST['btn-save'])){
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$city = $_POST['city_name'];
	$username = $_POST['username'];
	$password= $_POST['password'];
	$fileToUpload= $_POST['fileToUpload'];




	$user = new user($first_name,$last_name,$city,$username,$password,$fileToUpload);
	$uploader= new FileUploader;
	if (!$user->valiteForm()){
		$user->createFormErrorSessions();
		header("Refresh:20");
		die();
	}
	$res = $user->save();
	$file_upload_response= $uploader->uploadFile();

	if($res){
		echo "Save operation was successful";
	}
	else{
		echo "An error occured!";
	}

}


?>
<!DOCTYPE html>
<html>
<head>
	<title>LAB 1</title>
	<script type="text/javascript" src="validate.js"></script>
	<link rel="stylesheet" type="text/css" href="validate.css">
</head>
<body>
	<form method="post" name="user_details" id="user_details" onsubmit="return validateForm()" action="<?=$_SERVER{'PHP_SELF'}?>">
		<table align="center">
			<tr>
				<td>
					<div id="form-errors">
						<?php
						session_start();
						if (!empty($_SESSION['form-errors'])) {
							echo " ". $_SESSION['form-errors'];
							unset($_SESSION['form-errors']);

				
						}
						?>
					</div>
				</td>
			</tr>
			<tr>
				<td><input type="text" name="first_name" required placeholder="First Name"
				</td>
			</tr>
			<tr>
				<td><input type="text" name="last_name"  placeholder="Last Name"
				</td>
			</tr>
			<tr>
				<td><input type="text" name="city_name"  placeholder="City"
				</td>
			</tr>
			<tr>
				<td><input type="text" name="username"  placeholder="Username"
				</td>
			</tr>
			<tr>
				<td><input type="password" name="password"  placeholder="Password"
				</td>
			</tr>
			<tr>
				<td><input type="file" name="fileToUpload"  placeholder="Profile image:"
				</td>
			</tr>



			<tr>
				<td><button type="submit" name="btn-save"><strong>SAVE</strong></button>
				</td>
			</tr>
			<tr>
				<td><a href="login.php">Login</a></td>
			</tr>
		</table>
	</form>
</body>
</html>


