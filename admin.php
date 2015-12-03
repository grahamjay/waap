<head>
<h1 style="text-align:center">Admin Page</h1>
</head>

<body>

<form id="all_click" action="admin.php" method="POST">
<h1>Click the following for giant list of attendance: </h1>
	<input type = "submit" value ="ALL ATTENDANCE EVER" name="all_click">

<br><br><br><br><br><hr>	

</body>
<ul> 
<?php
   if(isset($_POST['all_click'])){
       $db = new mysqli("127.0.0.1", "root", "root", "test");
$result = $db->query("select grade, lastname, firstname, count(user_id) 
                   from athletic_users join athletic_attendance on athletic_attendance.user_id=athletic_users.id 
                   group by user_id 
                   ORDER BY lastname;");
                   
echo "<table border = 1>";
echo "<tr>";
echo "<td> Grade </td>";
echo "<td> Last Name </td>";
echo "<td> First Name </td>";
echo "<td> Days Attended </td>";
while ($row = $result->fetch_assoc()){
   echo "<tr>";
   echo "<td>".htmlentities($row['grade'])."</td>";
   echo "<td>".htmlentities($row['lastname'])."</td>";
   echo "<td>".htmlentities($row['firstname'])."</td>";
   echo "<td>".htmlentities($row['count(user_id)'])."</td>";
  echo "</tr>";


}echo "</table>";
}


?>
</form>

<br><br>
	
	
<h1>
Or you can choose certain dates:

</h1>	
<br>
<form id="all_click" action="admin.php" method="POST">
See attendance from TODAY:
<input type="submit" name="today_attendance" value="Today's Attendance">
<br><br>
<?php
    if(isset($_POST['today_attendance'])){
    echo "<br><br>";
        $db = new mysqli("127.0.0.1", "root", "root", "test");
		$result2 = $db->query("SELECT grade, lastname, firstname, count(user_id) 
								FROM athletic_attendance 
    							JOIN athletic_users ON athletic_attendance.user_id=athletic_users.id 
   								WHERE attendance_datetime = curdate()
											GROUP BY user_id 
											ORDER BY lastname;");

echo "<table border = 1>";
echo "<tr>";
echo "<td> Grade </td>";
echo "<td> Last Name </td>";
echo "<td>First Name </td>";
echo "<td> Days Attended </td>";
while ($row = $result2->fetch_assoc()){
   echo "<tr>";
   echo "<td>".htmlentities($row['grade'])."</td>";
   echo "<td>".htmlentities($row['lastname'])."</td>";
   echo "<td>".htmlentities($row['firstname'])."</td>";
   echo "<td>".htmlentities($row['count(user_id)'])."</td>";
  echo "</tr>";


}echo "</table>";
}



?>
<br><br>

<form id="all_click" action="admin.php" method="POST">	

Choose a start date:
<input type="date" value="start_date" name="start_date">

Choose an end date:
<input type="date" value="end_date" name="end_date">
<input type="submit" name="submit_dates" value="Input Dates">



<?php
    if(isset($_POST['submit_dates'])){
    echo "<br><br>";
        $db = new mysqli("127.0.0.1", "root", "root", "test");
		$result2 = $db->query("SELECT grade, lastname, firstname, count(user_id) 
								FROM athletic_attendance 
    							JOIN athletic_users ON athletic_attendance.user_id=athletic_users.id 
   								WHERE attendance_datetime >= '".$_POST['start_date']."'".
    							"AND attendance_datetime <= '".$_POST['end_date']."'". 
											"GROUP BY user_id 
											ORDER BY lastname;");
	echo "<br><br><br>";
	echo "THE DATES YOU HAVE ENTERED ARE: ".$_POST['start_date']." TO   ".$_POST['end_date'];	
	echo "<br><br><br>";
					
							
echo "<table border = 1>";
echo "<tr>";
echo "<td> Grade </td>";
echo "<td> Last Name </td>";
echo "<td>First Name </td>";
echo "<td> Days Attended </td>";
while ($row = $result2->fetch_assoc()){
   echo "<tr>";
   echo "<td>".htmlentities($row['grade'])."</td>";
   echo "<td>".htmlentities($row['lastname'])."</td>";
   echo "<td>".htmlentities($row['firstname'])."</td>";
   echo "<td>".htmlentities($row['count(user_id)'])."</td>";
  echo "</tr>";


}echo "</table>";
}



?>

<br> <br> <hr> 
<h1>
Or you can search for an individual student:

</h1>	
<form id="individual" action="admin.php" method="POST">	
	Last Name:
		<input id ="lastnamebutton" name="lastnamebutton" type ="text">
	First Name:
		<input id ="firstname" name="firstname" type ="text">
		<input type = "submit" name="firstnamebutton" value="Search By Name">
		<br><br><br>	

</form>		
<?php
    if(isset($_POST['firstnamebutton'])){
    echo "<br><br>";
        $db = new mysqli("127.0.0.1", "root", "root", "test");
		$result3 = $db->query("SELECT grade, lastname, firstname, count(user_id) from athletic_attendance 
									join athletic_users
    								on athletic_attendance.user_id=athletic_users.id
    								where lastname = ('".$_POST['lastnamebutton']."' and firstname like '%".$_POST['firstname']."%') 
    								OR lastname = ".$_POST['lastnamebutton'].";");
						
echo "<table border = 1>";
echo "<tr>";
echo "<td> Grade </td>";
echo "<td> Last Name </td>";
echo "<td>First Name </td>";
echo "<td> Days Attended </td>";
while ($row = $result3->fetch_assoc()){
   echo "<tr>";
   echo "<td>".htmlentities($row['grade'])."</td>";
   echo "<td>".htmlentities($row['lastname'])."</td>";
   echo "<td>".htmlentities($row['firstname'])."</td>";
   echo "<td>".htmlentities($row['count(user_id)'])."</td>";
  echo "</tr>";


}echo "</table>";

}



?>

<br>
	Student ID number:
		<input id ="IDnumber" name="IDnumber" type ="text">
		<input type = "submit" name="idnumberbutton" value="Search By ID Number">
		
		<br><br><br>
		
		
<?php
    if(isset($_POST['idnumberbutton'])){
    echo "<br><br>";
        $db = new mysqli("127.0.0.1", "root", "root", "test");
		$result4 = $db->query("SELECT grade, lastname, firstname, count(user_id) from athletic_attendance
								JOIN athletic_users
    							ON athletic_attendance.user_id=athletic_users.id
    							WHERE id = '".$_POST['IDnumber']."';");

						
echo "<table border = 1>";
echo "<tr>";
echo "<td> Grade </td>";
echo "<td> Last Name </td>";
echo "<td>First Name </td>";
echo "<td> Days Attended </td>";
while ($row = $result4->fetch_assoc()){
   echo "<tr>";
   echo "<td>".htmlentities($row['grade'])."</td>";
   echo "<td>".htmlentities($row['lastname'])."</td>";
   echo "<td>".htmlentities($row['firstname'])."</td>";
   echo "<td>".htmlentities($row['count(user_id)'])."</td>";
  echo "</tr>";


}echo "</table>";
}



?>

<hr><br><br>
<a href="sports.php"><h1>Click Here for Individual Sports Data</h1></a>


</form>


</form>

</ul>
