<head>
<h1 style="text-align:center">Sports Admin Page</h1>
<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>

<body>
<hr>

<h1> INSERT students into sports </h1>
<form id="sport" action="sports.php" method="POST">	

	Student ID Numbers:
	<br>
		<input id ="studentid1" name="studentid1" type ="text">
		<input id ="studentid2" name="studentid2" type ="text">
		<input id ="studentid3" name="studentid3" type ="text">
		<input id ="studentid4" name="studentid4" type ="text">	
		<input id ="studentid5" name="studentid5" type ="text">	
		<input id ="studentid6" name="studentid6" type ="text">	
		<input id ="studentid7" name="studentid7" type ="text">	
		<input id ="studentid8" name="studentid8" type ="text">	
		<input id ="studentid9" name="studentid9" type ="text">
		<input id ="studentid10" name="studentid10" type ="text">
		

		
	<br><br>
	
	

<select name="sport">


  <option value="Nada">SELECT INDV SPORT</option>
  <option value="1">Football</option>
  <option value="2">Volleyball</option>
  <option value="15">Boys Cross Country</option>
  <option value="16">Girls Cross Country</option>
  <option value="22">Cheer</option>
  <option value="23">Dance</option>
  <option value="13">Boys Golf</option>
  <option value="6">Girls Basketball</option>
  <option value="5">Boys Basketball</option>
  <option value="10">Girls Bowling</option>
  <option value="9">Boys Bowling</option>
  <option value="11">Boys Swimming</option>
  <option value="12">Girls Swimming</option>
  <option value="21">Wrestling</option>
  <option value="14">Girls Golf</option>
  <option value="17">Boys Track & Field</option>
  <option value="18">Girls Track & Field</option>
  <option value="7">Boys Tennis</option>
  <option value="8">Girls Tennis</option>
  <option value="19">Boys Soccer</option>
  <option value="20">Girls Soccer</option>
  <option value="4">Softball</option>
  <option value="3">Baseball</option>
</select>
<br><br>
<input type = "submit" name="submit" value="Insert Selected Sport">


<?php
        $db = new mysqli("127.0.0.1", "root", "root", "test");
	if(isset($_POST['studentid1']) and isset($_POST['sport']) and $_POST['sport']!= 'Nada')
	{
	    
		$result = $db->query("INSERT into sports_enrollment (student_id, sport_id) values (".$_POST['studentid1'].",". $_POST['sport'].");");

	
	}
	if(isset($_POST['studentid2']) and isset($_POST['sport']) and $_POST['sport']!= 'Nada')
	{
	
		$result = $db->query("INSERT into sports_enrollment (student_id, sport_id) values (".$_POST['studentid2'].",". $_POST['sport'].");");

	
	}

	if(isset($_POST['studentid3']) and isset($_POST['sport']) and $_POST['sport']!= 'Nada')
	{

		$result = $db->query("INSERT into sports_enrollment (student_id, sport_id) values (".$_POST['studentid3'].",". $_POST['sport'].");");

	
	}
	if(isset($_POST['studentid4']) and isset($_POST['sport']) and $_POST['sport']!= 'Nada')
	{
	
		$result = $db->query("INSERT into sports_enrollment (student_id, sport_id) values (".$_POST['studentid4'].",". $_POST['sport'].");");

	
	}
	
		if(isset($_POST['studentid5']) and isset($_POST['sport']) and $_POST['sport']!= 'Nada')
	{
		$result = $db->query("INSERT into sports_enrollment (student_id, sport_id) values (".$_POST['studentid5'].",". $_POST['sport'].");");

	
	}
	
		if(isset($_POST['studentid6']) and isset($_POST['sport']) and $_POST['sport']!= 'Nada')
	{
		$result = $db->query("INSERT into sports_enrollment (student_id, sport_id) values (".$_POST['studentid6'].",". $_POST['sport'].");");

	
	}
	
		if(isset($_POST['studentid7']) and isset($_POST['sport']) and $_POST['sport']!= 'Nada')
	{
		$result = $db->query("INSERT into sports_enrollment (student_id, sport_id) values (".$_POST['studentid7'].",". $_POST['sport'].");");

	
	}
		if(isset($_POST['studentid8']) and isset($_POST['sport']) and $_POST['sport']!= 'Nada')
	{
		$result = $db->query("INSERT into sports_enrollment (student_id, sport_id) values (".$_POST['studentid8'].",". $_POST['sport'].");");

	
	}
	
		if(isset($_POST['studentid9']) and isset($_POST['sport']) and $_POST['sport']!= 'Nada')
	{
		$result = $db->query("INSERT into sports_enrollment (student_id, sport_id) values (".$_POST['studentid9'].",". $_POST['sport'].");");

	
	}
	
		if(isset($_POST['studentid10']) and isset($_POST['sport']) and $_POST['sport']!= 'Nada')
	{
		$result = $db->query("INSERT into sports_enrollment (student_id, sport_id) values (".$_POST['studentid10'].",". $_POST['sport'].");");

	
	}
?>
</form>


<hr>



<form id="indv_sports" action="sports.php" method="POST">

