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
    <title>Trust Bill</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg " style="z-index:1000;background:white;box-shadow:1px 1px 2px #aaa;">
    <div class="container">
        <a class="navbar-brand" href="">
            <img src="/static/logo.svg" alt="College Logo" class="col-logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="font-size:18px;padding:10px;font-weight:700">
                <li class="nav-item">
                    <a class="nav-link"  aria-current="page" href="/home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color:#eb3237" aria-current="page" href="/search.php?page=1">Search</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
  </nav>   
  
<main class="container mt-4">
    <div  style="display:flex;flex-direction:row;justify-content:space-between">
        <h2 style="color:#eb3237;font-weight:600">Bills &ensp;&ensp;</h2>
        <div >
            <form action="/search.php" method="post">
                <input type="text" name="bill" style="border:1px solid #ddd;border-radius:5px;padding:5px" required placeholder="Bill No">
                <button class="btn btn-primary" style="background-color:#eb3237;border:none">Search</button>
            </form>
        </div>
    </div>
    <br>  
    <div class="table-responsive ">        
    <table class="table table-striped table-bordered">
        <thead style="text-align:center ">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            

            $results_per_page = 10;  
            if(isset($_POST["bill"])){
                $bill = $_POST["bill"];
                $query = "select *from bill WHERE id='$bill'";  
            }else{
                $query = "select *from bill";  
            }
            $result = mysqli_query($conn, $query);  
            $number_of_result = mysqli_num_rows($result);  
            $number_of_page = ceil ($number_of_result / $results_per_page);  

            if (!isset ($_GET['page']) ) {  
                $page = 1;  
            } else {  
                $page = $_GET['page'];  
            } 

            $page_first_result = ($page-1) * $results_per_page; 
            if(isset($_POST["bill"])){
                $bill = $_POST["bill"];
                $sql = "SELECT * FROM bill WHERE id='$bill' order by id DESC LIMIT " . $page_first_result . ',' . $results_per_page;
            }else{
                $sql = "SELECT * FROM bill order by id DESC LIMIT " . $page_first_result . ',' . $results_per_page;
            }

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
            
            <tr>
                <td style="text-align:center"><?php echo($row["sc"].sprintf("%04d", $row["id"])) ?></td>
                <td ><?php echo($row["name"]) ?></td>
                <td ><?php echo($row["mobile"]) ?></td>
                <td ><?php echo($row["mail"]) ?></td>
                <td ><?php echo($row["amount"]) ?></td>
                <td style="text-align:center;display:flex;flex-direction:row;justify-content:space-around">
                    <a class="btn" href="/print.php?bill=<?php echo($row["id"]) ?>" target="blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16"> <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/> <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/> </svg>
                    </a>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal<?php echo($row["id"]) ?>">
                        <svg width="20" height="20" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"/><path d="M42 26V40C42 41.1046 41.1046 42 40 42H8C6.89543 42 6 41.1046 6 40V8C6 6.89543 6.89543 6 8 6L22 6" stroke="#333" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M14 26.7199V34H21.3172L42 13.3081L34.6951 6L14 26.7199Z" fill="none" stroke="#333" stroke-width="1" stroke-linejoin="round"/></svg>
                    </button>
                </td>

                <div class="modal modal-xl fade" id="myModal<?php echo($row["id"]) ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit <?php echo($row["sc"].sprintf("%04d", $row["id"])) ?></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                        <form  onsubmit="document.getElementById('loader').style.display='block'" action="/edit.php" class="container mb-4" method="post">
                            <input type="hidden" name="id" value="<?php echo($row["id"]) ?>">
                            <div class="container mb-4">
                                <div class="row gx-2">
                                    <div class="col-sm-12 col-md-12 col-lg-6 ">
                                        <div class="form-floating mb-2">
                                            <input required type="text" value="<?php echo($row["name"]) ?>" class="form-control" name="name" id="floatingInput" placeholder="Name">
                                            <label for="floatingInput">Name</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 ">
                                        <div class="form-floating mb-2">
                                            <input required type="text" value="<?php echo($row["pan"]) ?>" class="form-control" name="pan" id="floatingInput" placeholder="PAN">
                                            <label for="floatingInput">PAN</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-2">
                                    <div class="col-sm-12 col-md-12 col-lg-6 ">
                                        <div class="form-floating mb-2">
                                            <input required type="number" value="<?php echo($row["mobile"]) ?>" class="form-control" name="mobile" id="floatingInput" placeholder="Mobile">
                                            <label for="floatingInput">Mobile No</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 ">
                                        <div class="form-floating mb-2">
                                            <input required type="mail" value="<?php echo($row["mail"])?>" class="form-control" name="mail" id="floatingInput" placeholder="Mail ID">
                                            <label for="floatingInput">Mail ID</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-2">
                                    <textarea required class="form-control" name="address" id="floatingInput" row="3" placeholder="Mail ID"><?php echo($row["address"]) ?></textarea>
                                    <label for="floatingInput">Address</label>
                                </div>
                                <div class="row gx-2">
                                    <div class="col-sm-12 col-md-12 col-lg-6 ">
                                        <div class="form-floating mb-2">
                                            <select required name="mode" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                                <option value="<?php echo($row["mode"]) ?>" selected ><?php echo($row["mode"]) ?></option>
                                                <option value="CASH">CASH</option>
                                                <option value="IMPS">IMPS</option>
                                                <option value="NEFT">NEFT</option>
                                                <option value="RTGS">RTGS</option>
                                                <option value="DD">DD</option>
                                                <option value="CHEQUE">CHEQUE</option>
                                            </select>
                                            <label for="floatingInput">Mode of Donation</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 ">
                                        <div class="form-floating mb-2">
                                            <input required type="purpose" value="<?php echo($row["purpose"])?>" class="form-control" name="purpose" id="floatingInput" placeholder="Mail ID">
                                            <label for="floatingInput">Purpose of Donation</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-2">
                                    <div class="col-sm-12 col-md-12 col-lg-6 ">
                                        <div class="form-floating mb-2">
                                            <input required type="text" value="<?php echo($row["tran"])?>" class="form-control" name="tran" id="floatingInput" placeholder="Transaction No">
                                            <label for="floatingInput">Transaction No</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 ">
                                        <div class="form-floating mb-2">
                                            <input required type="number" value="<?php echo($row["amount"])?>" class="form-control" name="amount" id="floatingInput" placeholder="Mobile">
                                            <label for="floatingInput">Amount</label>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div style="display:flex;justify-content:flex-end">
                                    <button class="btn btn-primary mt-3" style="background-color:#eb3237;color:white;border:none;font-size:18px">Update Bill</button>
                                </div>
                            </div>
                        </form>
                        </div>

                        </div>
                    </div>
                </div>

            </tr>

            <?php
                }
            } else {
            ?>

            <tr>
                <td colspan=6 style="text-align:center">No bills found !</td>
            </tr>

            <?php
            }
            ?>
            
        </tbody>
    </table>
    </div>
    <p style="text-align:center;line-height:3.5;font-size:16px">
        <?php 
        for($page = 1; $page<= $number_of_page; $page++) { 
            if($page==$_GET['page']){
                echo '<a style="margin:5px;padding:10px;border-radius:5px;border:2px solid #eb3237;background-color:#eb3237;font-weight:600;color:#fff;text-decoration:none" href = "?page=' . $page . '">' . $page . ' </a>';  
            }else{
                echo '<a style="margin:5px;padding:8px;border-radius:5px;border:1px solid #aaa;color:#444;text-decoration:none" href = "?page=' . $page . '">' . $page . ' </a>';  
            }
        }  
        ?>
    </p>
    <br>
</main>
  






  <script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    if(urlParams.get('err')){
      document.write("<div id='err' style='position:fixed;bottom:30px; right:30px;background-color:#FF0000;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('err')+"</div>")
    }
    setTimeout(()=>{
        document.getElementById("err").style.display="none"
    }, 3000)
</script>

<script>
    if(urlParams.get('msg')){
      document.write("<div id='msg' style='position:fixed;bottom:30px; right:30px;background-color:#4CAF50;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('msg')+"</div>")
    }
    setTimeout(()=>{
        document.getElementById("msg").style.display="none"
    }, 3000)
</script>
    

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>