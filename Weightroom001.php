<!-- this is the first initial log in page -->

<!DOCTYPE html>
<html>
<head>
<style>
	h1 {
		color:rgb(254, 255, 0)
	}
	#number {
		color:rgb(254, 255, 0)
	}
</style>
</head>
<body style="background-color:purple">
<h1> Waukee Weight Room Login
</h1>
<form id="number" action="Weightroom001.php" method="POST">
	ID number:
	<input id ="id" name="id" type ="text">
	<input type = "submit" name="ID">

<?php

echo $_POST;

if ($_POST['id'] == 123456) {
	header("Location: http://107.170.184.216/admin.php");
    exit();
    }

if(isset($_POST['id'])){

	$sql = " SELECT * FROM athletic_users WHERE id='".$_POST['id']."'";

	$db = new mysqli("127.0.0.1", "root", "root", "test");
	$result = $db->query($sql);

	$row = $result->fetch_assoc();

	if ($_POST['id'] == $row['id']) {
		$_SESSION['cat'] = $_POST['id'];
		setcookie('userid', $_POST['id'], time() + 3600);
		header("Location: http://107.170.184.216/Weightroom002.php");

	} else {
		echo "<br><br><br>";
		echo "User not found, please try again.";
	}
}
?>

</form>
</body>
</html>