 <h1>
        SEARCH FOR STUDENT:

    </h1>
    <div style="padding-left:30%"><form id="individual" action="allstudents.php" method="POST">
            Last Name:
            <input id ="lastnamebutton" name="lastnamebutton" type ="text">
            First Name:
            <input id ="firstname" name="firstname" type ="text">
            <input type = "submit" name="firstnamebutton" value="Search By Name">
            <br><br>


<?php
if(isset($_POST['firstnamebutton']) || isset($_POST["lastname"])){
    echo "<br><br>";
    $db = new mysqli("127.0.0.1", "root", "root", "test");
    $sql= "SELECT id, grade, lastname, firstname from athletic_users
    								WHERE ";

    if(!empty($_POST['lastnamebutton']) && !empty($_POST['firstname']))   {
        $part2 = "lastname = '".$_POST['lastnamebutton']."' and firstname LIKE  '%".$_POST['firstname']."%' ;";
    }
    else if (!empty($_POST['lastnamebutton']) && empty($_POST['firstname']))  {
        $part2 = "lastname = '".$_POST['lastnamebutton']."' ;";
    }
    else if (empty($_POST['lastnamebutton']) && !empty($_POST['firstname']))  {
        $part2 = "firstname LIKE '%".$_POST['firstname']."%' ;";
    }


    else {
        $part2 = "id = -1;";
    }


    $result3 = $db->query($sql.$part2);


    echo "<table border = 1>";
    echo "<tr>";
    echo "<td> ID </td>";
    echo "<td> Grade </td>";
    echo "<td> Last Name </td>";
    echo "<td>First Name </td>";
    echo "<td> Sport </td>";


    while ($row = $result3->fetch_assoc()){

        $swagnasty = $db->query("SELECT DISTINCT sport_name from sports JOIN sports_enrollment on sports.id=sports_enrollment.sport_id WHERE student_id =".$row['id'].";");

        echo "<tr>";
        echo "<td>".htmlentities($row['id'])."</td>";
        echo "<td>".htmlentities($row['grade'])."</td>";
        echo "<td>".htmlentities($row['lastname'])."</td>";
        echo "<td>".htmlentities($row['firstname'])."</td>";

        if(!empty($swagnasty)){
            echo "<td>";
            while($ethangrote = $swagnasty->fetch_assoc()) {
                echo htmlentities($ethangrote['sport_name'])."  ";
            }
            echo "</td>";
        } else {
            echo "<td></td>";
        }
        echo "</tr>";

    }
    echo "<tr><td colspan=5 style='text-align:center;'>TOTAL: ".$total."</td></tr>";
    echo "</table>";






}
 ?>
            <a href="admin.php"  style="color:blue"><h1>Click HERE for ADMIN page</h1></a>