<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!--Start of Individual report form query-->
			<div class='well container-fluid span8'	>

				<form class="form-horizontal" action="individual.php" method="post">
				<h2 class="form-signin-heading">Individual Report</h2>

					<div class="control-group">
						<label class="control-label" for="inputRegistration_number"></label>
							<div class="controls">
									<p>
										<select name="type">
											<option value="regNo">Registration Number</option>
											<option value="fullName">Name</option>

										</select></p>



								<input type="text"  name="inputRegistration_number" id="inputRegistration_number" placeholder="" required  >
								<p class="text-error"><?php if($act=='view_individual_error') echo "Student Not found."; ?></p>
								<p class="text-error"><?php if($act=='view_selection_error') echo "Invalid Name"; ?></p>
								<p class="text-error"><?php if($act=='view_selection_errors') echo "Invalid Registration Number"; ?></p>
								<?php ini_set("display_errors","on"); ?>
							</div>
					</div>

					<div class="control-group">
						<div class="controls">
							 <button type="submit" class="btn">Generate</button>
						</div>
					</div>

				</form>
			</div>
			<!--End of Individual-->

</body>
</html>


