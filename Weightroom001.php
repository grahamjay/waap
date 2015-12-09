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

<body style="background-image:url(WSClogo.jpg);background-position:center top; background-size:100%;background-repeat:no-repeat; text-align:center; padding-right:5%; padding-bottom:1000px">

<form id="number" action="Weightroom001.php" method="POST">
   <div style="font-size: 45px; padding-top:18%; padding-left:3%;color:purple">ID number:</div>
        <input type="text" style="width:250px; height:40px; font-size:40px; margin-left:40px" id="id" name="id" placeholder="16000"/>
<br>   <button type="submit" name="ID" style="width:100px; height:50px; font-size:20px;margin-left:40px">Submit</button>

<?php

$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

if ($_POST['id'] == 123456) {
   header("Location: http://$host$uri/admin.php");
   exit();
   }

if(isset($_POST['id'])){

   $sql = "
   SELECT * FROM athletic_users WHERE id='".$_POST['id']."'";

  $db = new mysqli("127.0.0.1", "root", "root", "test");   
  $result = $db->query($sql);

  $row = $result->fetch_assoc();


   if ($_POST['id'] == $row['id']) {
       $_SESSION['cat'] = $_POST['id'];
       setcookie('userid', $_POST['id'], time() + 3600);
       header("Location: http://$host$uri/Weightroom002.php");

   } else {
       echo "<br><br><br>";
       echo "User not found, please try again.";
   }
}
?>

</form>
</body>
</html>