<?php
   session_start();

include("../connection.php");
include("../functions.php");

$id = $_POST['id'];
  $name = $_POST['Name'];
  $sql = "update course set name='$name' where id=$id";
  $result = $con->query($sql);
  $con->close();
  header("location: ../index.php");
?>