<?php

  //connecting to database

  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "happypets";

  $conn = mysqli_connect($servername, $username, $password, $db);

  // check connection
  /*if (!$conn){
    die("connection was not successful : ". mysqli_connect_error());
  } else {
    echo "connection was successful";
  }*/
   
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <title>Happy Pets</title>
        
    </head>
    <body>
        <div class="text-center">
            <img src="images/logoSets/happyPetsLogo6.png" class="img-fluid" alt="Responsive image">
          </div> 
    

    <!--navbar code starts here-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Home
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="QnA.html">Q&A</a>
            </li>
        </ul>

        <a href="login.php"><button type="button" class="btn btn-outline-success">Log In</button></a>

        </div>
    </nav>

    <!-- The Register Options-->

    <div class="container mt-5 ml-5">
    <h2>Register As<span class="badge badge-secondary"></span></h2>
    </div>

      <div class="container mt-5 ml-5">
        <a class="btn btn-outline-primary" href="UserRegister.php" role="button">User</a>
        <a class="btn btn-outline-danger" href="CareTakerRegister.php" role="button">Caretaker</a>
        <a class="btn btn-outline-dark" href="SellerRegister.php" role="button">Seller</a>
        <a class="btn btn-outline-success" href="DoctorRegister.php" role="button">Doctor</a>
      </div>


    
    </body>
</html>