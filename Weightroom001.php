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
   <textarea style="font-size:29px"rows="1" id="id" name="id" placeholder="Enter ID Number"></textarea><br>
   <button type="submit" name="ID" style="width:100px; height:50px; font-size:20px">Submit</button>

<?php

if ($_POST['id'] == 123456) {
   header("Location: http://localhost/admin.php");
   exit();
   }

if(isset($_POST['id'])){

   $sql = "
   SELECT * FROM athletic_users WHERE id='".$_POST['id']."'";

   $db = new mysqli("127.0.0.1", "root", "", "test", 3307);
   $result = $db->query($sql);

   $row = $result->fetch_assoc();


   if ($_POST['id'] == $row['id']) {
       $_SESSION['cat'] = $_POST['id'];
       setcookie('userid', $_POST['id'], time() + 3600);
       header("Location: http://localhost/weightroom002.php");

   } else {
       echo "<br><br><br>";
       echo "User not found, please try again.";
   }
}
?>

</form>
</body>
</html>