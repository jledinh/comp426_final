<?php
function SignIn() {
  $servername = "classroom.cs.unc.edu";
  $username = "jledinh";
  $password = "CH@ngemenow99Please!jledinh";
  $dbname = "jledinhdb";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
  }

  session_start(); //starting the session for user profile page
  if(!empty($_GET[])) {
   $sql = "SELECT * FROM UserName where userName = '" . $_SESSION['userName']. "'";
   $row = $conn->query($sql);
   $arr = array();

   if ($row->num_rows == 1) {
     $arr["first"]=$row->fetch_assoc()["first"];
     $arr["last"]=$row->fetch_assoc()["last"];
     echo $arr["first"];
   }

  }
}
/* $ID = $_POST['user']; $Password = $_POST['pass']; */
if(isset($_GET[])) {
  SignIn();
}
?>
