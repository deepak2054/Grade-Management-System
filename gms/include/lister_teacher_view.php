
<table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Teachers Name</th>
                  <th>Department</th>
                  <th>Designation</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                <?php
                	ini_set("display_errors","on");
					$sql="SELECT * FROM teacher_detail WHERE 1 ORDER BY first_name ASC";
					$q=$connection->query($sql) or die(mysqli_error($connection));
					$loop=mysqli_num_rows($q);
					$c=1;
					while($loop!=0)
					{
						$data=mysqli_fetch_array($q);

						echo"<tr>
								<td>".$c."</td>

								<td>".$data['first_name']." ".$data['last_name']."</td>
								<td>".$data['department']."</td>
								<td>".$data['designation']."</td>
								<td>".$data['email_id']."</td>

							</tr>";
						$loop=$loop-1;
						$c++;
					}
				?>

              </tbody>
</table>
