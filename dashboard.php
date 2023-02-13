<?php
  require "conn.php"; 
  $name  = $_GET['identity'];
  $password1 = 'email';
  $method1 = 'aes-256-cbc';
  $key1 = substr(hash('sha256', $password1, true), 0, 32);
  $iv1 = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
  // $encrypted1 = base64_encode(openssl_encrypt($name, $method1, $key1, OPENSSL_RAW_DATA, $iv1));
  $decrypted1 = openssl_decrypt(base64_decode($name), $method1, $key1, OPENSSL_RAW_DATA, $iv1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/mm.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./js/bootstrap.bundle.min.js"></script>
    <style>
      .zoom {
  /* padding: 50px; */
  transition: transform .2s; /* Animation */
  /* width: 200px;
  height: 200px; */
  /* margin: 0 auto; */
}

.zoom:hover {
  transform: scale(1.1);
  background-color: #152238 ;
  color: white;
 /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}

        @font-face {
            font-family: 'myFirstFont';
        }
        body {
            background-color: #fbfbfb;
            font-family: 'myFirstFont';
        }
        @media (min-width: 991.98px) {
            main {
                padding-left: 240px;
            }
        }

/* Sidebar */
.sidebar {
position: fixed;
top: 0;
bottom: 0;
left: 0;
padding: 58px 0 0; /* Height of navbar */
box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
width: 240px;
z-index: 600;
}

@media (max-width: 991.98px) {
.sidebar {
width: 100%;
}
}
.sidebar .active {
border-radius: 5px;
box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
}

.sidebar-sticky {
position: relative;
top: 0;
height: calc(100vh - 48px);
padding-top: 0.5rem;
overflow-x: hidden;
overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}
    </style>

</head>
<body>
    <!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <center><img src="./img/logo.svg" width="65%"></img></center>
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a href="#" class="list-group-item list-group-item-action zoom">
          <i class="fas fa-tachometer-alt fa-fw me-3 mt-3"></i><span>Dashboard</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action zoom"><i
            class=" fas fa-search-plus fa-fw me-3 mt-3"></i><span>Analytics</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action zoom">
          <i class="fas fa-chart-line fa-fw me-3 mt-3"></i><span>Graph</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action zoom"><i
            class="fas fa-cog fa-spin fa-fw me-3 mt-3"></i><span>Settings</span>
        </a>
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="">
  <div class="container pt-2">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
          <a class="navbar-brand" href="#">Dashboard</a>
              <div class="d-flex ms-auto">
                  <?php 
                   $sql = "SELECT * FROM login WHERE id={$decrypted1}";
                    echo $decrypted1;
                  ?>
              </div>
      </div>
    </nav><br>
    <div class="row g-6 mb-6">
    <div class="col-xl-3 col-sm-6 col-12 mt-1">
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Channel 4</span>
                        <span class="h3 font-bold mb-0"><i class="fa-sharp fa-solid fa-microchip"></i> <a href="channel.php?id=4" class="text-dark ms-2" style="font-size:14px;">click here to view</a></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-tertiary text-dark text-lg rounded-circle">
                              <i class="fa-solid fa-temperature-half"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-2 mb-0 text-sm">
                    <span class="badge badge-pill bg-soft-success text-success me-2">
                        <i class="bi bi-arrow-up me-1"></i>30%
                    </span>
                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                </div>
             </div>
            </div>
  </div>
  <div class="col-xl-3 col-sm-6 col-12 mt-1">
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Channel 4</span>
                        <span class="h3 font-bold mb-0"><i class="fa-sharp fa-solid fa-microchip"></i> <a href="channel.php?id=4" class="text-dark ms-2" style="font-size:14px;">click here to view</a></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-tertiary text-dark text-lg rounded-circle">
                              <i class="fa-solid fa-temperature-half"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-2 mb-0 text-sm">
                    <span class="badge badge-pill bg-soft-success text-success me-2">
                        <i class="bi bi-arrow-up me-1"></i>30%
                    </span>
                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                </div>
             </div>
            </div>
  </div>
  <div class="col-xl-3 col-sm-6 col-12 mt-1">
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Channel 4</span>
                        <span class="h3 font-bold mb-0"><i class="fa-sharp fa-solid fa-microchip"></i> <a href="channel.php?id=4" class="text-dark ms-2" style="font-size:14px;">click here to view</a></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-tertiary text-dark text-lg rounded-circle">
                              <i class="fa-solid fa-temperature-half"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-2 mb-0 text-sm">
                    <span class="badge badge-pill bg-soft-success text-success me-2">
                        <i class="bi bi-arrow-up me-1"></i>30%
                    </span>
                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                </div>
             </div>
            </div>
  </div>
  <div class="col-xl-3 col-sm-6 col-12 mt-1">
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Channel 4</span>
                        <span class="h3 font-bold mb-0"><i class="fa-sharp fa-solid fa-microchip"></i> <a href="channel.php?id=4" class="text-dark ms-2" style="font-size:14px;">click here to view</a></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-tertiary text-dark text-lg rounded-circle">
                              <i class="fa-solid fa-temperature-half"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-2 mb-0 text-sm">
                    <span class="badge badge-pill bg-soft-success text-success me-2">
                        <i class="bi bi-arrow-up me-1"></i>30%
                    </span>
                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                </div>
             </div>
            </div>
  </div>
  <div class="col-xl-3 col-sm-6 col-12 mt-1"><br>
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Channel 4</span>
                        <span class="h3 font-bold mb-0"><i class="fa-sharp fa-solid fa-microchip"></i> <a href="channel.php?id=4" class="text-dark ms-2" style="font-size:14px;">click here to view</a></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-tertiary text-dark text-lg rounded-circle">
                              <i class="fa-solid fa-temperature-half"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-2 mb-0 text-sm">
                    <span class="badge badge-pill bg-soft-success text-success me-2">
                        <i class="bi bi-arrow-up me-1"></i>30%
                    </span>
                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                </div>
             </div>
            </div>
  </div>
  <div class="col-xl-3 col-sm-6 col-12 mt-1"><br>
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Channel 4</span>
                        <span class="h3 font-bold mb-0"><i class="fa-sharp fa-solid fa-microchip"></i> <a href="channel.php?id=4" class="text-dark ms-2" style="font-size:14px;">click here to view</a></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-tertiary text-dark text-lg rounded-circle">
                              <i class="fa-solid fa-temperature-half"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-2 mb-0 text-sm">
                    <span class="badge badge-pill bg-soft-success text-success me-2">
                        <i class="bi bi-arrow-up me-1"></i>30%
                    </span>
                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                </div>
             </div>
            </div>
  </div>
  <div class="col-xl-3 col-sm-6 col-12 mt-1"><br>
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Channel 4</span>
                        <span class="h3 font-bold mb-0"><i class="fa-sharp fa-solid fa-microchip"></i> <a href="channel.php?id=4" class="text-dark ms-2" style="font-size:14px;">click here to view</a></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-tertiary text-dark text-lg rounded-circle">
                              <i class="fa-solid fa-temperature-half"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-2 mb-0 text-sm">
                    <span class="badge badge-pill bg-soft-success text-success me-2">
                        <i class="bi bi-arrow-up me-1"></i>30%
                    </span>
                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                </div>
             </div>
            </div>
  </div>
  <div class="col-xl-3 col-sm-6 col-12 mt-1"><br>
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Channel 4</span>
                        <span class="h3 font-bold mb-0"><i class="fa-sharp fa-solid fa-microchip"></i> <a href="channel.php?id=4" class="text-dark ms-2" style="font-size:14px;">click here to view</a></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-tertiary text-dark text-lg rounded-circle">
                              <i class="fa-solid fa-temperature-half"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-2 mb-0 text-sm">
                    <span class="badge badge-pill bg-soft-success text-success me-2">
                        <i class="bi bi-arrow-up me-1"></i>30%
                    </span>
                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                </div>
             </div>
            </div>
  </div>
  <div class="col-xl-3 col-sm-6 col-12 mt-1"><br>
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Channel 4</span>
                        <span class="h3 font-bold mb-0"><i class="fa-sharp fa-solid fa-microchip"></i> <a href="channel.php?id=4" class="text-dark ms-2" style="font-size:14px;">click here to view</a></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-tertiary text-dark text-lg rounded-circle">
                              <i class="fa-solid fa-temperature-half"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-2 mb-0 text-sm">
                    <span class="badge badge-pill bg-soft-success text-success me-2">
                        <i class="bi bi-arrow-up me-1"></i>30%
                    </span>
                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                </div>
             </div>
            </div>
  </div>
  <div class="col-xl-3 col-sm-6 col-12 mt-1"><br>
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Channel 4</span>
                        <span class="h3 font-bold mb-0"><i class="fa-sharp fa-solid fa-microchip"></i> <a href="channel.php?id=4" class="text-dark ms-2" style="font-size:14px;">click here to view</a></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-tertiary text-dark text-lg rounded-circle">
                              <i class="fa-solid fa-temperature-half"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-2 mb-0 text-sm">
                    <span class="badge badge-pill bg-soft-success text-success me-2">
                        <i class="bi bi-arrow-up me-1"></i>30%
                    </span>
                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                </div>
             </div>
            </div>
  </div>
  </div>
</main>
<!--Main layout-->
</body>
</html>