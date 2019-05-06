<?php ini_set("display_errors","on"); ?>
<?php require_once("session/session.php"); ?>

<?php confirm_logged_in(); ?>



<?php
     require("include/variables.php");


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GMS: ADD USER</title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		<style type="text/css">
			.form-horizontal{
				position: relative;
				left: 20%;
				width: 450px;
				border: 1px rgb(200, 200, 200) solid;
				border-radius: 3%/10px;
				padding: 10px;
				background-color: white;
				box-shadow: 10px 10px 20px 0px gray;
			}
			body {
				background-color: lightgray;
			}
		</style>
	</head>
	<body>



	<?php include('include/header.php'); ?>
		<?php include("include/connect.php"); ?>
		<?php
			if (logged_in_username() == "admin") {
				include('include/nav.php');
				navbar('user');
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
								 <li class="nav-header">Edit Users</li>
								  <li><a href="list_user.php">Show User</a></li>
								  <li><a href="new_user.php">Add User</a></li>
								  <li><a href="del_user.php">Delete User</a></li>
								</ul>
							  </div><!--/.well -->
							</div><!--/span-->
						  </div>
					</div>
		</div>
		<div class="span9">

		<form action="" method=''>
			<table class="table table-hover">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>User Name</th>
                  <th>Name</th>
                  <th>Email address</th>
                </tr>
              </thead>
              <tbody>
	              <?php
	              		if(isset($_GET['action']))
	              			{


	              			}
	               ?>
                <?php
                	ini_set("display_errors","on");
					$sql="SELECT * FROM `user` WHERE id!=1  ORDER BY id ASC ";
					$q=mysqli_query($connection,$sql) or die(mysqli_error($connection));
					$loop=mysqli_num_rows($q);
					$c=1;
					while($loop!=0)
					{
						$data=mysqli_fetch_array($q);
						$user = $data['username'];

						echo"<tr>
								<td>".$c."</td>
								<td><a href='edit_user.php?user=".$user."'>".$data['username']."</a></td>
								<td>".$data['name']."</td>
								<td>".$data['email']."</td>

							</tr>";
						$loop=$loop-1;
						$c++;
					}

				?>


              </tbody>
</table>
</form>


		</div>
		</div>


	</body>
</html>
<?php
    //Close connection
	if(isset($connection))
	{
		mysqli_close($connection);
	}

	include('include/footer.php');
?>
<?php } ?>