<h1>VIEW ATTENDANCE for an individual sport </h1>
<select name="indv_sport">


 <option value="Nada">SELECT INDV SPORT</option>
  <option value="1">Football</option>
  <option value="2">Volleyball</option>
  <option value="15">Boys Cross Country</option>
  <option value="16">Girls Cross Country</option>
  <option value="22">Cheer</option>
  <option value="23">Dance</option>
  <option value="13">Boys Golf</option>
  <option value="6">Girls Basketball</option>
  <option value="5">Boys Basketball</option>
  <option value="10">Girls Bowling</option>
  <option value="9">Boys Bowling</option>
  <option value="11">Boys Swimming</option>
  <option value="12">Girls Swimming</option>
  <option value="21">Wrestling</option>
  <option value="14">Girls Golf</option>
  <option value="17">Boys Track & Field</option>
  <option value="18">Girls Track & Field</option>
  <option value="7">Boys Tennis</option>
  <option value="8">Girls Tennis</option>
  <option value="19">Boys Soccer</option>
  <option value="20">Girls Soccer</option>
  <option value="4">Softball</option>
  <option value="3">Baseball</option>
</select>
<input type = "submit" name="submit" value="View Selected Sport">

<br><br><br><hr>
<?php
 
	if(isset($_POST['indv_sport']) and $_POST['sport']!= 'Nada')
	{
	    echo "<br><br>";
		$result = $db->query("SELECT grade, lastname, firstname, sport_name, count(user_id) FROM sports_enrollment JOIN sports ON sports_enrollment.sport_id = sports.id
								JOIN athletic_users ON sports_enrollment.student_id = athletic_users.id
                                JOIN athletic_attendance ON athletic_users.id=athletic_attendance.user_id
								WHERE sports.id=".$_POST['indv_sport']."
                                GROUP BY user_id
                                ORDER BY lastname;");

echo "<table border = 1>";
echo "<tr>";
echo "<td> Grade </td>";
echo "<td> Last Name </td>";
echo "<td>First Name </td>";
echo "<td> Sport </td>";
echo "<td> Days Attended </td>";

while ($row = $result->fetch_assoc()){
   echo "<tr>";
   echo "<td>".htmlentities($row['grade'])."</td>";
   echo "<td>".htmlentities($row['lastname'])."</td>";
   echo "<td>".htmlentities($row['firstname'])."</td>";
   echo "<td>".htmlentities($row['sport_name'])."</td>";
   echo "<td>".htmlentities($row['count(user_id)'])."</td>";
  echo "</tr>";


}echo "</table>";

	}


?>

</form>	
<h1> DELETE students from a sport </h1>
<form id="sport" action="sports.php" method="POST">	

	Student ID Numbers:
	<br>
		<input id ="studentid11" name="studentid11" type ="text">
		<input id ="studentid12" name="studentid12" type ="text">
		<input id ="studentid13" name="studentid13" type ="text">
		<input id ="studentid14" name="studentid14" type ="text">
		<select name="sportremove">


 <option value="Nada">SELECT INDV SPORT</option>
  <option value="1">Football</option>
  <option value="2">Volleyball</option>
  <option value="15">Boys Cross Country</option>
  <option value="16">Girls Cross Country</option>
  <option value="22">Cheer</option>
  <option value="23">Dance</option>
  <option value="13">Boys Golf</option>
  <option value="6">Girls Basketball</option>
  <option value="5">Boys Basketball</option>
  <option value="10">Girls Bowling</option>
  <option value="9">Boys Bowling</option>
  <option value="11">Boys Swimming</option>
  <option value="12">Girls Swimming</option>
  <option value="21">Wrestling</option>
  <option value="14">Girls Golf</option>
  <option value="17">Boys Track & Field</option>
  <option value="18">Girls Track & Field</option>
  <option value="7">Boys Tennis</option>
  <option value="8">Girls Tennis</option>
  <option value="19">Boys Soccer</option>
  <option value="20">Girls Soccer</option>
  <option value="4">Softball</option>
  <option value="3">Baseball</option>
</select>
		
  <input type = "submit" name="submit" value="DELETE Selected Students">
		
<?php
	if(isset($_POST['studentid11']) and isset($_POST['sportremove']) and $_POST['sportremove']!= 'Nada')
	{
		$result = $db->query("DELETE from sports_enrollment WHERE student_id=".$_POST['studentid11']." AND sport_id=".$_POST['sportremove'].";");
}
	if(isset($_POST['studentid12']) and isset($_POST['sportremove']) and $_POST['sportremove']!= 'Nada')
	{
		$result = $db->query("DELETE from sports_enrollment WHERE student_id=".$_POST['studentid12']." AND sport_id=".$_POST['sportremove'].";");
}
	if(isset($_POST['studentid13']) and isset($_POST['sportremove']) and $_POST['sportremove']!= 'Nada')
	{
		$result = $db->query("DELETE from sports_enrollment WHERE student_id=".$_POST['studentid13']." AND sport_id=".$_POST['sportremove'].";");
}
	if(isset($_POST['studentid14']) and isset($_POST['sportremove']) and $_POST['sportremove']!= 'Nada')
	{
		$result = $db->query("DELETE from sports_enrollment WHERE student_id=".$_POST['studentid14']." AND sport_id=".$_POST['sportremove'].";");
}
?>	
		
<br><br><br><hr>		
		

</form>
<a href="admin.php"><h1>Click Here to go back to ADMIN page</h1></a>

</body>

