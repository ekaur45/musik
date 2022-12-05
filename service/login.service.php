<?php
session_start();
include_once "../db/connection.php";

$email = $_POST["email"];
$password = $_POST["password"];
$hashedPassword = md5($password);
$hashed = md5($password);
$query = "SELECT * FROM musik.users where email = '$email' and password = '$hashed';";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    $_SESSION["logged_in"] = true;
    $_SESSION["id"] = $row["id"];
    $_SESSION["firstName"] = $row["fIrstName"];
    $_SESSION["lastName"] = $row["lastName"];
    header("location: ../index.php");

} else {
    $_SESSION["logged_in"] = false;
    header("location: ../login.php");
}
