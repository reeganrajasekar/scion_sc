<?php 
require("./static/db.php");
session_start();
if($_SESSION["lock"]!="kjshbguyFU%^RT(*BYRC^9bi687%T"){
  header("Location: /");
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Print</title>
    <script src="/static/js/qrcode.min.js"></script>
    <script src="/static/js/moment.js"></script>
    <style type="text/css" media="print">
        @media print {
            @page {
                size: A5 landscape;
                max-height:100%;
                max-width:100%;
                margin: 0;
            }
        }
        body{
            margin:0px
        }

    </style>
</head>
<body style="padding:0px 10px">
<script>
    var a = ['','One ','Two ','Three ','Four ', 'Five ','Six ','Seven ','Eight ','Nine ','Ten ','Eleven ','Twelve ','Thirteen ','Fourteen ','Fifteen ','Sixteen ','Seventeen ','Eighteen ','Nineteen '];
var b = ['', '', 'Twenty','Thirty','Forty','Fifty', 'Sixty','Seventy','Eighty','Ninety'];

function inWords (num) {
    if ((num = num.toString()).length > 9) return 'overflow';
    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    if (!n) return; var str = '';
    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'Crore ' : '';
    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'Lakh ' : '';
    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Thousand ' : '';
    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Hundred ' : '';
    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'Only ' : '';
    return str
}
</script>
    <p style="text-align:center">
        <span style="font-size:30px;font-weight:700">SMILE CHARITY</span><br>
        NO.17/595, MANNAR SAREFOJI NAGAR 2ND CROSS, OPP.NEW BUS STAND, THANJAVUR-5<br>
        <span style="font-weight:700;font-size:16px">PAN NUMBER - ABBTS7297R</span><br>
        <span style="font-weight:700;font-size:16px">E-Receipt</span>
    </p>
    <main style="padding:0px 30px">
    <?php
    $id = $_GET["bill"];
    $sql = "SELECT * FROM bill where id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
    ?>
        <p style="display:flex;flex-direction:row;justify-content:space-between">
            <span>
                <span style="font-weight:700;font-size:15px">Receipt Number :</span>
                <span style="font-weight:500;font-size:15px"><?php echo($row["sc"].sprintf("%04d", $row["id"])) ?></span>
            </span>
            <span>
                <span style="font-weight:700;font-size:15px">Date :</span>
                <span style="font-weight:500;font-size:15px"><script>document.write(moment("<?php echo($row["reg_date"]) ?>").format('LL'))</script></span>
            </span>
        </p>
        <p style="display:flex;flex-direction:row;justify-content:space-between;width:100%">
            <span>
                <span style="font-weight:700;font-size:15px">Received with thanks from :</span>
                <span style="font-weight:500;font-size:15px;text-decoration:underline"><?php echo($row["name"]) ?></span>
            </span>
            <span>
                <span style="font-weight:700;font-size:15px">PAN :</span>
                <span style="font-weight:500;font-size:15px;text-decoration:underline"><?php echo($row["pan"]) ?></span>
            </span>
        </p>
        <p style="font-weight:700;font-size:15px">Address: <span style="font-weight:500;text-decoration:underline"><?php echo($row["address"]) ?></span></p>
        <p style="display:flex;flex-direction:row;justify-content:space-between;width:100%">
            <span>
                <span style="font-weight:700;font-size:15px">Mobile :</span>
                <span style="font-weight:500;font-size:15px;text-decoration:underline">+91 <?php echo($row["mobile"]) ?></span>
            </span>
            <span>
                <span style="font-weight:700;font-size:15px">Mail-ID :</span>
                <span style="font-weight:500;font-size:15px;text-decoration:underline"><?php echo($row["mail"]) ?></span>
            </span>
        </p>
        <p style="display:flex;flex-direction:row;justify-content:space-between;width:100%">
            <span>
                <span style="font-weight:700;font-size:15px">Mode of Donation :</span>
                <span style="font-weight:500;font-size:15px;text-decoration:underline"><?php echo($row["mode"]) ?></span>
            </span>
            <span>
                <span style="font-weight:700;font-size:15px">Purpose of Donation :</span>
                <span style="font-weight:500;font-size:15px;text-decoration:underline"><?php echo($row["purpose"]) ?></span>
            </span>
        </p>
        <p style="display:flex;flex-direction:row;justify-content:space-between;width:100%">
            <span>
                <span style="font-weight:700;font-size:15px">Amount of Donation :</span>
                <span style="font-weight:500;font-size:15px;text-decoration:underline">₹ <?php echo($row["amount"]) ?></span>
            </span>
            <span>
                <span style="font-weight:700;font-size:15px">Transaction Reference No : <span style="font-weight:500;text-decoration:underline"><?php echo($row["tran"]) ?></span></span>
            </span>
        </p>
        <p style="font-weight:700;font-size:15px">Amount of Donation (in words) : <span style="font-weight:500;text-decoration:underline"><script>document.write(inWords(<?php echo($row["amount"]) ?>)+"Only")</script></span><span</p>
        <p style="display:flex;flex-direction:row;justify-content:space-between;width:100%">
            <span>
                Scan QR to Verify Receipt
            </span>
            <span>
                For SMILE CHARITY
            </span>
        </p>
        <p style="display:flex;flex-direction:row;justify-content:space-between;width:100%;align-items: baseline;">
            <span id="qr" style="width:100px;height: 100px;"></span>
            <span style="font-weight:500;font-size:17px">Authorised Signatory</span>
        </p>
    </main>
    <p style="text-align: center;font-size:12px">
        The Trust is Recognized Under Section 80G of the Income Tax Act, 1961 by the Commissioner of the Income Tax
        <br>
        Thanjavur, Vide Approval Number - ABBTS7297RF20221 dated 13-12-2022
    </p>
    <script type="text/javascript">
        var qrcode = new QRCode("qr", {
            text: "https://sc.scionrd.com/verify.php?bill=<?php echo($row["id"]) ?>",
            width: 100,
            height: 100,
            colorDark : "#000000",
            colorLight : "#ffffff",
            display:"inline"
        });
        print()
    </script>
    <?php }} ?>
</body>
</html>