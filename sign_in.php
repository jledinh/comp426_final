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
  if(!empty($_POST['user'])) {
   $hash = hash('ripemd160', $_POST[pass]);
   $sql = "SELECT * FROM UserName where userName = '" . $_POST[user]. "' AND password = '". $hash ."'";
   $row = $conn->query($sql);
   if ($row->num_rows == 1) {
      $_SESSION['userID'] = $row->fetch_assoc()["userID"];
      echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
    }
    else {
      echo "SORRY... YOU ENTERED WRONG ID AND PASSWORD... PLEASE RETRY...";
    }
  }
}
/* $ID = $_POST['user']; $Password = $_POST['pass']; */
if(isset($_POST['submit'])) {
  SignIn();
}
 ?>
