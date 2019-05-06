<?php ini_set("display_errors","on"); ?>
<?php

	require('session/session.php');
	confirm_logged_in();
?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GMS: Admin</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-dropdown.css">
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
			include('include/header.php');
			include('include/nav.php');
			include('include/connect.php');
			navbar('report');
		?>

		<div class="row-fluid">

				<div class="span3" id="sidebar">

					<div class="container-fluid">

						<div class="well sidebar-nav">
							<ul class="nav nav-list">
								 <li class="nav-header">Report</li>
								<li><a href="report.php?action=view_individual">Individual Report</a></li>
								<li><a href="report.php?action=view_subjectwise">Subjectwise Report</a></li>
								<li><a href="report.php?action=view_classwise">Classwise Report</a></li>
							</ul>
						</div>

					</div>

				</div>

				<div class='well container-fluid span8'	>

				<?php
					$choice = $_POST['type'];
					$error="";
					//echo $choice;
					$Registration_number=$_POST["inputRegistration_number"];
					if($choice=='regNo' && preg_match('/\s/',$Registration_number))
					{
						$error= 'Invalid registration number';
					}
					if($choice=='fullName' && !(preg_match('/\s/',$Registration_number)))
					{
						$error='Invalid Name';
					}

					 if(strlen($error)==12)
						 {

						 	header("location:report.php?action=view_selection_error");

						 }
						  elseif(strlen($error)>12)
						 {

						 	header("location:report.php?action=view_selection_errors");

						 }
					else
					{
							if(preg_match('/\s/',$Registration_number)){

									$name=$Registration_number;
								$query = "SELECT reg_no FROM student WHERE full_name='{$name}'";
								$Res = mysqli_query($connection,$query);
									while($row=mysqli_fetch_assoc($Res))
										{
											$Registration_number=$row['reg_no'];

										}


							}


							$query = "SELECT * FROM student_grade WHERE reg_no='{$Registration_number}'  ORDER BY course_code";

							$result_set = mysqli_query($connection,$query);
							$number_of_rows=mysqli_num_rows($result_set);

							if($number_of_rows==0)
							{
								header("location: report.php?action=view_individual_error");
								exit;
								//die ("error");
							}
							else
							{
								$Grade=array();
								while($row=mysqli_fetch_assoc($result_set))
								{
									extract($row);
									{
										$Grade[]=array(
														"class_id"=>$class_id,
														"course_code"=>$course_code,
														"grade"=>$grade,
														"remarks"=>$remarks,
														);
									}
								}
							}

				?>

				<?php
						$query = "SELECT * FROM student WHERE  reg_no='{$Registration_number}'";
						$result_set = mysqli_query($connection,$query);
						$row=mysqli_fetch_assoc($result_set);
						extract($row);
						{
							$Student_name=$first_name." ".$middle_name." ".$last_name;
							$Date_of_birth=$dob;
							$Batch=$batch;
						}
				?>

					<p class="text-left " >Name :<?php echo " ".ucwords($Student_name); ?></p>
					<p class="text-left ">Batch :<?php echo " ".$Batch; ?></p>
					<p class="text-left ">Registration Number :<?php echo " ".$Registration_number; ?></p>
					<p class="text-left ">Date OF Birth :<?php echo " ".$Date_of_birth; ?></p>


				<?php

					$Class_id_notunique=array();
					foreach ($Grade as $Single)
					{
						$Class_id_notunique[]=$Single["class_id"];
					}

					$Class_id=array_unique(	$Class_id_notunique);

					$Semester=array();
					foreach($Class_id as $single)
					{
						$Semester[]=substr($single,0,1);
					}

					foreach ($Semester as $Single)
						{
							?>
								<div >
									<table class="table table-bordered" >
										<caption>Semester:<?php echo $Single; ?></caption>
											<tr>
												<th >Course Code</th>
												<th >Course Name</th>
												<th >Grade</th>
												<th >Remarks</th>
											</tr>
											<?php
												foreach ($Grade as $single)
													{
														if(substr($single["class_id"],0,1)==$Single)
														{
															?>
																<tr>
																	<td><?php echo $single["course_code"]; ?></td>
																	<?php
																		$query = "SELECT course_name FROM courses WHERE  course_code='{$single["course_code"]}'";
																		$result_set = mysqli_query($connection,$query);
																		$row=mysqli_fetch_assoc($result_set);
																		extract($row);
																		$Course_name=$course_name;
																	?>
																	<td><?php echo $Course_name; ?></td>
																	<td><?php echo $single["grade"]; ?></td>
																	<td><?php echo $single["remarks"]; ?></td>
																</tr>
															<?php
														}
													}
											?>
			    					</table>
								</div>
							<?php
						}
					}
				?>

				</div>
		</div>
		<?php include('include/footer.php'); ?>
	</body>

</html>

<?php ob_end_flush(); ?>



