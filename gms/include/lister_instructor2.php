<?php
		ini_set("display_errors","on");
		include ('connect.php');
		$class_id=$_GET['class_id'];

		//$query=mysqli_query("SELECT * FROM student_grade WHERE student ='$class_id'") or die(mysqli_error());
		$query=mysqli_query($connection,"SELECT * FROM class WHERE class_id='$class_id'") or die(mysqli_error($connection));


		?>
	<form action='course.php?action=assign_instructor' method='POST'>
		<?php
			echo "<input type='hidden' value='".$class_id."' name='class_id'></input>";
		?>
		<select name='course_code' id='class_id'>

		<?php
		while($result=mysqli_fetch_array($query))
		{
				extract($result);

						echo "<option value='".$course_code."'.> ".$course_code." </option>";

		}



?>
		</select>
<?php

		$a=mysqli_query($connection,"SELECT * FROM teacher_detail ORDER BY first_name ASC") or die(mysqli_error($connection));
		$counter=mysqli_num_rows($a);

		echo "<select name='teacher'>";

		while($counter!=0)
		{
			$tada=mysqli_fetch_array($a);

			echo"<OPTION value=".$tada['email_id'].">".$tada['first_name']."</OPTION>";

			$counter=$counter-1;
		}


		echo "</select>";

	?>



	<button class="btn btn-large btn-primary" name="change" type="Submit">Change</button>
	<?php


	?>
					<h1><?php echo $class_id ?></h1>
					<p>The teachers and the courses assigned to this class is as follows: </p>

<table class="table table-hover">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Course Name</th>
                  <th>Instructor</th>
                </tr>
              </thead>
              <tbody>

                <?php
					$c=1;
					$a=mysqli_query($connection,"SELECT * FROM class WHERE class_id='$class_id' ORDER BY course_code ASC") or die(mysqli_error($connection));
					while($result1=mysqli_fetch_array($a))
					{
						extract($result1);
							echo"<tr>
								<td>".$c."</td>
								<td><a href='course.php?course_action=".$course_code."'>".$course_code."</a></td>

								<td>".$instructor."</td>
								</tr>";
						$c++;
					}

				?>

              </tbody>
</table>
<?php




		?>
</form>


