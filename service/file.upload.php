<?php
function SaveUploadFile($POST,$name)
{
    $target_dir = "uploads/";
    $now = DateTime::createFromFormat('U.u', microtime(true));
    $target_file = $target_dir . $now->format("mdYHisu") . basename($POST[$name]["name"]);
    $tmpName = $POST[$name]["tmp_name"];
    if (move_uploaded_file($tmpName, '../'.$target_file)) {
        return $target_file;
    } else {
        return null;
    }
}
