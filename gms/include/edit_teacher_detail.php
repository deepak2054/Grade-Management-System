<form action='teacher.php?action=edit' method='POST'>
	<select name='teacher_email'>
			<OPTION value='1'>-


			<?php
			ini_set("display_errors","on");
					$sql="SELECT * FROM teacher_detail WHERE 1 ORDER BY first_name ASC";
					$q=$connection->query($sql) or die(mysqli_error($connection));
					$loop=mysqli_num_rows($q);

					while($loop!=0)
					{
						$data=mysqli_fetch_array($q);
						extract($data);
						echo "<OPTION value='".$email_id."'>".$first_name." ".$last_name;
						$loop=$loop-1;
					}
			?>
	</select><br>
	<button class="btn btn-primary" name="change" type="Submit">Change</button>
</form>

