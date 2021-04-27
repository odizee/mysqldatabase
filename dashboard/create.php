<?php
   session_start();

   include("../connection.php");
   include("../functions.php");


  $name = $_POST["name"];
  $user_id = $_SESSION['user_id'];

  $sql = "insert into course (name, user_id) values ('$name', '$user_id')";
  $con->query($sql);
  $con->close();
  header("location: ../index.php");
?>