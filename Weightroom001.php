<!-- this is the first initial log in page -->



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="weightroom001.css">

</head>

<h1> Waukee Weight Room Login
</h1>
<form id="number" action="Weightroom001.php" method="POST">
	<p>ID number:</p>
	
	
	<textarea rows="1" class="username" id="Student ID" name="id" placeholder="    Enter ID Number"></textarea>

	<br><br>
	<button type="button" onclick="window.location.href='Weightroom002.php'">Submit</button>
</form>

<?php

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


</body>
</html>