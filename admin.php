<head>
<h1 style="text-align:center; font-size:75px">Admin Page</h1>
<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>

<body>

<form id="all_click" action="admin.php" method="POST">
<h1>Click the following for giant list of attendance: </h1>
	<div style="padding-left:43%"><input type = "submit" value ="ALL ATTENDANCE EVER" name="all_click"></div>

<br><hr>	

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


	
	
<h1>
Or you can choose certain dates:

</h1>	
<br>
<form id="all_click" action="admin.php" method="POST">
<div style="padding-left:30%">See attendance from TODAY in ALPHABETICAL ORDER:<br>
<input type="submit" name="today_attendance" value="Today's Attendance">
<br><br>
<?php
    if(isset($_POST['today_attendance'])){
    echo "<br><br>";
        $db = new mysqli("127.0.0.1", "root", "root", "test");
		$result2 = $db->query("SELECT id, grade, lastname, firstname, count(user_id), CONCAT(EXTRACT(HOUR from attendance_datetime),':', EXTRACT(MINUTE from attendance_datetime)) as Time 
								FROM athletic_attendance 
    							JOIN athletic_users ON athletic_attendance.user_id=athletic_users.id 
   								WHERE attendance_datetime >= curdate()
											GROUP BY user_id 
											ORDER BY lastname;");

echo "<table border = 1>";
echo "<tr>";
echo "<td> Grade </td>";
echo "<td> Last Name </td>";
echo "<td>First Name </td>";
echo "<td> Days Attended </td>";
echo "<td> Time Checked-In </td>";
echo "<td> Sport </td>";

$total = $db->query("SELECT count(distinct user_id) as swag
		FROM athletic_attendance 
		JOIN athletic_users ON athletic_attendance.user_id=athletic_users.id 
		WHERE attendance_datetime >= curdate();")->fetch_object()->swag;

while ($row = $result2->fetch_assoc()){

	$swagnasty = $db->query("SELECT sport_name from sports JOIN sports_enrollment on sports.id=sports_enrollment.sport_id WHERE student_id =".$row['id'].";");    
	$ethangrote = $swagnasty->fetch_assoc();

   echo "<tr>";
   echo "<td>".htmlentities($row['grade'])."</td>";
   echo "<td>".htmlentities($row['lastname'])."</td>";
   echo "<td>".htmlentities($row['firstname'])."</td>";
   echo "<td>".htmlentities($row['count(user_id)'])."</td>";
   echo "<td>".htmlentities($row['Time'])."</td>";
	if( !empty($ethangrote)){
	   echo "<td>".htmlentities($ethangrote['sport_name'])."</td>";  
	  } else {
	  echo "<td></td>";
	  }
  echo "</tr>";

}
  echo "<tr><td colspan=6 style='text-align:center;'>TOTAL: ".$total."</td></tr>";
echo "</table>";






}



?>
</form>

<form id="all_click" action="admin.php" method="POST">
See attendance from TODAY in order by the TIME THEY CHECKED IN:<br>
<input type="submit" name="today_attendance_time" value="Today's Attendance">
<br><br>
<?php
    if(isset($_POST['today_attendance_time'])){
    echo "<br><br>";
        $db = new mysqli("127.0.0.1", "root", "root", "test");
		$result2 = $db->query("SELECT id, grade, lastname, firstname, count(user_id), CONCAT(EXTRACT(HOUR from attendance_datetime),':', EXTRACT(MINUTE from attendance_datetime)) as Time 
								FROM athletic_attendance 
    							JOIN athletic_users ON athletic_attendance.user_id=athletic_users.id 
   								WHERE attendance_datetime >= curdate()
											GROUP BY user_id 
											ORDER BY attendance_datetime;");
											

echo "<table border = 1>";
echo "<tr>";
echo "<td> Grade </td>";
echo "<td> Last Name </td>";
echo "<td>First Name </td>";
echo "<td> Days Attended </td>";
echo "<td> Time Checked-In </td>";
echo "<td> Sport </td>";

$total = $db->query("SELECT count(distinct user_id) as swag
		FROM athletic_attendance 
		JOIN athletic_users ON athletic_attendance.user_id=athletic_users.id 
		WHERE attendance_datetime >= curdate();")->fetch_object()->swag;

while ($row = $result2->fetch_assoc()){

	$swagnasty = $db->query("SELECT sport_name from sports JOIN sports_enrollment on sports.id=sports_enrollment.sport_id WHERE student_id =".$row['id'].";");    
	$ethangrote = $swagnasty->fetch_assoc();

   echo "<tr>";
   echo "<td>".htmlentities($row['grade'])."</td>";
   echo "<td>".htmlentities($row['lastname'])."</td>";
   echo "<td>".htmlentities($row['firstname'])."</td>";
   echo "<td>".htmlentities($row['count(user_id)'])."</td>";
   echo "<td>".htmlentities($row['Time'])."</td>";
	if( !empty($ethangrote)){
	   echo "<td>".htmlentities($ethangrote['sport_name'])."</td>";  
	  } else {
	  echo "<td></td>";
	  }
  echo "</tr>";

}
  echo "<tr><td colspan=6 style='text-align:center;'>TOTAL: ".$total."</td></tr>";
echo "</table>";






}



?>

</form>






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
		$result2 = $db->query("SELECT id, grade, lastname, firstname, count(user_id) 
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
echo "<td> Time Checked-In </td>";
echo "<td> Sport </td>";


$total = $db->query("SELECT count(distinct user_id) as swag
		FROM athletic_attendance 
		JOIN athletic_users ON athletic_attendance.user_id=athletic_users.id 
		WHERE attendance_datetime >= curdate();")->fetch_object()->swag;

while ($row = $result2->fetch_assoc()){

$swagnasty = $db->query("SELECT sport_name from sports JOIN sports_enrollment on sports.id=sports_enrollment.sport_id WHERE student_id =".$row['id'].";");    
$ethangrote = $swagnasty->fetch_assoc();
   echo "<tr>";
   echo "<td>".htmlentities($row['grade'])."</td>";
   echo "<td>".htmlentities($row['lastname'])."</td>";
   echo "<td>".htmlentities($row['firstname'])."</td>";
   echo "<td>".htmlentities($row['count(user_id)'])."</td>";
   echo "<td>".htmlentities($row['Time'])."</td>";
   
if( !empty($ethangrote)){
   echo "<td>".htmlentities($ethangrote['sport_name'])."</td>";  
  } else {
  echo "<td></td>";
  }
  echo "</tr>";

}
  echo "<tr><td colspan=6 style='text-align:center;'>TOTAL: ".$total."</td></tr>";
echo "</table>";






}


?>

<br> <br> <hr> </div>
<h1>
Or you can search for an individual student:

</h1>	
<div style="padding-left:30%"><form id="individual" action="admin.php" method="POST">	
	Last Name:
		<input id ="lastnamebutton" name="lastnamebutton" type ="text">
	First Name:
		<input id ="firstname" name="firstname" type ="text">
		<input type = "submit" name="firstnamebutton" value="Search By Name">
		<br><br>	

</form>		
<?php
    if(isset($_POST['firstnamebutton'])){
    echo "<br><br>";
        $db = new mysqli("127.0.0.1", "root", "root", "test");
        $sql= "SELECT id, grade, lastname, firstname, count(user_id) from athletic_attendance 
									join athletic_users
    								on athletic_attendance.user_id=athletic_users.id
    								where ";
    								
    	if(isset($_POST['lastnamebutton']) && isset($_POST['firstname']))   {
    		$part2 = "lastname = '".$_POST['lastnamebutton']."' and firstname = '".$_POST['firstname']."';";
    	}
    	else if (isset($_POST['lastnamebutton']) && !isset($_POST['firstname']))  {
    		$part2 = "lastname = '".$_POST['lastnamebutton']."';";
    	}
    	else if (!isset($_POST['lastnamebutton']) && isset($_POST['firstname']))  {
    		$part2 = "firstname = '".$_POST['firstname']."';";
    	}
    	
    	else { 
    	$part2 = "id = -1;";
    	}
    	
		$result3 = $db->query($sql.$part2);
						
echo "<table border = 1>";
echo "<tr>";
echo "<td> Grade </td>";
echo "<td> Last Name </td>";
echo "<td>First Name </td>";
echo "<td> Days Attended </td>";
echo "<td> Sport </td>";


$total = $db->query("SELECT count(distinct user_id) as swag
		FROM athletic_attendance 
		JOIN athletic_users ON athletic_attendance.user_id=athletic_users.id 
		WHERE attendance_datetime >= curdate();")->fetch_object()->swag;

while ($row = $result3->fetch_assoc()){

$swagnasty = $db->query("SELECT sport_name from sports JOIN sports_enrollment on sports.id=sports_enrollment.sport_id WHERE student_id =".$row['id'].";");    
$ethangrote = $swagnasty->fetch_assoc();
   echo "<tr>";
   echo "<td>".htmlentities($row['grade'])."</td>";
   echo "<td>".htmlentities($row['lastname'])."</td>";
   echo "<td>".htmlentities($row['firstname'])."</td>";
   echo "<td>".htmlentities($row['count(user_id)'])."</td>";

   
if( !empty($ethangrote)){
   echo "<td>".htmlentities($ethangrote['sport_name'])."</td>";  
  } else {
  echo "<td></td>";
  }
  echo "</tr>";

}
  echo "<tr><td colspan=5 style='text-align:center;'>TOTAL: ".$total."</td></tr>";
echo "</table>";






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
		$result4 = $db->query("SELECT id, grade, lastname, firstname, count(user_id) from athletic_attendance
								JOIN athletic_users
    							ON athletic_attendance.user_id=athletic_users.id
    							WHERE id = '".$_POST['IDnumber']."';");

						
echo "<table border = 1>";
echo "<tr>";
echo "<td> Grade </td>";
echo "<td> Last Name </td>";
echo "<td>First Name </td>";
echo "<td> Days Attended </td>";
echo "<td> Sport </td>";


$total = $db->query("SELECT count(distinct user_id) as swag
		FROM athletic_attendance 
		JOIN athletic_users ON athletic_attendance.user_id=athletic_users.id 
		WHERE attendance_datetime >= curdate();")->fetch_object()->swag;

while ($row = $result4->fetch_assoc()){

$swagnasty = $db->query("SELECT sport_name from sports JOIN sports_enrollment on sports.id=sports_enrollment.sport_id WHERE student_id =".$row['id'].";");    
$ethangrote = $swagnasty->fetch_assoc();
   echo "<tr>";
   echo "<td>".htmlentities($row['grade'])."</td>";
   echo "<td>".htmlentities($row['lastname'])."</td>";
   echo "<td>".htmlentities($row['firstname'])."</td>";
   echo "<td>".htmlentities($row['count(user_id)'])."</td>";

   
if( !empty($ethangrote)){
   echo "<td>".htmlentities($ethangrote['sport_name'])."</td>";  
  } else {
  echo "<td></td>";
  }
  echo "</tr>";

}
  echo "<tr><td colspan=5 style='text-align:center;'>TOTAL: ".$total."</td></tr>";
echo "</table>";






}


?>

<hr><br></div>
<a href="sports.php"  style="color:blue"><h1>Click Here for Individual Sports Data</h1></a>


</form>


</form>

</ul>
