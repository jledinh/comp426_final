<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET[], false);

  $servername = "classroom.cs.unc.edu";
  $username = "jledinh";
  $password = "CH@ngemenow99Please!jledinh";
  $dbname = "jledinhdb";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT * FROM Scores s, UserName u where s.userID=u.userID ORDER BY s.wpm DESC, s.date DESC LIMIT 15";
  $scores = $conn->query($sql);

  if ($scores->num_rows > 0) {
    // output data of each row
    $output= array(array());
    $count=0;
    while($row = $scores->fetch_assoc()) {
        $output[$count][0]=$row["userName"];
        $output[$count][1]=$row["wpm"];
        $output[$count][2]=$row["date"];
        echo "id: " . $output[$count][0]. " - wpm: " . $output[$count][1]. " " . $output[$count][2]. "<br>";
        $count= $count + 1;
    }
    $myJSON = json_encode($output);
    echo $myJSON;
  } else {
    echo "0 results";
  }

/* $ID = $_POST['user']; $Password = $_POST['pass']; */

 ?>
