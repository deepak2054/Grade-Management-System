<?php require_once ("session/session.php");?>
<?php include("include/connect.php");?>
<?php confirm_logged_in(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GMS: Admin</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-dropdown.css">
		<script type="text/javascript" src="include/validate.js"></script>
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
			<?php
			if (logged_in_username() == "admin") {
				include('include/nav.php');
				include('include/header.php');
				navbar('teacher');
			}
			else
			{
				$username = logged_in_username();
				include("include/user_nav.php");
				navbar('report');
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
							  <li class="nav-header">Courses</li>
							  <li><a href="teacher.php?action=add">Add Teacher</a></li>
							  <li><a href="teacher.php?action=edit">Edit Teacher Detail</a></li>
							  <li><a href="teacher.php?action=delete">Remove Teacher Detail</a></li>
							</ul>
						  </div><!--/.well -->
						</div><!--/span-->
					  </div>
				</div>
			</div>

				<div class="span9">
					<?php
						if(isset($_GET['action']))
						{
							$act=$_GET['action'];
							if($act=='add')
							{
								//Add Course Content
							?>
							<div class='well container-fluid span7'	>

								<form class="form-signin" action="teacher.php" method="post"  name="add" onsubmit="return validate_email()">
									<h2 class="form-signin-heading">Add Teacher</h2>

									<input type="text" class="input-block-level" placeholder="Email" name="email">
									<input type="text" class="input-block-level" placeholder="First Name" name="first_name" required>
									<input type="text" class="input-block-level" placeholder="Last Name" name="last_name" required>
									<input type="text" class="input-block-level" placeholder="Department" name="department" required>
									<input type="text" class="input-block-level" placeholder="Designation" name="designation" required>

									</br>
									<button class="btn btn-large btn-primary" name="add" type="submit">Add</button>
								</form>
							</div>


							<?php
							}


							else if($act=='view_teacher')
							{
								?>
								<h1>Teacher</h1>
								<p>The teacehers associated with this department are as follows:</p>
								<?php
								include ('include/lister_teacher_view.php');
							}
							else if($act=='edit')
							{
							?>
								<h1>Edit teacher details</h1>
								</br><p>Please select the teachers whose detail is to be changed from the drop down below: </br></br></br></p>
							<?php
								if(isset($_POST['update']))
								{
									$first_name = $_POST['first_name'];
									$last_name = $_POST['last_name'];
									$department = $_POST['department'];
									$designation = $_POST['designation'];
									$email_id = $_POST['email'];
									//now add to database
									$query = mysqli_query($connection,"UPDATE teacher_detail SET first_name='$first_name',last_name='$last_name', department='$department', designation='$designation' WHERE email_id='$email_id'") or die(mysqli_error($connection));
									if($query)
									{
										echo "Update Succcessfull !!!!";
									}

								}

								if(isset($_POST['change']))
								{
									$t_email=$_POST['teacher_email'];
									$query=mysqli_query($connection,"SELECT * FROM teacher_detail WHERE email_id='".$t_email."'");
									$rows = mysqli_num_rows($query);
									if(!$rows)
									{
										echo "Teacher Not Found";
									}
									else
									{
										while($result=mysqli_fetch_array($query))
										{
											extract($result);
											//now display the information from the db
											?>
											<form action="teacher.php?action=edit" method="POST" onsubmit="return confrm()">
												First name : <input type="text" name="first_name" id="first_name" value="<?php echo $first_name?>" ></br>
												Last name : <input type="text" name="last_name" id="last_name" value="<?php echo $last_name?>" ></br>
												Department : <input type="text" name="department" id="department" value="<?php echo $department?>"></br>
												Designation : <input type="text" name="designation" id="designation" value="<?php echo $designation?>"></br>
												Email : <input type="text" name="email" id="email" value="<?php echo $email_id?>" readonly><br><br>
												<button type="submit" class="btn btn-danger" value="Update Information" name="update">Update Information</button>
											</form>
											<?php
										}
									}
								}
								else
								{
									include('include/edit_teacher_detail.php');
								}
							}
							else if($act=='delete')
							{
							?>
								<h1>Delete Teacher Details</h1>
								<p>Please check the teacher whose details are to be deleted and click on delete button:</p>

								<?php
								include('include/lister_teacher.php');

							}
						}
						else if(isset($_GET['course_action']))
						{
							$course=$_GET['course_action'];
							$sql="SELECT * FROM courses WHERE course_code='$course'";
							$q=mysqli_query($connection,$sql) or die(mysqli_error($connection));
							$data=mysqli_fetch_array($q);
							echo "<h1>".$data['course_name']."</h1>";
							echo "<h2>".$data['course_code']."</h2>";
							echo "<p>".$data['description']."</p>";



						}
						else if(isset($_POST['delete']))
						{
							$q=0;
							if(isset($_POST['set_code']))
							{
								foreach($_POST['set_code'] as $email )
								{

									$sqla="DELETE FROM `gms`.`teacher_detail` WHERE email_id = '$email' ";
									$q=mysqli_query($connection,$sqla) or die(mysqli_error($connection));
								}
							}
							if($q)
							{
								echo "Teachers Detail Deleted SucessFully!!!";
							}
							else
							{
								echo "Error Deleteing Teacher Details!!!";
							}
						}
					?>


				</div>
			</div>


		</div><!--end of row-->
		<?php include('include/footer.php'); ?>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
	</body>
</html>
<?php
	include('include/class.php');
	$teacher=new teacher;
	if(isset($_POST['add']))
	{

		$teacher->email=$_POST['email'];
		$teacher->first_name=$_POST['first_name'];
		$teacher->last_name=$_POST['last_name'];
		$teacher->designation=$_POST['designation'];
		$teacher->department=$_POST['department'];


		$sql="INSERT INTO `gms`.`teacher_detail` (`email_id`,`first_name`,`last_name`,`designation`,`department`) VALUES('$teacher->email','$teacher->first_name','$teacher->last_name','$teacher->designation','$teacher->department')";
		$q=mysqli_query($connection,$sql) or die(mysqli_error($connection));
		if($q==1)
		{
			echo "Teacher added";
		?>

		<div class="alert fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Course Added!</strong> You have sucessfully added the course.
        </div>



		<?php
		}
		else
		{
			echo "Error in adding course";
		}
	}






?>
<?php } ?>