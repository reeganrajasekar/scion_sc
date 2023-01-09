<?php
session_start();
if ($_POST["email"]=="admin@gmail.com") {
    if ($_POST["password"]=="admin") {
        $_SESSION["lock"] = "kjshbguyFU%^RT(*BYRC^9bi687%T";
        header("Location: /home.php");
        die();
    } else {
        header("Location: /?err=username or password is incorrect!");
        die();
    }
} else {
    header("Location: /?err=username or password is incorrect!");
    die();
}


?>