<?php ini_set("display_errors","on"); ?>
<?php require_once("session/session.php"); ?>
<?php
    require("include/variables.php");
    include('include/connect.php');
	include_once("function/functions.php");



	if(!empty($_POST['submit'])){

		$view_report = true;
		$regno = $_POST['regno'];
		$dob = $_POST['dob'];

		if(!empty($regno) AND !empty($dob)){
			$main_data = [];

			$student_sql = "SELECT * FROM student WHERE reg_no = '{$regno}' AND dob = '{$dob}'";
			$student_result = $connection->query($student_sql);
			$student_data =  mysqli_fetch_array($student_result);

			$grade_sql = "SELECT * FROM student_grade WHERE reg_no =  '{$regno}'";
			$grade_result = $connection->query($grade_sql);
			if($student_data['dob']==$dob){
			while( $grade = $grade_result->fetch_assoc() ) {
				$class_id = $grade['class_id'];

				$class_sql = "SELECT * FROM class WHERE class_id = '{$class_id}'";
				$class_result =  $connection->query($class_sql);
				$class_data =  mysqli_fetch_array($class_result);

				$course_name_sql = " SELECT * FROM courses where course_code='{$grade['course_code']}'";
				$course_name_result =  $connection->query($course_name_sql);
				$course_name_data =  mysqli_fetch_array($course_name_result);

				$main_data[$class_data['semester']][] = [
					'batch' => $class_data['batch'] ,
					'course_name'=> $course_name_data['course_name'] ,
					'course_code'=> $course_name_data['course_code'] ,
					'credit'=> $course_name_data['credit'] ,
					'remarks' => $grade['remarks'] ,
					'grade' => $grade['grade']
				];
			}
		}



		} else{
			$message = 'Please Enter Your Registration Number And Date of Birth properly';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>

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
		<title>View Report</title>
	</head>
	<body>
		<?php
			include ('include/header.php');
		?>
		<div id="main_section" class='well container-fluid span8'>
		<form action="index.php" method="post" accept-charset="utf-8">
			<input class="btn-report" type="submit" name="home" value="Home" style="float:left;">
		</form>

		<?php if(!isset($_POST['submit'])):?>
			<form action="view-report.php" method="post">
			<table class="table">
				<caption>Please input your registration number and Date of birth</caption>
				<tr>
					<td>Registration Number: </td>
					<td>
						<input type="text" name="regno" placeholder="Registration number ..."  autofocus="on" value="<?php echo !empty($_POST['regno'])? $_POST['regno'] :''; ?>">
					</td>
				</tr>
				<tr>
					<td >Date of Birth: </td>
					<td>
						<input type="date" name="dob" placeholder="yyyy-mm-dd ..." value="<?php echo !empty($_POST['dob'])? $_POST['dob'] :''; ?>" >
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Submit">
					</td>
				</tr>
			</table>
		</form>
		<?php else: ?>
			<div class='well container-fluid span8'>
				<?php if(!empty($main_data) && count($main_data)>0):?>
					<p class="text-left " >Name :<?php echo " ".ucwords($student_data['full_name']); ?></p>
					<p class="text-left ">Batch :<?php echo " ".$student_data['batch']; ?></p>
					<p class="text-left ">Registration Number :<?php echo " ".$student_data['reg_no']; ?></p>
					<p class="text-left ">Date OF Birth :<?php echo " ".$student_data['dob']; ?></p>


					<?php

						foreach($main_data as $semester_id => $semester):?>
						<table class="table table-bordered" >
							<caption>Semester: <?php echo $semester_id?></caption>
							<tr>
								<th >Course Name</th>
								<th >Course ID</th>
								<th >Credit</th>
								<th >Grade</th>
								<th >Remarks</th>
							</tr>

							<?php if(!empty($semester) &&  count($semester)>0):;foreach($semester as $course): ?>
								<tr>
									<th ><?php echo $course['course_name'] ?></th>
									<th ><?php echo $course['course_code'] ?></th>
									<th ><?php echo $course['credit'] ?></th>
									<th ><?php echo $course['grade'] ?></th>
									<th ><?php echo $course['remarks'] ?></th>
								</tr>
							<?php endforeach;endif;?>
						</table>
					<?php endforeach;else: ?>

					<p>Invalid data supplied</p>
				<?php endif;?>

			<div style='clear:both'></div>
			</div>
			<div style='clear:both'></div>
		<?php	endif ?>
		<div style="background-color:darkred;width:100%;"><?php if (!empty($message)) {echo "<p style=\"color:white;text-align:center;\">&#9888" . $message . "</p>";} ?></div>
		</div>


			<div style='clear:both'></div>
		<?php include('include/footer.php'); ?>

			<div style='clear:both'></div>
	</body>
</html>

<?php
    //Close connection
	if(isset($connection))
	{
		mysqli_close($connection);
	}
?>