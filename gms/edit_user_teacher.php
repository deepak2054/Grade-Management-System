<?php require_once("session/session.php"); ?>

<?php confirm_usr_login(); ?>

<?php
     	require_once("include/variables.php");
    	require_once("include/connect.php");
?>


<?php
confirm_logged_in();
$usrname=logged_in_username();

?>

<?php
	$val					= 0;
	$errval					= 0;
	$user_status			= 0;
	$user_status_message	="User doesn't exists";
	if (isset($_POST['update']))
	{ // Form has been submitted.

		$message		= "";
		$old_username	= $_POST['old_username'];

		$username		= $_POST['username'];
		$email			= $_POST['email'];
		$firstName		= $_POST['first_name'];
		$middleName		= $_POST['middle_name'];
		$lastName		= $_POST['last_name'];
		$department		= $_POST['department'];
		$designation	= $_POST['designation'];
		if(isset($middleName))
			{
				$full_name=$firstName." ".$middleName. " ".$lastName;
			}
		else{
				$full_name=$firstName." ".$lastName;

			}
		$new_password	= md5($_POST['new_password']);
		$re_new_password1	= md5($_POST['re_new_password']);

		if(($new_password==$re_new_password1) && ($user_status==0)  )
		{
            $SQL="UPDATE  `gms`.`user`  SET username='$username',password='$new_password',email='$email',name='$full_name' WHERE username='{$old_username}'";

           $sql="UPDATE  user_detail SET user_name='$username',access='professor',first_name='$firstName',middle_name='$middleName',last_name='$lastName',email_id='$email',address='user',department='$department',designation='$designation' WHERE user_name like '$old_username'";
             $update1=mysqli_query($connection,$sql) or die(mysqli_error($connection));
    		 $update=mysqli_query($connection,$SQL) or die(mysqli_error($connection));
            if((!$update) && (!$update1))
            {
                die();
                //echo 'couldnt update to database';

            }
            else
            {
				$message = "SUCCESFULLY EDITED";
				$val=1;
				//echo $message;
			}
		}
		elseif($new_password!=$re_new_password1)
		{
			$errval = 1;
			$message = "Passwords donot match";
		}




	}
?>


<?php

 $query=$connection->query("SELECT * FROM user_detail WHERE user_name='{$usrname}'");
 $rows = mysqli_num_rows($query);

 if(!$rows){
 	$user_status=1;
 }
 else{

 		while($result=mysqli_fetch_array($query)){
 			extract($result);
 		}
 	}

  ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GMS: EDIT USER</title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		<style type="text/css">
			.form-horizontal{
				position: relative;
				left: 20%;
				width: 450px;
				border: 1px rgb(200, 200, 200) solid;
				border-radius: 3%/10px;
				padding: 10px;
				background-color: white;
				box-shadow: 10px 10px 20px 0px gray;
			}
			body {
				background-color: lightgray;
			}
		</style>
	</head>
	<body>
	<?php include('include/header.php'); ?>

		<?php

				include('include/user_nav.php');
				navbar('settings');

		?>

			<div class="row-fluid">
		<div class="span3" id="sidebar">

		</div>
		<div class="span3">
		 <form class="form-horizontal" action="edit_user.php" method="post">
                        <!--
						<input type='text' name="password">
						<input type='password' name="repassword">
						<input type='submit' name="submit" value='Sign up'> -->
							<?php if($val==1){echo '<span class="alert-success">'.$message.'</span>';} ?>
							<?php if($errval==1){echo '<span class =" alert-danger">'.$message.'</span>'.'<br>';} ?>
							<?php if($user_status==1 && !(isset($_POST['update']))){echo '<span class="alert-danger">'.$user_status_message.'</span>';} ?>
							<legend>EDIT user  <?php echo '<span class="alert-success		">'.$usrname.'</span>'; ?> </legend>
							<!--<?php echo '<span class =" alert-danger">'.'This page is underconstruction'.'</span>'.'<br>'; ?>-->


						<div class="control-group">
								<label class="control-label">Old Username:<span style="color:red;">*</span></label>
								<div class="controls">
									<input type="text" placeholder="Username" name="old_username" id="username"  value="<?php if($user_status==0){echo $user_name; } ?>" readonly/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">Username:<span style="color:red;">*</span></label>
								<div class="controls">
									<input type="text" placeholder="Username" name="username" id="username"  value="<?php if($user_status==0){echo $user_name; } ?>"  autofocus 	required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Email:<span style="color:red;">*</span></label>
								<div class="controls">
									<input type="email" placeholder="Email address" name="email" id="email"  value="<?php if($user_status==0){echo $email_id; } ?>" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">First Name:<span style="color:red;">*</span></label>
								<div class="controls">
									<input type="text" placeholder="First Name..." name="first_name" id="username"  value="<?php if($user_status==0){echo $first_name; } ?>" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"> Middle Name:</label>
								<div class="controls">
									<input type="text" placeholder="Middle Name..." name="middle_name" id="username" value="<?php if($user_status==0){echo $middle_name; } ?>" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"> Last Name:<span style="color:red;">*</span></label>
								<div class="controls">
										<input type="text" placeholder="Last name..." name="last_name" id="username"  value="<?php if($user_status==0){ echo $last_name; } ?>" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"> Department:<span style="color:red;">*</span></label>
								<div class="controls">
										<input type="text" placeholder="Department..." name="department" id="username"  value="DoCSE" readonly="" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"> Designation:<span style="color:red;">*</span></label>
								<div class="controls">
									<input type="text" placeholder="Designation..." name="designation" id="username"  value="<?php if($user_status==0){ echo $designation;} ?>" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">New Password:<span style="color:red;">*</span></label>
								<div class="controls">
									<input type="password" placeholder="New Password...." name="new_password" id="repassword" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Confirm New Password:<span style="color:red;">*</span></label>
								<div class="controls">
									<input type="password" placeholder="Retype new Password" name="re_new_password" id="repassword" required/>
								</div>
								</div>
							<div class="control-group">
								<div class="controls">
									<input class="btn btn-primary" type="submit" name="update"  value="UPDATE" />
								</div>
							</div>

			</form>
		</div>
		</div>



	</body>
</html>


<?php
    //Close connection
	if(isset($connection))
	{
		mysqli_close($connection);
	}

	include('include/footer.php');
?>