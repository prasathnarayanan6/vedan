<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/mm.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
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
    <input type="email" class="no-outline" id="exampleFormControlInput1" placeholder="Email" size="30"><br><br>
    <input type="password" class="no-outline" id="exampleFormControlInput1" placeholder="Password" size="30"><br><br><br>
    <center><input type="submit" class="btn btn-dark"placeholder="Login"></center>
  </form>
</div><br><br>
<center>
<p><b>© 2021 XYMA Analytics Inc. IIT Madras Research Park, Chennai, 600113</b></p>
</center> 
</body>
</html>