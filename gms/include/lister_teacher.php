
<form action="teacher.php" method='POST' onsubmit="return confrm()">
<table class="table table-hover">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Teacher Name</th>
                  <th>Department</th>
                  <th>Designation</th>
                  <th>Select</th>
                </tr>
              </thead>
              <tbody>
                <?php
                	ini_set("display_errors","on");
					$sql="SELECT * FROM teacher_detail ORDER BY first_name ASC";
					$q=mysqli_query($connection,$sql) or die(mysqli_error($connection));
					$loop=mysqli_num_rows($q);
					$c=1;
					while($loop!=0)
					{
						$data=mysqli_fetch_array($q);

						echo"<tr>
								<td>".$c."</td>
								<td>".$data['first_name']." ". $data['last_name']."</td>
								<td>".$data['department']."</td>
								<td>".$data['designation']."</td>
								<td><input type='checkbox' value='".$data['email_id']."' name='set_code[]'/></td>

							</tr>";
						$loop=$loop-1;
						$c++;
					}
				?>

              </tbody>
</table>
<button type="submit" class="btn btn-danger" value="Remove Teacher Details" name="delete">Remove Teacher Detail</button>
</form>

