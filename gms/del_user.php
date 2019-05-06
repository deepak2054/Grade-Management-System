<?php ini_set("display_errors","on"); ?>
<?php require_once("session/session.php"); ?>

<?php confirm_logged_in(); ?>
<?php
	$val	= 0;
  	$errval	= 0;
?>


<?php
     require("include/variables.php");
    include('include/connect.php');

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

<?php
$message = "";

if(isset($_POST['delete']))
						{
							$q=0;
							if(isset($_POST['set_code']))
							{
								foreach($_POST['set_code'] as $id )
								{

									$sqla="DELETE FROM `gms`.`user` WHERE username = '$id' ";
									$sql="DELETE FROM `gms`.`user_detail` WHERE user_name = '$id' ";
									$q=mysqli_query($connection,$sqla) or die(mysqli_error($connection));
									$q1=mysqli_query($connection,$sql) or die(mysqli_error($connection));
								}
							}
							if($q && $q1)
							{
								$message	= "Users Deleted SucessFully!!!";
								$val		= 1;
								//header('location:del_user.php');
							}
							else
							{	$errval		= 1;
								$errmessage	=  "Error Deleteing Users!!!";
							}
						}

 ?>
 	<?php include('include/header.php'); ?>

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

		<?php

			$space=str_repeat('&nbsp', 80);
			if($val==1){echo $space;echo "<span class='  alert-success'> "	.$message."</span>";}
			else if($errval==1){echo $space;echo "<span class=' alert-danger'>   ".$errmessage."</span>";}

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

		<form action="del_user.php" method='POST'>
			<table class="table table-hover">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>User Name</th>
                  <th>Email address</th>
                  <th>Select</th>
                </tr>
              </thead>
              <tbody>
                <?php
                	ini_set("display_errors","on");
					$sql="SELECT * FROM `user` WHERE id!=1  ORDER BY id ASC ";
					$q=mysqli_query($connection,$sql) or die(mysqli_error($connection));
					$loop=mysqli_num_rows($q);
					$c=1;
					while($loop!=0)
					{
						$data=mysqli_fetch_array($q);

						echo"<tr>
								<td>".$c."</td>
								<td>".$data['username']."</td>
								<td>".$data['email']."</td>
								<td><input type='checkbox' value='".$data['username']."' name='set_code[]'/></td>

							</tr>";
						$loop=$loop-1;
						$c++;
					}

				?>

              </tbody>
</table>
<button type="submit" class="btn btn-danger" value="Delete Users" name="delete" onclick="">Delete users</button>
</form>


		</div>
		</div>


	</body>
</html>

<?php
$message = "";
$val = 0;
if(isset($_POST['delete']))
						{
							$q=0;
							if(isset($_POST['set_code']))
							{
								foreach($_POST['set_code'] as $id )
								{

									$sqla="DELETE FROM `gms`.`user` WHERE id = '$id' ";
									$q=mysqli_query($connection,$sqla) or die(mysqli_error($connection));
								}
							}
							if($q)
							{
								$message = "Users Deleted SucessFully!!!";
								$val = 1;
								//header('location:del_user.php');
							}
							else
							{	$errval =1;
								$errmessage =  "Error Deleteing Users!!!";
							}
						}

 ?>
<?php
    //Close connection
	if(isset($connection))
	{
		mysqli_close($connection);
	}

	include('include/footer.php');
?>
<?php } ?>