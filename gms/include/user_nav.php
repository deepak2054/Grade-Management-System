<link rel="stylesheet" type="text/css" href="css/nav.css">
<?php
	ini_set("display_errors","on");
	function navbar($active="")
	{
		$usrname = logged_in_username();
		?>

		<div id="wrapper">
		<nav>
			<ul>
				<li>
					<a href="grade.php" class=" <?php if($active=="grade"){echo 'active';} ?> ">Grade</a>
				</li>



				<li>
					<a href="edit_user_teacher.php" class=" <?php if($active=="settings"){echo 'active';} ?> ">Setting</a>

				</li>



				<li>
					<a href="javascript: void(0)" class=" <?php if($active=="about"){echo 'active';} ?> ">About</a>
				</li>

				<li style="float:right;">
					<a href="index.php?action=logout" >Logout</a>
				</li>
				<li style="float:right;">
					<p class="navbar-text" style="float:right;">Logged in as <?php echo $usrname; ?></p>
				</li>
				<div style="clear:both;"  ></div>
			</ul>
		</nav>



	</div>



	<?php } ?>