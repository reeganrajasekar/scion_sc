<?php 
require("./static/db.php");
session_start();
if($_SESSION["lock"]!="kjshbguyFU%^RT(*BYRC^9bi687%T"){
  header("Location: /");
  die();
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$name = test_input($_POST['name']);
$pan = test_input($_POST['pan']);
$address = test_input($_POST['address']);
$mobile = test_input($_POST['mobile']);
$mail = test_input($_POST['mail']);
$mode = test_input($_POST['mode']);
$purpose = test_input($_POST['purpose']);
$amount = test_input($_POST['amount']);
$tran = test_input($_POST['tran']);
$sc = 'SC'.date('Y');

$sql = "INSERT INTO bill (sc,name ,pan , address ,mobile , mail,mode,purpose , amount,tran )
VALUES ('$sc','$name','$pan','$address','$mobile','$mail','$mode','$purpose','$amount','$tran')";

if ($conn->query($sql) === TRUE) {
    header("Location: /search.php?page=1&msg=Bill Created Successfully !");
    die();
} else {
    echo "Error: " . $sql . "<br>";
}

$conn->close();
?>