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
$id = $_POST['id'];
$name = test_input($_POST['name']);
$pan = test_input($_POST['pan']);
$address = test_input($_POST['address']);
$mobile = test_input($_POST['mobile']);
$mail = test_input($_POST['mail']);
$mode = test_input($_POST['mode']);
$purpose = test_input($_POST['purpose']);
$amount = test_input($_POST['amount']);
$tran = test_input($_POST['tran']);

$sql = "UPDATE bill SET name='$name',pan='$pan',address='$address',mobile='$mobile',mail='$mail',mode='$mode',purpose='$purpose',amount='$amount',tran='$tran' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: /search.php?page=1&msg=Bill Edited Successfully !");
    die();
} else {
    echo "Error: " . $sql . "<br>";
}

$conn->close();
?>