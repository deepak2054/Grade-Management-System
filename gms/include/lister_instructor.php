
<h1>Assign Instructor</h1>


<form type='submit' method='POST' action='include/enroll_course_class.php'>
<?php
	ini_set("display_errors","on");
	echo "<select name='category' id='class_id' onchange='process1();'>";

	$b=mysqli_query($connection,"SELECT * FROM class ORDER BY class_id ASC") or die(mysqli_error($connection));
	$counter=mysqli_num_rows($b);
	$bb=0;
	while($counter!=0)
	{
		$tadaa=mysqli_fetch_array($b);
		$aa=$tadaa['class_id'];
		if($aa!=$bb)
		{
			echo"<OPTION value=".$tadaa['class_id'].">".$tadaa['class_id'];
			$bb=$aa;
		}
		$counter=$counter-1;
	}
	echo "</select>";
?>

<input type='submit' value='Assign' name='assign'>
</form>





