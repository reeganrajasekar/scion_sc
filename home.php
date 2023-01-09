<?php
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
                    <a class="nav-link active" style="color:#eb3237" aria-current="page" href="/home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="/search.php?page=1">Search</a>
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
    <div id="loader" style="position:fixed;width:100%;height:100%;background-color:#eb323799;z-index: 10000;top:0px;display: none;">
      <div class="spinner-border" style="color:#fff;position:fixed;top:48%;left:49%;" role="status">
        <span class="sr-only"></span>
      </div>
    </div>
  <main class="container mt-4 mb-4" style="border-radius:10px;border:2px solid #f0f0f0;background-color:#f5f5f5">
    <form  onsubmit="document.getElementById('loader').style.display='block'" action="/bill.php" class="container mt-3 mb-4" method="post">
        <h4 style="padding:10px;color:#eb3237">Trust Bill:</h4>
        <div class="container mb-4">
            <div class="row gx-2">
                <div class="col-sm-12 col-md-12 col-lg-6 ">
                    <div class="form-floating mb-2">
                        <input required type="text" class="form-control" name="name" id="floatingInput" placeholder="Name">
                        <label for="floatingInput">Name</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 ">
                    <div class="form-floating mb-2">
                        <input required type="text" class="form-control" name="pan" id="floatingInput" placeholder="PAN">
                        <label for="floatingInput">PAN</label>
                    </div>
                </div>
            </div>
            <div class="row gx-2">
                <div class="col-sm-12 col-md-12 col-lg-6 ">
                    <div class="form-floating mb-2">
                        <input required type="number" class="form-control" name="mobile" id="floatingInput" placeholder="Mobile">
                        <label for="floatingInput">Mobile No</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 ">
                    <div class="form-floating mb-2">
                        <input required type="email" class="form-control" name="mail" id="floatingInput" placeholder="Mail ID">
                        <label for="floatingInput">Mail ID</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-2">
                <textarea required class="form-control" name="address" id="floatingInput" row="3" placeholder="Mail ID"></textarea>
                <label for="floatingInput">Address</label>
            </div>
            <div class="row gx-2">
                <div class="col-sm-12 col-md-12 col-lg-6 ">
                    <div class="form-floating mb-2">
                        <select required name="mode" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="" selected disabled>Select Mode of Donation</option>
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
                        <input required type="text" class="form-control" name="purpose" id="floatingInput" placeholder="Purpose of Donation">
                        <label for="floatingInput">Purpose of Donation</label>
                    </div>
                </div>
            </div>
            <div class="row gx-2">
                <div class="col-sm-12 col-md-12 col-lg-6 ">
                    <div class="form-floating mb-2">
                        <input required type="text" class="form-control" name="tran" id="floatingInput" placeholder="Transaction No">
                        <label for="floatingInput">Transaction No</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 ">
                    <div class="form-floating mb-2">
                        <input required type="number" class="form-control" name="amount" id="floatingInput" placeholder="Mobile">
                        <label for="floatingInput">Amount</label>
                    </div>
                </div>
                
            </div>
            <div style="display:flex;justify-content:flex-end">
                <button class="btn btn-primary mt-3" style="background-color:#eb3237;color:white;border:none;font-size:18px">Create Bill</button>
            </div>
        </div>
    </form>
  </main>  

    

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>