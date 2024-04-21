<?php
require_once 'session_manager.php';

if (isset($_POST['inputPassword'])){
    $password = $_POST['inputPassword'];
    
    $login_status = login($password);
    //echo $login_status;
    if($login_status == true){
        header('Location: index.php');
    }
    else{
      echo "<div style='color:red;background-color:black; font-weight:bold; border-bottom:3px solid red;'>INVALID ACCESS KEY</div>";
    }
} else 
    logout();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
  <title>Panel Private</title>
  
  <style>
    body{
      font-family:"Montserrat", sans-serif;
      text-align:center;
    }

    footer {


      display: flex;
      justify-content: center;
      align-items: center;
      position: fixed;
      bottom: 0;
      left: 0;
      margin-top: 10px;
      z-index: 9999;
      width: 100%;
      height: 4rem;
      color: red;
    }
html {
      scroll-behavior: smooth;

    }
    
    
  </style>
</head>

<body data-theme="dark" style="height:1000px;">
  
  <form method="POST">
  
  <center>
    <br><br>
        <img src="https://i.ibb.co/cvCqgvW/1713392048755.jpg" width="120px" height="120px" style="margin-top:10px; border-radius: 50%; border:1px solid white;">
        </center>
    <div class="">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="text-center lg:text-left">

      <h1 class="text-5xl font-bold">Panel Private</h1>

    </div>
    <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
      <form class="card-body">

        <div class="form-control">
          <label class="label">
            <span class="label-text">Your Access Key</span>
          </label>
          <input type="password" placeholder="Enter Correct Key" class="input input-bordered" required name="inputPassword"/>

        </div>
        <div class="form-control mt-6">
          <input type="submit" value="ENTER" name="submit" class="btn btn-active" style="border:1px solid grey;">
        </div>
         <br>
         
      </form>
    </div>
  </div>
</div>

  
<!-- TABLE -->


  <footer class="footer footer-center p-4 bg-base-300 text-base-content">
  <aside>
    <p>Copyright © 2023 - Author : Kenneth Gregorio Perez</p>
  </aside>
</footer>

</form>
</body>

</html>
