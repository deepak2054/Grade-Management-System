<?php

	require('session/session.php');
	confirm_logged_in();
?>


<?php ob_start(); ?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Management System</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-dropdown.css">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<script type="text/javascript" src="add_student.js"></script>
		<script type="text/javascript">
			function confrm()
			{
				var con=confirm("Do you really want to add this student?");
				return con;
			}
		</script>
		<style type="text/css">
			#sidebar {
				border-right: 3px solid rgb(238,238,238);
				height: 250px;
			}
			.hero-unit
			{
				margin-bottom:0;
			}
		</style>
	</head>

	<body>
	<?php include('include/header.php'); ?>
		<?php include("include/connect.php"); ?>
		<?php
			if (logged_in_username() == "admin") {
				include('include/nav.php');
				navbar('student');
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
								  <li class="nav-header">Student</li>
								  <li><a href="show_student.php">view students</a></li>
								  <li><a href="add_student.php">Add student</a></li>
								  <li><a href="edit_student.php">Edit/Delete Student</a></li>
								</ul>
							  </div><!--/.well -->
							</div><!--/span-->
						  </div>
				 	</div>
		</div>


		<div class="span9"> <!--Main content-->
		<?php if(isset($_POST['submit']))
				{
						//now add student
						$reg_no_first = $_POST['reg_no_first'];
						$reg_no_second = $_POST['reg_no_second'];
						$reg_no = $reg_no_first.'-'. $reg_no_second;
						$email= $_POST['email'];
						$first_name = $_POST['first_name'];
						$middle_name = $_POST['middle_name'];
						$last_name = $_POST['last_name'];
						if(!empty($middle_name)){
						$full_name = $first_name.' '.$middle_name.' '.$last_name;}
						else{
							$full_name = $first_name.' '.$last_name;
						}
						$nationality = $_POST['nationality'];
						$dob = $_POST['dob'];
						$doe = $_POST['doe'];
						$batch = $_POST['batch'];
						$permanent_address = $_POST['permanent_address'];
						$temporary_address = $_POST['temporary_address'];
						$cell_no = $_POST['cell_no'];
						$landline = $_POST['landline'];
						$password = md5($reg_no);
						$reg_check=mysqli_query($connection,"SELECT reg_no FROM student WHERE '{$reg_no}'=reg_no");
						$check=mysqli_fetch_assoc($reg_check);
						if(!empty($check))
							{

								die('Registration number already exists in records');
							}
						$query = "INSERT INTO student (reg_no,email_address,first_name, middle_name, last_name,full_name,nationality, dob, doe, batch, permanent_address, temporary_address, cell_no, landline,password) VALUES ('$reg_no','$email','$first_name','$middle_name','$last_name','$full_name','$nationality','$dob','$doe','$batch','$permanent_address','$temporary_address','$cell_no','$landline','$password')";
						/*$query1="INSERT INTO user_detail(user_name,first_name,middle_name,last_name,email_id,address,department,designation) VALUES('$reg_no','$first_name','$middle_name','$last_name','$email','$permanent_address','Computer Engineering','student')";
						$res=$connection->query($query1);*/
						$res1=$connection->query($query);
						if((!$res1)){
							die(mysqli_error($connection));
						}
						else{
							echo "The student has been added to the database succesfully.";
						}
				}
				else
				{
		?>
					<h2>Add Student Form</h2>
					<form class="form-horizontal" method="POST" action="add_student.php" onsubmit="return process()">

					<fieldset>
					<!--Registration number-->
					  <div class="control-group">
						<label class="control-label" for="reg_no">Registration Number<i style="color:red;">*</i></label>
						<div class="controls">
						  <input type="text" class="input-small" id="reg_no_first" name="reg_no_first" required> -
						  <input type="text" id="reg_no_second" class="input-mini" name="reg_no_second" required>
						</div>
					  </div>

					  <!--email address-->
						  <div class="control-group">
						<label class="control-label" for="first_name">Email<i style="color:red;">*</i></label>
						<div class="controls">
						  <input type="email" class="input-xlarge" id="email" name="email" required>
						</div>
					  </div>

					  <!--First Name-->
						  <div class="control-group">
						<label class="control-label" for="first_name">First Name<i style="color:red;">*</i></label>
						<div class="controls">
						  <input type="text" class="input-xlarge" id="first_name" name="first_name" required>
						</div>
					  </div>

					  <!--Middle Name-->
						  <div class="control-group">
						<label class="control-label" for="middle_name">Middle Name</label>
						<div class="controls">
						  <input type="text" class="input-xlarge" id="middle_name" name="middle_name">
						</div>
					  </div>


					  <!----Last name-->
						  <div class="control-group">
						<label class="control-label" for="last_name">Last Name<i style="color:red;">*</i></label>
						<div class="controls">
						  <input type="text" class="input-xlarge" id="last_name" name="last_name" required>
						</div>
					  </div>


					  <!--Nationality-->
								 <div class="control-group">
						<label class="control-label" for="select01">Nationality<i style="color:red;">*</i></label>
						<div class="controls">
						  <input type="text" name="nationality" id="" required>
						</div>
					  </div>


					  <!--Date of birth-->
							   <div class="control-group">
						<label class="control-label" for="select01">Date of Birth:<i style="color:red;">*</i> </label>
						<div class="controls">
						<input type="date" name="dob" id="date" placeholder="yyyy/mm/dd" required>
						</div>
					  </div>


					  <!--Date of enroll-->
							   <div class="control-group">
						<label class="control-label" for="select01">Date of Enroll:<i style="color:red;">*</i> </label>
						<div class="controls">
							<input type="date" name="doe" placeholder="yyyy/mm/dd" required>
						</div>
					  </div>


					  <!--Batch-->
					  <div class="control-group">
						<label class="control-label" for="last_name">Batch :<i style="color:red;">*</i> </label>
						<div class="controls">
						  <input type="number" class="input-xlarge" id="batch" name="batch"   required>
						</div>
					  </div>


					  <!--Permanent address-->
							  <div class="control-group">
						<label class="control-label" for="last_name">Permanent address<i style="color:red;">*</i></label>
						<div class="controls">
						  <input type="text" class="input-xlarge" id="permanent_address" name="permanent_address" required>
						</div>
					  </div>


						  <!--Temporary address-->
							  <div class="control-group">
						<label class="control-label" for="last_name">Temporary address</label>
						<div class="controls">
						  <input type="text" class="input-xlarge" id="temporary_address" name="temporary_address" required>
						</div>
					  </div>

						  <!--Cell. no.-->
							  <div class="control-group">
						<label class="control-label" for="last_name">Mobile No.<i style="color:red;">*</i> </label>
						<div class="controls">
						  <input type="text" class="input-xlarge" placeholder="Exactly 10 digits" id="cell_no" name="cell_no" required>
						</div>
					  </div>

						  <!--Landline Number-->
							  <div class="control-group">
						<label class="control-label" for="last_name">Landline Number</label>
						<div class="controls">
						  <input type="text" class="input-xlarge" id="landline" name="landline" >
						</div>
					  </div>



					  <!--form actions-->
					  <div class="form-actions" id="form_action">
						<button type="submit" class="btn btn-primary" name="submit">Add Student !!!</button>
					  </div>

					</fieldset>
				  </form>

				  	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get" accept-charset="utf-8">
				  		<img src="images/def_img.png" alt="Default Image">

				  		<input id="file_browse" type="file" name="file_photo">
				  		<label id="file_browse_label" for="file_browse">Choose A File</label>
				  		<input type="submit" name="submitphoto" value="Upload">
					</form>
				<?php } ?>
		</div>
			</div>
		</div><!--end of row-->
	</body>
</html>
<?php ob_end_flush(); }	 ?>
