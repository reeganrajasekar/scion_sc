<?php 
require("./db.php");
session_start();
if($_SESSION["lock"]!="kjshbguyFU%^RT(*BYRC^9bi687%T"){
  header("Location: /admin");
  die();
}
$sql = "CREATE TABLE bill (
    id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sc VARCHAR(125),
    name VARCHAR(125),
    pan VARCHAR(125),
    address VARCHAR(500),
    mobile VARCHAR(100),
    mail VARCHAR(125),
    mode VARCHAR(100),
    purpose VARCHAR(100),
    tran VARCHAR(100),
    amount INT(100),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table bil created successfully<br>";
}

$conn->close();


?>