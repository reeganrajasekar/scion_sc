<?php 
session_start();
$_SESSION["lock"] = "";
header("Location: /");
die();

?>