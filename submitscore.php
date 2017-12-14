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
   $sql = "SELECT userID FROM UserName where userName = '" . $_COOKIE["user"] ."'";
   $row = $conn->query($sql);
   if ($row->num_rows == 1) {
      $userID = $row->fetch_assoc()["userID"];
   }
   $date = strtotime($_POST["date"]);
   $date = date('Y-m-d',$date);
   $sql = "INSERT INTO Scores (userID,wpm,date) VALUES (".$userID.",".$_POST["wpm"].",'".$date."')";
   $row = $conn->query($sql);
   echo json_encode(array('status'=>200));
/* $ID = $_POST['user']; $Password = $_POST['pass']; */

 ?>
