<?php require_once "session/session.php";?>

<?php confirm_logged_in();?>
<?php include "include/connect.php";?>
<?php
require_once "include/variables.php";
?>

<?php
ini_set("display_errors", "on");
if (isset($_POST['submit'])) {
    // Form has been submitted.

    //getting user's old password
    $username   = logged_in_username();
    $sql1       = "SELECT password FROM user WHERE username='" . $username . "'";
    $pass_query = mysqli_query($connection, $sql1);
    if (!$pass_query) {
        die();
    }
    $record   = mysqli_fetch_assoc($pass_query);
    $old_hash = $record['password'];

    $old_password    = $_POST['old_password'];
    $new_password    = $_POST['new_password'];
    $re_new_password = $_POST['re_new_password'];
    if ($old_hash == md5($old_password)) {
        if ($new_password == $re_new_password) {
            $SQL    = "UPDATE user SET password='" . md5($new_password) . "' WHERE id=1";
            $update = mysqli_query($connection, $SQL);
            if (!$update) {
                die();
            } else {
                $message = "<span class=\"label label-success\">Succesfully Changed</span>";
            }
        } else {

            $message = "<span class=\"label label-warning\">Password Do Not Match. Please Enter The Correct Combination.</span>";
        }
    } else {
        $message = "<span class=\"label label-warning\">Your old password does not match!</span>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GMS: Change Password</title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="css/bootstrap-dropdown.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/form.css">
	</head>
	<body>
	<?php include 'include/header.php';?>
		
		<?php
if (logged_in_username() == "admin") {
    include 'include/nav.php';
    navbar('settings');
} else {
    $username = logged_in_username();
    include "include/user_nav.php";
}
?>
		<?php if ((logged_in_username() == 'admin')) {
    ?>
		<div class="container">
         <form class="form-horizontal" action="adminpassword.php" method="post">
				<?php if (!empty($message)) {echo "<p class=\"message\">" . $message . "</p>";}?>
				<fieldset>
					<legend>Change Your Password</legend>
					<div class="control-group">
						<label class="control-label">Old Password:</label>
						<div class="controls">
							<input type="password" placeholder="Your Old Password" name="old_password" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">New Password:</label>
						<div class="controls">
							<input type="password" placeholder="Your New Password" name="new_password" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Retype New Password:</label>
						<div class="controls">
							<input type="password" placeholder="Retype The Above Password" name="re_new_password" required/>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button class="btn btn-primary" type="submit" name="submit" value="Change Password">Change Password</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</body>
</html>

<?php
//Close connection
    if (isset($connection)) {
        mysqli_close($connection);
    }
    ?>
<?php }?>