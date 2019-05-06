<?php

	require('session/session.php');
	confirm_logged_in();
?>

<?php ini_set("display_errors","on"); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Management System</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-dropdown.css">
		<script type="text/javascript" src="search_student.js"></script>
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
		<script type="text/javascript">
			function confrm()
			{
				var con=confirm("Do you really want to edit/delete this student?");
				return con;
			}
		</script>
	</head>

	<body>
		<?php include("include/connect.php"); ?>
		<?php
		if(isset($_GET['regno'])){
			if (logged_in_username() == "admin") {
				include('include/nav.php');
				include('include/header.php');
				navbar('report');
			}
			else
			{
				$username = logged_in_username();
				include("include/user_nav.php");
			}
		}
		?>
<?php
	include 'include/connect.php';
	if(isset($_GET['regno']))
	{
	$student = $_GET['regno'];
	}
	else
	{
	$student = $_GET['student'];
	}

	/*$fname = $lname = "";

	if($student) {
		if(preg_match("/^[ ]$/",$student)) {
			$fname = explode(" ",$student)[0];
			$lname = explode(" ",$student)[1];
		} else {
			$fname = $student;
			$lname = "";
		}
	}

	$firstname = $fname;
	$lastname = $lname;

	echo $firstname . " "  . $lastname;

	$sql = "SELECT * FROM student WHERE first_name = '$firstname';";
	$sql .= "SELECT * FROM student WHERE last_name = '$lastname';";

	$result = mysqli_multi_query($connection, $sql);
	if($result) {
		while($row = mysqli_fetch_assoc($result)) {
			$regNo = $row['reg_no'];
			echo $regNo . '<br>';
		}
	}
*/


	if(!$student)
	{
		echo "Please enter a search query ";
	}
	else
	{
		$query=$connection->query("SELECT * FROM student WHERE (reg_no='{$student}')|(full_name like '{$student}')");
		$rows = mysqli_num_rows($query);
		if(!$rows)
		{
			echo "Student not found";
		}
		else
		{
				while($result=mysqli_fetch_array($query))
				{
					extract($result);
?>
				<div class="<?php if(isset($_GET['regno'])){ echo 'row-fluid';} ?>">
				 <div class="<?php if(isset($_GET['regno'])){ echo 'span3';} ?>" id="">
				<div class="<?php if(isset($_GET['regno'])){ echo 'container-fluid';} ?>">
						  <div class="<?php if(isset($_GET['regno'])){ echo 'row-fluid';}else echo ''; ?>">
							<div class="<?php if(isset($_GET['regno'])){ echo 'span14';} else echo ''; ?>">
							  <div class="<?php if(isset($_GET['regno'])){ echo 'well sidebar-nav';} else echo ''; ?>">
								<ul class="<?php if(isset($_GET['regno'])){ echo 'nav nav-list';}else echo ''; ?> ">

								 <li class="nav-header"> <?php if(isset($_GET['regno'])){ echo 'Go  to Student List';} else echo ' ';?></li>
								  <a href="show_student.php"><?php if(isset($_GET['regno'])){ echo 'Student List';} else echo ' ';?></a>

								</ul>
							  </div><!--/.well -->
							</div><!--/span-->
						  </div>
					</div>
		</div>
				<div class="span9">
				<form class="form-horizontal" onsubmit='return confrm()' method="POST" action="edit_student.php">
					<fieldset>
					<!--Registration number-->
					  <div class="control-group">
						<label class="control-label" for="reg_no">Registration Number<i style="color:red;">*</i></label>
						<div class="controls">
						  <input type="text" class="input-xlarge" id="reg_no" name="reg_no" value="<?php echo $reg_no ?>" readonly>
						</div>
					  </div>

					  <div id="dynamic"></div>
					  <!--First Name-->
						  <div class="control-group">
						<label class="control-label" for="first_name">First Name<i style="color:red;">*</i></label>
						<div class="controls">
						  <input type="text" value="<?php echo $first_name; ?>"class="input-xlarge" id="first_name" name="first_name" required>
						</div>
					  </div>

					  <!--Middle Name-->
						  <div class="control-group">
						<label class="control-label" for="middle_name">Middle Name</label>
						<div class="controls">
						  <input type="text" value="<?php echo $middle_name; ?>" class="input-xlarge" id="middle_name" name="middle_name" >
						</div>
					  </div>


					  <!--Last name-->
						  <div class="control-group">
						<label class="control-label" for="last_name">Last Name<i style="color:red;">*</i></label>
						<div class="controls">
						  <input type="text" value="<?php echo $last_name; ?>"class="input-xlarge" id="last_name" name="last_name"  required>
						</div>
					  </div>


					  <!--Nationality-->
								 <div class="control-group">
						<label class="control-label" for="select01">Nationality<i style="color:red;">*</i></label>
						<div class="controls">
						  <select id="select01" name="nationality">
							<option value="Nepali">Nepali</option>
							<option value="India">India</option>
							<option value="Others">Others</option>
						  </select>
						</div>
					  </div>


					  <!--Date of birth-->
							   <div class="control-group">
						<label class="control-label" for="select01">Date of Birth :<i style="color:red;">*</i> </label>
						<div class="controls">
					<input type="date" value="<?php echo $dob; ?>" name="dob" required>
						</div>
					  </div>


					  <!--Date of enroll-->
							   <div class="control-group">
						<label class="control-label" for="select01">Date of Enroll:<i style="color:red;">*</i> </label>
						<div class="controls">
					<input type="date" value="<?php echo $doe; ?>"name="doe" required>
						</div>
					  </div>


					  <!--Batch-->
					  <div class="control-group">
						<label class="control-label" for="last_name">Batch:<i style="color:red;">*</i> </label>
						<div class="controls">
						  <input type="text" value="<?php echo $batch; ?>" class="input-xlarge" id="batch" name="batch" required>
						</div>
					  </div>


					  <!--Permanent address-->
							  <div class="control-group">
						<label class="control-label" for="last_name">Permnanent address<i style="color:red;">*</i></label>
						<div class="controls">
						  <input type="text" value="<?php echo $permanent_address; ?>" class="input-xlarge" id="permanent_address" name="permanent_address" required>
						</div>
					  </div>


						  <!--Temporary address-->
							  <div class="control-group">
						<label class="control-label" for="last_name">Temporary address</label>
						<div class="controls">
						  <input type="text" value="<?php echo $temporary_address; ?>" class="input-xlarge" id="temporary_address" name="temporary_address">
						</div>
					  </div>

						  <!--Cell. no.-->
							  <div class="control-group">
						<label class="control-label" for="last_name">Mobile No:<i style="color:red;">*</i></label>
						<div class="controls">
						  <input type="text" value="<?php echo $cell_no; ?>" class="input-xlarge" placeholder="Exactly 10 digits" id="cell_no" name="cell_no" required>
						</div>
					  </div>

						  <!--Landline Number-->
							  <div class="control-group">
						<label class="control-label" for="last_name">Landline Number</label>
						<div class="controls">
						  <input type="text" value="<?php echo $landline; ?>" class="input-xlarge" id="landline" name="landline">
						</div>
					  </div>

					  <!--form actions-->
					  <div class="form-actions">
						<button type="submit" class="btn btn-primary" name="update">Update Information !!!</button>
						<button type="submit" class="btn btn-danger" name="delete">Delete Student !!!</button>
					  </div>
					</fieldset>
				  </form>
				  </div>
				  </div>
				  </body>
				  </html>

	<?php

				}
		}
	}


?>

<?php
if(isset($_GET['regno']))
	{include("include/footer.php");} ?>
