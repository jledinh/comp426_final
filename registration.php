<?php
function register() {
  $servername = "classroom.cs.unc.edu";
  $username = "jledinh";
  $password = "CH@ngemenow99Please!jledinh";
  $dbname = "jledinhdb";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
  }

  session_start(); //starting the session for user profile page
  if(!empty($_POST['userName']) && !empty($_POST['pass']) && !empty($_POST['first']) && !empty($_POST['last']) && !empty($_POST['email'])) {
   $hash = hash('ripemd160', $_POST[pass]);
   $sql = "INSERT INTO UserName (userName,password,email,first,last) VALUES ('".$_POST[userName]."','".$hash."','".$_POST[email]."','".$_POST[first]."','".$POST[last]."')";
   $row = $conn->query($sql);
   $_SESSION['userName'] = $row->fetch_assoc()["userName"];
  }
}
/* $ID = $_POST['user']; $Password = $_POST['pass']; */
if(isset($_POST['submit'])) {
  register();
}
 ?>
