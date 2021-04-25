<?php
session_start();
include 'config/config.php';

$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST["email_id"];
    $password = $_POST["password"];

   // if(!isset($_POST['']))
    //{
      //  $showError = "Select login type";
    //}
    // for petowner
        $sql = "Select a_id,email_id, password from admin where email_id ='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $num = mysqli_num_rows($result);
        if ($num == 1)
        {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_type'] = $_POST['admin'];
            $_SESSION['user_id'] = $row['a_id'];
            header("location: admin.php");
        } 
        else
        {
            $showError = "Invalid email or password";
        }
    }
?>
        <!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
		integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<title>Happy Pets</title>
</head>
<body style="height: 100vh;">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
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
            </ul>
    </div>
  </nav>

  <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
    <h2 class="mx-5 mt-4">Log In</h2>
        <!-- form -->
        <form method = "post">
            <div class="form-group w-75 p-3 mx-4">
            <label for="email_id">Email address</label>
            <input type="email" class="form-control" id="email_id" name = "email_id" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            
            <div class="form-group w-75 p-3 mx-4">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group w-75 p-3 mx-4">
            <label for="log">Log in As: </label>
            <button type="submit" name="petowner" id="petowner" class="btn btn-primary ml-5" required>Log in</button>
            </div>
        </form>

</body>
</html>

