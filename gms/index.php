<?php ini_set("display_errors", "on");?>
<?php require_once "session/session.php";?>

<?php
if (isset($_GET["action"]) and $_GET["action"] == "logout") {
    logout();
}
if (logged_in()) {
    if (logged_in_username() == "admin") {
        header("location: course.php?action=view");
    } else {
        header("location: grade.php");
    }
}
?>

<?php

require "include/variables.php";
include 'include/connect.php';
?>

<?php
include_once "function/functions.php";

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);

    $query = "SELECT id, username ";
    $query .= "FROM user ";
    $query .= "WHERE username = '{$username}' ";
    $query .= "AND password ='{$password}' ";
    $result_set = $connection->query($query);
    confirm_query($result_set);
    if (mysqli_affected_rows($connection) == 1) {
        $found_user           = mysqli_fetch_array($result_set);
        $_SESSION['user_id']  = $found_user['id'];
        $_SESSION['username'] = $found_user['username'];
        header("location: grade.php");
    } else {
        //username and password combination not found in database
        $message = "Username and password combination incorrect.<br />";
        //$message .= "Please make sure your caps lock is turned off and try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/styles1.css">




	</head>
	<body>
		<?php
include 'include/header.php';
?>
		  
        <div id="main_section">
     



		<a href='view-report.php' class='btn-report' style="text-decoration: none;">View Report</a>



		<?php if (!(isset($_POST['report']))) {
    echo "<form action=\"index.php\" method=\"post\">";

    echo "<table class=\"table\">";
    echo "<caption>Please Sign In</caption>";
    echo "<tr>";
    echo "<td>Username: </td>";
    echo "<td>";
    echo "<input type=\"text\" name=\"username\" placeholder=\"Username ...\" required= autofocus=\"on\" >";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Password: </td>";
    echo "<td>";
    echo "<input type=\"password\" name=\"password\" placeholder=\"Password ...\" required >";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td colspan=\"2\">";
    echo "<input type=\"submit\" name=\"submit\" value=\"Log In\">";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</form>";
}?>
		<div style="background-color:darkred;width:100%;"><?php if (!empty($message)) {echo "<p style=\"color:white;text-align:center;\">&#9888" . $message . "</p>";}?></div>
		</div>


		<?php include 'include/footer.php';?>
	</body>
</html>

<?php
//Close connection
if (isset($connection)) {
    mysqli_close($connection);
}
?>


