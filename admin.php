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
$result = $db->query("select lastname, firstname, count(user_id) 
                   from athletic_users join athletic_attendance on athletic_attendance.user_id=athletic_users.id 
                   group by user_id 
                   ORDER BY lastname;");
                   
echo "<table border = 1>";
echo "<tr>";
echo "<td> Last Name </td>";
echo "<td>First Name </td>";
echo "<td> Days Attended </td>";
while ($row = $result2->fetch_assoc()){
   echo "<tr>";
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
Or you can choose a set of dates:

</h1>	
<form id="all_click" action="admin.php" method="POST">	
	Start Month:
		<input id ="start_month" name="start_month" type ="text">
	Start Day:
		<input id ="start_day" name="start_day" type ="text">	
	Start Year:
		<input id ="start_year" name="start_year" type ="text">
		
		<br><br><br>
	End Month:
		<input id ="end_month" name="end_month" type ="text">
	End Day:
		<input id ="end_day" name="end_day" type ="text">	
	End Year:
		<input id ="end_year" name="end_year" type ="text">	
		
		<input type = "submit" name="date_range" value="Submit Date Range">
		<hr><br><br><br>

<?php
    if(isset($_POST['date_range'])){
    echo "<br><br>";
        $db = new mysqli("127.0.0.1", "root", "root", "test");
		$result2 = $db->query("SELECT lastname, firstname, count(user_id) 
								FROM athletic_attendance 
    							JOIN athletic_users ON athletic_attendance.user_id=athletic_users.id 
   					WHERE attendance_datetime >= '".$_POST['start_year']."-".$_POST['start_month']."-".$_POST['start_day']."'"
    				."AND attendance_datetime <= '".$_POST['end_year']."-".$_POST['end_month']."-".$_POST['end_day']."'". 
											"GROUP BY user_id 
											ORDER BY lastname;");
	echo "THE DATES YOU HAVE ENTERED ARE: ".$_POST['start_month']."-".$_POST['start_day']."-".$_POST['start_year']."    TO    "	  
		.$_POST['end_month']."-".$_POST['end_day']."-".$_POST['end_year']."<br><br><hr><br><br>";		
					
							
echo "<table border = 1>";
echo "<tr>";
echo "<td> Last Name </td>";
echo "<td>First Name </td>";
echo "<td> Days Attended </td>";
while ($row = $result2->fetch_assoc()){
   echo "<tr>";
   echo "<td>".htmlentities($row['lastname'])."</td>";
   echo "<td>".htmlentities($row['firstname'])."</td>";
   echo "<td>".htmlentities($row['count(user_id)'])."</td>";
  echo "</tr>";


}echo "</table>";
}



?>
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

		
<?php
    if(isset($_POST['firstnamebutton'])){
    echo "<br><br>";
        $db = new mysqli("127.0.0.1", "root", "root", "test");
		$result2 = $db->query("SELECT lastname, firstname, count(user_id) from athletic_attendance 
									join athletic_users
    								on athletic_attendance.user_id=athletic_users.id
    								where lastname = ('".$_POST['lastnamebutton']."' and firstname like '%".$_POST['firstname']."%') 
    								OR lastname = ".$_POST['lastnamebutton'].";");
						
echo "<table border = 1>";
echo "<tr>";
echo "<td> Last Name </td>";
echo "<td>First Name </td>";
echo "<td> Days Attended </td>";
while ($row = $result2->fetch_assoc()){
   echo "<tr>";
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
		$result2 = $db->query("SELECT lastname, firstname, count(user_id) from athletic_attendance
								JOIN athletic_users
    							ON athletic_attendance.user_id=athletic_users.id
    							WHERE id = '".$_POST['IDnumber']."';");

						
echo "<table border = 1>";
echo "<tr>";
echo "<td> Last Name </td>";
echo "<td>First Name </td>";
echo "<td> Days Attended </td>";
while ($row = $result2->fetch_assoc()){
   echo "<tr>";
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
