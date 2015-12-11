

<?php
session_start();

$cookie = $_COOKIE['userid'];

$sql = "
SELECT athletic_users.id, lastname, firstname, count(user_id) 
FROM athletic_users 
join athletic_attendance 
ON athletic_attendance.user_id=athletic_users.id 
where athletic_users.id='".$cookie."';";

$db = new mysqli("127.0.0.1", "root", "root", "test");
$result = $db->query($sql);





	echo "<table border = 1>";
	echo "<tr>";
	echo "<td> ID </td>";
	echo "<td> Last Name </td>";
	echo "<td> First Name </td>";
	echo "<td> Days Attended </td>";
	echo "<td> Sports </td>";
		while ($row = $result->fetch_assoc()){
   			$swagnasty = $db->query("SELECT sport_name from sports JOIN sports_enrollment on sports.id=sports_enrollment.sport_id WHERE student_id = ".$row['id'].";");   
			 echo "<tr>";
  			 echo "<td>".htmlentities($row['id'])."</td>";
  			 echo "<td>".htmlentities($row['lastname'])."</td>";
  			 echo "<td>".htmlentities($row['firstname'])."</td>";
  			 echo "<td>".htmlentities($row['count(user_id)'])."</td>";
 			if( !empty($swagnasty)){
 				while($ethangrote = $swagnasty->fetch_assoc()) {
   					echo "<td>".htmlentities($ethangrote['sport_name'])."</td>";
   				}  
  			} else {
  				echo "<td></td>";
 			}												 
 			 echo "</tr>";



}
echo "</table>"; 

?>

<html>
<head>
<style>
	h1 {
		color:rgb(148,0,211)
	}

</style>
</head>

<body style="background-color:gold">


</form>

</body>
</html>
