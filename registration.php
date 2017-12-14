<?php
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
   $sql = "INSERT INTO UserName (userName,password,email,first,last) VALUES ('".$_POST[userName]."','".$hash."','".$_POST[email]."','".$_POST[first]."','".$_POST[last]."')";
   $row = $conn->query($sql);
   $_SESSION['userName'] = $row->fetch_assoc()["userName"];
   $cookie_name = "user";
   $cookie_value = $_POST['user'];
   setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
   echo "yaya";
  }
/* $ID = $_POST['user']; $Password = $_POST['pass']; */

 ?>
