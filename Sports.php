<head>
<h1 style="text-align:center">Sports Admin Page</h1>
</head>

<body>
<hr>

<h1> Input Students Into Sports </h1>
<form id="sport" action="Sports.php" method="POST">	

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
<select>

  <option value="Nada">SELECT INDV SPORT</option>
  <option value="FBL">Football</option>
  <option value="VBL">Volleyball</option>
  <option value="BXC">Boys Cross Country</option>
  <option value="GXC">Girls Cross Country</option>
  <option value="CHR">Cheer</option>
  <option value="DNC">Dance</option>
  <option value="BGL">Boys Golf</option>
  <option value="GBB">Girls Basketball</option>
  <option value="BBB">Boys Basketball</option>
  <option value="GBL">Girls Bowling</option>
  <option value="BBL">Boys Bowling</option>
  <option value="WRS">Wrestling</option>
  <option value="GGL">Girls Golf</option>
  <option value="BTF">Boys Track & Field</option>
  <option value="GTF">Girls Track & Field</option>
  <option value="BTS">Boys Tennis</option>
  <option value="GTS">Girls Tennis</option>
  <option value="BSC">Boys Soccer</option>
  <option value="GSC">Girls Soccer</option>
  <option value="SFB">Softball</option>
  <option value="BSB">Baseball</option>
</select>
<br><br>
<input type = "submit" name="submit" value="Insert Selected Sport">

<br><br><br>

<?php
    if(isset($_POST['submit'])){
    echo "<br><br>";
        $db = new mysqli("127.0.0.1", "root", "", "test", 3307);
		$result2 = $db->query("INSERT INTO statement");

I NEED TO WRITE A BUNCH OF IF STATEMENTS IN HERE THAT WILL TAKE THE INPUT FROM ABOVE AND INSERT THEM INTO THE SQL TABLE
THAT WILL REQUIRE A NEW IF FOR EACH INPUT, WITH THE ELSE BEING TO RERUN THE PAGE WITH A SUMMARY OF WHO THEY ENTERED FOR EACH SPORT						

}}



?>
</form>


</body>