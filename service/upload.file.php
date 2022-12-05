<?php
include_once "file.upload.php";
$musicFileLocation =  SaveUploadFile($_FILES,"file");
echo $musicFileLocation;
