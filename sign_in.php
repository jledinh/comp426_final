<?php
header("Content-Type: application/json; charset=UTF-8");
  $servername = "classroom.cs.unc.edu";
  $username = "jledinh";
  $password = "CH@ngemenow99Please!jledinh";
  $dbname = "jledinhdb";
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
  }
  session_start(); //starting the session for user profile page
   $hash = hash('ripemd160', $_POST['pass']);
   $sql = "SELECT * FROM UserName where userName = '" . $_POST['user']. "' AND password = '". $hash ."'";
   $row = $conn->query($sql);
   if ($row->num_rows == 1) {
      $_SESSION['userID'] = $row->fetch_assoc()["userID"];
      echo json_encode(array('status'=>200));
      $cookie_name = "user";
      $cookie_value = $_POST['user'];
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
      header("Location: welcome.html");
    }
    else {
      echo json_encode(array('status'=>401,'user'=>$_POST['user']));
   }
/* $ID = $_POST['user']; $Password = $_POST['pass']; */

 ?>
