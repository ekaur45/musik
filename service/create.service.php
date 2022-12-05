<?php
session_start();
include_once "../db/connection.php";
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$password = $_POST["password"];
$hashedPassword = md5($password);
$query = "insert into users(firstName,lastName,email,password)values('$firstName','$lastName','$email','$hashedPassword');";

if ($conn->multi_query($query) === TRUE) {
    $_SESSION["logged_in"] = true;
    header("location: ../index.php");
  } else {
    echo "Error: " . $query . "<br>" . $conn->error;
  }
  