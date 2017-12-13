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
  session_start();
  $sql = "SELECT * FROM Scores s, UserName u where s.userID=u.userID ORDER BY s.wpm DESC, s.date DESC LIMIT 15";
  $scores = $conn->query($sql);
  if ($scores->num_rows > 0) {
    // output data of each row
    $output= array(array());
    $count=0;
    while($row = $scores->fetch_assoc()) {
        $output[$count]["userName"]=$row["userName"];
        $output[$count]["wpm"]=$row["wpm"];
        $output[$count]["date"]=$row["date"];
        $count= $count + 1;
    }
    $myJSON = json_encode($output);
    echo $myJSON;
  } else {
    echo "0 results";
  }

/* $ID = $_POST['user']; $Password = $_POST['pass']; */

 ?>
