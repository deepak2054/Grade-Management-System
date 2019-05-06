<?php ini_set("display_errors","on"); ?>
<?php require_once("session/session.php"); ?>

<?php confirm_logged_in(); ?>

<?php
     require("include/variables.php");
    include('include/connect.php');

?>

<?php

	$val			= 0;
	$errval			= 0;
	$user_status	=0;
	$user_status_message="Username already exists";
	if (isset($_POST['submit']))
	{ // Form has been submitted.

		$message		= "";
		$username		= $_POST['username'];
		$email			= $_POST['email'];
		$firstName		= $_POST['first_name'];
		$middleName		= $_POST['middle_name'];
		$lastName		= $_POST['last_name'];
		$department		= $_POST['department'];
		$designation	= $_POST['designation'];
		$username_check	=mysqli_query($connection,"SELECT username FROM user WHERE '{$username}'=username");
		$check			=mysqli_fetch_assoc($username_check);
		if(!empty($check))
			{
				$user_status=1;

				}
		if(isset($middleName))
			{
				$full_name=$firstName." ".$middleName. " ".$lastName;
			}
		else{
				$full_name=$firstName." ".$lastName;

			}

		$password	= md5($_POST['password']);
		$password1	= md5($_POST['repassword']);

		if(($password==$password1) && ($user_status==0))
		{
            $SQL="INSERT INTO `gms`.`user` (username,password,email) VALUES('$username','$password','$email')";
            $sql="INSERT INTO user_detail(user_name,access,first_name,middle_name,last_name,email_id,address,department,designation) VALUES('$username','professor','$firstName','$middleName','$lastName','$email','user','$department','$designation')";
            $update1=mysqli_query($connection,$sql) or die(mysqli_error($connection));
            $update=mysqli_query($connection,$SQL) or die(mysqli_error($connection));
            if((!$update)&&(!$update1))
            {
                die();
            }
            else
            {
				$message = "SUCCESFULLY CREATED";
				$val=1;
				//echo $message;
			}
		}
		elseif($password!=$password1)
		{
			$errval = 1;
			$message = "Passwords donot match";
		}




	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GMS: ADD USER</title>
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
			if (logged_in_username() == "admin") {
				include('include/nav.php');
				navbar('user');
			}
			else
			{
				$username = logged_in_username();
				include("include/user_nav.php");
			}
		?>
<?php if((logged_in_username()=='admin')){ ?>
			<div class="row-fluid">
		<div class="span3" id="sidebar">
				<div class="container-fluid">
						  <div class="row-fluid">
							<div class="span14">
							  <div class="well sidebar-nav">
								<ul class="nav nav-list">
								 <li class="nav-header">Edit Users</li>
								 <li><a href="list_user.php">Show User</a></li>
								  <li><a href="new_user.php">Add User</a></li>
								  <li><a href="del_user.php">Delete User</a></li>
								</ul>
							  </div><!--/.well -->
							</div><!--/span-->
						  </div>
					</div>
		</div>
		<div class="span3">
		 <form class="form-horizontal" action="new_user.php" method="post">
                        <!--
						<input type='text' name="password">
						<input type='password' name="repassword">
						<input type='submit' name="submit" value='Sign up'> -->
							<?php if($val==1){echo '<span class="alert-success">'.$message.'</span>';} ?>
							<?php if($errval==1){echo '<span class =" alert-danger">'.$message.'</span>'.'<br>';} ?>
							<?php if($user_status==1){echo '<span class="alert-danger">'.$user_status_message.'</span>';} ?>
							<legend>CREATE A NEW USER</legend>
							<!--<?php echo '<span class =" alert-danger">'.'This page is underconstruction'.'</span>'.'<br>'; ?>-->

							<div class="control-group">
							<i style="color:red;text-align:left;">Donot use Username as admin for security purpose</i>
								<label class="control-label">Username:<i style="color:red;">*</i></label>
								<div class="controls">
									<input type="text" placeholder="Username" name="username" id="username" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Email:<i style="color:red;">*</i></label>
								<div class="controls">
									<input type="email" placeholder="Email address" name="email" id="email" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">First Name:<i style="color:red;">*</i></label>
								<div class="controls">
									<input type="text" placeholder="First Name..." name="first_name" id="username" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"> Middle Name:</label>
								<div class="controls">
									<input type="text" placeholder="Middle Name..." name="middle_name" id="username" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"> Last Name:<i style="color:red;">*</i></label>
								<div class="controls">
									<input type="text" placeholder="Last name..." name="last_name" id="username" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"> Department:<i style="color:red;">*</i></label>
								<div class="controls">
									<input type="text" placeholder="Department..." name="department" id="username" value="DoCSE" readonly="" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"> Designation:<i style="color:red;">*</i></label>
								<div class="controls">
									<input type="text" placeholder="Designation..." name="designation" id="username" required/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">Password:<i style="color:red;">*</i></label>
								<div class="controls">
									<input type="password" placeholder="Password" name="password" id="password" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Confirm Password:<i style="color:red;">*</i></label>
								<div class="controls">
									<input type="password" placeholder="Retype Password" name="repassword" id="repassword" required/>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<input class="btn btn-primary" type="submit" name="submit"  value="SIGNUP" />
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
<?php } ?>