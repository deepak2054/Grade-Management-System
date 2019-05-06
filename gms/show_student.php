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
		<script type="text/javascript" src="add_student.js"></script>
		<script type="text/javascript">


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
								 <li class="nav-header">Show students</li>
								  <li><a href="show_student.php">View students</a></li>
								  <li><a href="add_student.php">Add student</a></li>
								  <li><a href="edit_student.php">Edit/Delete Student</a></li>
								</ul>
							  </div><!--/.well -->
							</div><!--/span-->
						  </div>
					</div>
		</div>
		<div class="span9">

		<form action="" method=''>

		<?php
			$array_batch=array();
			$sql1="SELECT batch FROM `student` ORDER BY batch ASC";
			$query1=$connection->query($sql1) or die(mysqli_error($connection));
			while($row=mysqli_fetch_assoc($query1)):

				//$query1=mysqli_fetch_assoc($query1);
				$query2= implode($row, ',');


				//var_dump($array_batch);

         if(!(in_array($query2,$array_batch)))
					{


		?>
		<form action="" method="">
			<table class="table table-hover">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Registration Number</th>
                  <th>Name</th>
                  <th>Phone number</th>
                </tr>
              </thead>
              <tbody>

                <?php
                	ini_set("display_errors","on");
					$sql="SELECT reg_no,full_name,cell_no FROM `student` WHERE batch='$query2'  ORDER BY reg_no ASC ";
					$q=mysqli_query($connection,$sql) or die(mysqli_error($connection));
					$loop=mysqli_num_rows($q);
					$c=1;
					echo '<h2 class="text-info">'.'Batch '.$query2.'</h2>';

							while($loop!=0)
							{
								$data=mysqli_fetch_array($q);

								echo"<tr>
										<td>".$c."</td>
										<td><a href='search_student.php?regno=".$data['reg_no']."'>".$data['reg_no']."</a></td>

										<td>".$data['full_name']."</td>
										<td>".$data['cell_no']."</td>

									</tr>";
								$loop=$loop-1;
								$c++;
							}
				    }
					array_push($array_batch, $query2);

				?>
			<?php endwhile; ?>


              </tbody>
</table>
</form>


		</div>
		</div>

	</body>
</html>
<?php include('include/footer.php'); ?>
<?php ob_end_flush(); }?>
