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

<body style="background-image:url(weightroom.jpg); background-size:100%;background-repeat:no-repeat; text-align:center; padding-right:5%">

<form id="number" action="Weightroom001.php" method="POST">
   <div style="font-size: 60px; padding-top:40%">ID number:</div>
        <input type="text" style="width:300px; height:50px; font-size:40px;" id="id" name="id" placeholder="16000"/>
<br>   <button type="submit" name="ID" style="width:100px; height:50px; font-size:20px">Submit</button>

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
       header("Location: http://$host$uri/weightroom002.php");

   } else {
       echo "<br><br><br>";
       echo "User not found, please try again.";
   }
}
?>

</form>
</body>
</html>