<?php
include_once "conn.php"; 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/mm.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <style>
    input{
      border-top-style: hidden;
      border-right-style: hidden;
      border-left-style: hidden;
      border-bottom-style: groove;
    }
    .no-outline:focus {
     outline: none;
    }
    h4{
            /* Increase this as per requirement */
            padding-bottom: 10px;
            border-bottom-style: solid;
            border-bottom-width: 3.1px;
            width: fit-content;
    }
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
     background-color: white;
    }
    li {
      float: left;
      /* text-align: center; */
    }
    li a {
      display: block;
      color: black;
      text-align: center;
      padding: 16px;
      text-decoration: none;
    }
    </style>
</head>
<body><br><br>
<center><img src="./img/Xyma_BG.svg" width="200px"></img></center><br><br>
<center><h4>Login</h4></center><br>
<div style="display: flex; justify-content: center; align-items: center; height: 30vh;">
  <form action="" method="post">
    <input type="email" name="email" class="no-outline" id="exampleFormControlInput1" placeholder="Email" size="30"><br><br>
    <input type="password" name="pass" class="no-outline" id="exampleFormControlInput1" placeholder="Password" size="30"><br><br><br>
    <center><button type="submit" name="login" class="btn btn-dark">Login</button></center>
  </form>
</div><br><br>
<center>
<p><b>© 2021 XYMA Analytics Inc. IIT Madras Research Park, Chennai, 600113</b></p>
</center> 
</body>
</html>
<?php
if(isset($_POST['login'])){
  $email = $_POST['email']; 
  $password1 = 'email';
  $method1 = 'aes-256-cbc';
  $key1 = substr(hash('sha256', $password1, true), 0, 32);
  $iv1 = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
  $encrypted1 = base64_encode(openssl_encrypt($email, $method1, $key1, OPENSSL_RAW_DATA, $iv1));
  $decrypted1 = openssl_decrypt(base64_decode($encrypted1), $method1, $key1, OPENSSL_RAW_DATA, $iv1);
  

  $plaintext = $_POST['pass']; 
  $password = 'vedanta256';
  $method = 'aes-256-cbc';
  $key = substr(hash('sha256', $password, true), 0, 32);
  $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
  $encrypted = base64_encode(openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv));
  $decrypted = openssl_decrypt(base64_decode($encrypted), $method, $key, OPENSSL_RAW_DATA, $iv);
  


  $sanitized_userid = mysqli_real_escape_string($conn, $email);
  $sanitized_password = mysqli_real_escape_string($conn, $encrypted);
  $MAC = exec('getmac');
  
  // Storing 'getmac' value in $MAC
  $MAC = strtok($MAC, ' ');

  $sql = "SELECT * FROM login WHERE email = '" . $sanitized_userid . "' AND pass = '" . $sanitized_password . "'";
  $date = date("Y-m-d_h:i:sa");
  $result = mysqli_query($conn, $sql) 
    or die(mysqli_error($conn));
      
  $num = mysqli_fetch_array($result);
      
  if($num > 0) {
    $_SESSION['email']=$sanitized_userid;
    $_SESSION['pass']=$sanitized_password;
    header("Location: dashboard.php?identity={$encrypted1}&&macaddress={$MAC}");
    $ins = "INSERT INTO loginact(email, datetime, mac) VALUES('$email','$date', '$MAC')";
    $conn->query($ins);
  }
  else {
    echo "<script>
       Swal.fire({
       icon: 'error',
      title: 'Oops...😞',
      text: 'Invalid Credentials',
    })
    </script>";
    }
  } 
?>