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
  $sql = "SELECT p.text FROM Paragraphs p";
  $paras = $conn->query($sql);
  if ($paras->num_rows > 0) {
    // output data of each row
    $num=rand(0,$paras->num_rows-1);
    $output= array();
    $output["num"]=$paras->num_rows;
    $count=0;
    while($row = $paras->fetch_assoc()) {
      if ($count==$num) {
        $output["text"]=$row["text"];
      }
        $count= $count + 1;
    }
    $myJSON = json_encode($output);
    echo $myJSON;
  } else {
    echo "0 results";
  }

/* $ID = $_POST['user']; $Password = $_POST['pass']; */

 ?>
