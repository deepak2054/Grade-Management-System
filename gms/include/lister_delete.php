
<form action="course.php" onsubmit='return confrm_del()' method='POST'>
<table class="table table-striped table-hover ">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Course Code</th>
                  <th>Course Name</th>
                  <th>Credit</th>
				  <th>Select</th>
                </tr>
              </thead>
              <tbody>
                <?php
                	ini_set("display_errors","on");
					$sql="SELECT * FROM courses WHERE 1 ORDER BY course_code ASC";
					$q=$connection->query($sql) or die(mysqli_error($connection));
					$loop=mysqli_num_rows($q);
					$c=1;
					while($loop!=0)
					{
						$data=mysqli_fetch_array($q);
						$course=$data['course_code'];
						echo"<tr>
								<td>".$c."</td>
								<td><a href='course.php?course_action=".$course."'>".$data['course_code']."</a></td>
								<td>".$data['course_name']."</td>
								<td>".$data['credit']."</td>
								<td><input type='checkbox' value='".$data['course_code']."' name='set_code[]'/></td>

							</tr>";
						$loop=$loop-1;
						$c++;
					}
				?>

              </tbody>
</table>
<button class="btn btn-danger" type="submit" value="Delete Courses" name="delete">Delete Courses</button>
</form>
