<?php
session_start();
include_once "../db/connection.php";
$musicFileLocation = $_POST["musik"];
$thumnailLocation = $_POST["thumbnail"];
$name = $_POST["name"];
$genre = $_POST["genre"];
$id = $_SESSION["id"];
$query = "insert into user_music(userid,name,fileLocation,picLocation,genre) values('$id','$name','$musicFileLocation','$thumnailLocation','$genre')";
if ($conn->query($query) === TRUE) {
    $_SESSION["logged_in"] = true;
    $_SESSION["IS_FILE_UPLOADED"] = true;
    header("location: ../add-music.php");
  } else {
    echo "Error: " . $query . "<br>" . $conn->error;
    $_SESSION["IS_FILE_UPLOADED"] = false;
  }
  