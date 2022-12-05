<?php
session_start();
include_once "../db/connection.php";
$id = $_POST["_id"];
$query = "delete from user_music where id = '$id'";

if ($conn->query($query) === TRUE) {
    //$_SESSION["logged_in"] = true;
    
    header("location: ../add-music.php");
  } else {
    echo "Error: " . $query . "<br>" . $conn->error;
  }
  