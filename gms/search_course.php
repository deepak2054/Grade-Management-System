<?php
	include 'include/connect.php';
	$course = $_GET['course'];

	if(!$course)
	{
		echo "Please enter a search query for course code.";
	}
	else
	{
		//now search that course in database
		$query=mysqli_query($connection,"SELECT * FROM courses WHERE course_code='$course'");
		$rows = mysqli_num_rows($query);
		if(!$rows)
		{
			echo "Course not found";
		}
		else
		{
				while($result=mysqli_fetch_array($query))
				{
					extract($result);
					//now display the information from the db
	?>
				<form action="edit_course.php" method="POST">
					Course Code : <input type="text" name="course_code" id="course_code" value="<?php echo $course_code ?>" readonly>
					Course Name : <input type="text" name="course_name" id="course_name" value="<?php echo $course_name ?>">
					Credit : <input type="text" name="credit" id="credit" value="<?php echo $credit ?>">
					Description : <input type="text" name="description" id="description"value="<?php echo $description ?>">
					<input type="submit" value="Update Information" name="update"/>
				</form>

	<?php

				}
		}
	}

?>





