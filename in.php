<link rel="stylesheet" type="text/css" href="bootstrap.css">

<form style="text-align: center; height: 15em; background-repeat:no-repeat;background-position: center">
	<body style="background-color:gold">
	<style>

		h1 {
			color:rgb(148,0,211)
		}

	</style>
	</body>

	<?php

	$db = new mysqli("127.0.0.1", "root", "root", "test");
	$insert = "INSERT into athletic_attendance (user_id, attendance_datetime) VALUES (".$_COOKIE['userid'].", now());";

	$result = $db->query($insert);


	$error = mysqli_error($db);


	if ($error != "") {
		echo var_dump($error);
	}

	echo "<h1> You are now checked in!</h1>";

	?>

	<input type="button" value="Login Screen" style="width:200px; height:100px; font size:40px" onclick="window.location.href='Weightroom001.php'" /><br><br>


</form>