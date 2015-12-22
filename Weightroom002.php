<!--This is the second page that you select either check in or information-->
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<?php
session_start();
$sql = "
SELECT * FROM athletic_users WHERE id='".$_COOKIE['userid']."'";

$db = new mysqli("127.0.0.1", "root", "root", "test");
$result = $db->query($sql);

$row = $result->fetch_assoc();


if ($_COOKIE['userid'] == $row['id']) {
	echo "<h1> You are now logged in  " .$row['firstname'] . " " . $row['lastname']."</h1>";

} else {
	echo "User not found, please go back and try again.";

}


?>

<html>
<head>
	<style>
		h1 {
			color:rgb(148,0,211)
		}
		<title>Check in/ User info</title>
	</style>
</head>

<body style="background-color:gold">

<h1 style="text-align:center">Check In / User Info</h1>

<form style="text-align: center; height: 15em; background-repeat:no-repeat;background-position: center">


	<input type="button" value="Check In" style="width:200px; height:100px; font size:40px" onclick="window.location.href='in.php'" /><br><br>
	<input type="button" value="General Info" onclick="window.location.href='generalinfo.php'" />


</form>

</body>
</html>
