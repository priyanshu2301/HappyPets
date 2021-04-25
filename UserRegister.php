<?php
include('config/config.php');

  $conn = getDbConn();
//echo '<pre>'; print_r($conn); exit;
  // check connection
  /*if (!$conn){
    die("connection was not successful : ". mysqli_connect_error());
  } else {
    echo "connection was successful";
  }*/
  
  // inserting data into database
  if (isset($_POST['submit']) && $_POST['submit'] == 'register'){

    //echo '<pre>'; print_r($_POST); //exit;
    //echo '<pre>'; print_r($_FILES); //exit;
    

    $fileName = time().'-'.$_FILES['img']['name'];
    $status = move_uploaded_file($_FILES['img']['tmp_name'], 'Photo/User/'.$fileName);
    //var_dump($status);
    //exit;
    // query to be executed
  
    $insert = dbInsert('petowner', [
      'first_name' => $_POST["Fname"],
      'last_name' => $_POST["Sname"],
      'email_id' => $_POST["Email"],
      'contact_number' => $_POST["MobileNumber"],
      'password' => $_POST["pass"],
      'address' => $_POST["address"],
      'gender' => $_POST["gender"],
      'photo' => $fileName,
    ]);
    //echo $insert; 
    //exit;


    // shows result of query in true or false
    //$result = mysqli_query(getDbConn(), $insert);

    // shows if data is insered successfully or not
    if($insert){
      echo ' </br>'.'<div class="alert alert-success" role="alert">
      Successfully registered go to : <a href="login.php" class="alert-link">
      log in now</a>
    </div>';
    } 
    else {
      echo '</br>'.'<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong> problem signing up</strong> enter correct details
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                      </div>';
    }
  }
  

 mysqli_close(getDbConn());
   
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <title>Happy Pets</title>
</head>


<body>

  <!-- code for logo starts here ==> -->
  <div class="text-center">
    <img src="images/logoSets/happyPetsLogo6.png" class="img-fluid" alt="Responsive image">
  </div>
  <a class="btn btn-outline-danger ml-5" href="index.php" role="button">Home</a>

  <!-- Register as user -->

  <h2 class="mx-5 mt-3">Register as User</h2>


  <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mt-5">
        <div class="form-row mx-5">
          <div class="form-group col-md-6">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" id="fname" required name="Fname">
          </div>

          <div class="form-group col-md-6">
            <label for="sname">Last Name</label>
            <input type="text" class="form-control" id="sname" required name="Sname">
          </div>

          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" required name="Email">
          </div>

          <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="inputPassword4" required name="pass">
          </div>

          <div class="form-group col-md-6">
            <label for="contact">Mobile Number</label>
            <input type="text" class="form-control" id="contact" required name="MobileNumber">
          </div>
        </div>

        <div class="form-group mx-5">
          <label for="inputAddress">Address Include zipcode, state, city</label>
          <input type="textarea" class="form-control" id="inputAddress" placeholder="1234 Main St" required
            name="address">
        </div>

        <div class="btn-group btn-group-toggle ml-5 mt-1" data-toggle="buttons">
          <label for="gender" class="mr-3">Gender:</label>
          <label class="btn btn-dark active">
            <input type="radio" name="gender" id="option1" value="MALE" checked> MALE
          </label>
          <label class="btn btn-dark">
            <input type="radio" name="gender" id="option2" value="FEMALE"> FEMALE
          </label>
        </div>

        <div class="input-group mb-3 ml-5 mt-3">
          <label>Select Image File:</label>
          <input type="file" required id="photo" name="img">
        </div>

        <div class="container mt-4 mr-5 m-md-4">
          <button type="submit" class="btn btn-outline-success" name="submit" value="register">Register</button>
        </div>

      </div>
    </form>
  </div>

</body>

</html>
