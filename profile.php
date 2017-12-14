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
   $sql = "SELECT * FROM UserName where userName = '" . $_COOKIE['user']. "'";
   $row = $conn->query($sql);
   $arr = array();

   if ($row->num_rows == 1) {
     $arr["first"]=$row->fetch_assoc()["first"];
     $arr["last"]=$row->fetch_assoc()["last"];
   }

   $sql = "SELECT count(*) as c FROM UserName u, Scores s where u.userName = '" . $_COOKIE['user']. "' and s.userID=u.userID";
   $row = $conn->query($sql);

   if ($row->num_rows == 1) {
     $arr["count"]=$row->fetch_assoc()["c"];
   }

   $sql = "SELECT avg(s.wpm) as c FROM UserName u, Scores s where u.userName = '" . $_COOKIE['user']. "' and s.userID=u.userID";
   $row = $conn->query($sql);

   if ($row->num_rows == 1) {
     $arr["avg"]=$row->fetch_assoc()["c"];
   }

   $sql = "SELECT max(s.wpm) as c FROM UserName u, Scores s where u.userName = '" . $_COOKIE['user']. "' and s.userID=u.userID";
   $row = $conn->query($sql);

   if ($row->num_rows == 1) {
     $arr["max"]=$row->fetch_assoc()["c"];
   }

   $sql = "SELECT s.wpm as wpm,s.date as d FROM UserName u, Scores s where u.userName = '" . $_COOKIE['user']. "' and s.userID=u.userID ORDER BY s.date DESC LIMIT 5";
   $row = $conn->query($sql);
   $output= array(array());
   $count=0;
   while($score = $row->fetch_assoc()) {
       $output[$count]["wpm"]=$score["wpm"];
       $output[$count]["date"]=$score["d"];
       $count= $count + 1;
   }
   $arr["games"]=$output;
   echo json_encode($arr);


/* $ID = $_POST['user']; $Password = $_POST['pass']; */
?>
