<link rel="stylesheet" type="text/css" href="css/nav.css">
<?php
	ini_set("display_errors","on");
	function navbar($active="")
	{
		$usrname = logged_in_username();
		?>

		<div id="wrapper">
		<nav>
			<ul>
				

				<li >
					<a href="class1.php?action=view" class=" <?php if($active=="semester"){echo 'active';} ?> ">Semester</a>
					<div>
						<ul>
							<li><a href="class1.php?action=add">Create Class</a></li>
							<li><a href="edit_class.php">Withdraw Courses</a></li>
							<li><a href="class1.php?action=enroll">Enroll Students</a></li>
						</ul>
					</div>
				</li>

				<li>
					<a href="course.php?action=view" class=" <?php if($active=="course"){echo 'active';} ?> ">Course</a>
					<div>
						<ul>
							<li><a href="course.php?action=add">Add Course</a></li>
							<li><a href="course.php?action=edit_course">Edit Course</a></li>
							<li><a href="course.php?action=assign_instructor">Change/Assign Instructor</a></li>
							<li><a href="course.php?action=delete_course">Delete Courses</a></li>
						</ul>
					</div>
				</li>

				<li>
					<a href="show_student.php" class=" <?php if($active=="student"){echo 'active';} ?> ">Student</a>

					<div>
						<ul>
							<li><a href="show_student.php">View Students</a></li>
							<li><a href="add_student.php">Add Student</a></li>
							<li><a href="edit_student.php">Edit Student</a></li>
						</ul>
					</div>
				</li>

				<li>
					<a href="teacher.php?action=view_teacher" class=" <?php if($active=="teacher"){echo 'active';} ?> " >Teacher</a>
					<div>
						<ul>
							<li><a href="teacher.php?action=add">Add Teacher</a></li>
							<li><a href="teacher.php?action=edit">Edit Teacher</a></li>
							<li><a href="teacher.php?action=delete">Delete Teacher Details</a></li>
						</ul>
					</div>
				</li>

				<li>
					<a href="report.php?action=view_individual"  class=" <?php if($active=="report"){echo 'active';} ?> ">Reports</a>
					<div>
						<ul>
							<li><a href="report.php?action=view_classwise">View Classwise Reports</a></li>
							<li><a href="report.php?action=view_subjectwise">View Sujectwise Reports</a></li>
							<li><a href="report.php?action=view_individual">View Individual Reports</a></li>
						</ul>
					</div>
				</li>

				<li>
					<a href="grade.php" class=" <?php if($active=="grade"){echo 'active';} ?> ">Grade</a>
				</li>

				<li>
					<a href="search.php" class=" <?php if($active=="search"){echo 'active';} ?> ">Search</a>
				</li>

				<li>
					<a href="javascript: void(0)" class=" <?php if($active=="settings"){echo 'active';} ?> ">Setting</a>
					<div>
						<ul>
							<li><a href="adminpassword.php">Change password </a></li>
							<li><a href="change_personal.php">Change Personal Information</a></li>
						</ul>
					</div>
				</li>

				<li>
					<a href="list_user.php" class=" <?php if($active=="user"){echo 'active';} ?> ">Users</a>
					<div>
						<ul>
							<li><a href="list_user.php">Show User</a></li>
							<li><a href="new_user.php">Add User</a></li>
							<li><a href="del_user.php">Delete User</a></li>
						</ul>
					</div>
				</li>

				<li>
					<a href="about.php"   class=" <?php if($active=="about"){echo 'active';} ?> ">About</a>
				</li>

				<li style="float:right;">
					<a href="index.php?action=logout" >Logout</a>
				</li>
				<li style="float:right;">
					<p class="navbar-text" style="float:right;">Logged in as <?php echo $usrname; ?></p>
				</li>
				<div style="clear:both;"  ></div>
			</ul>
		</nav>



	</div>

	<?php
	}
?>
