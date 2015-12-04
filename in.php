<body style="background-color:gold">
<style>

	h1 {
		color:rgb(148,0,211)
	}
	
</style>
</body>

<?php

$db = new mysqli("127.0.0.1", "root", "root", "test");
$result = $db->query("INSERT into athletic_attendance (user_id, attendance_datetime)
VALUES (".$_COOKIE['userid'].", NOW())");

echo "<h1> You are now checked in!</h1>";

?>

<input type="button" value="Login Screen" onclick="window.location.href='Weightroom001.php'" /><br><br>