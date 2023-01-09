<?php require("./static/db.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMILE CHARITY</title>
    <script src="/static/js/moment.js"></script>

</head>
<body style="background-color:#ddd;display:flex;justify-content:center;align-items:center;height:95vh">
    <main style="background-color:#fff;width:300px;padding:20px;border-radius:10px">
        <h1 style="text-align:center;color:#eb3237">SMILE CHARITY</h1>
        <?php
        $id = $_GET["bill"];
        $sql = "SELECT * FROM bill where id = '$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
            <p style="text-align: center;padding:20px;color:green">verified successfully</p>
            <p style="text-align: center;color:#666">
                Bill No : <span style="color:#222"><?php echo($row["sc"].sprintf("%04d", $row["id"])) ?></span>
            </p>
            <p style="text-align: center;color:#666">
                Date : <span style="color:#222"><script>document.write(moment("<?php echo($row["reg_date"]) ?>").format('LL'))</script></span>
            </p>
            <p style="text-align: center;color:#666">
                Name : <span style="color:#222"><?php echo($row["name"]) ?></span>
            </p>
            <p style="text-align: center;color:#666">
                Amount : <span style="color:#222"><?php echo($row["amount"]) ?></span>
            </p>
            <p style="text-align: center;color:#666">
                Transaction No : <span style="color:#222"><?php echo($row["tran"]) ?></span>
            </p>
        <?php
            }
        }else{ 
        ?>
            <p style="text-align: center;padding:20px;color:red">Bill is Fake !</p>
        <?php } ?>
    </main>
</body>
</html>