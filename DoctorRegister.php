<?php 

  // connect to database 
  include("config/config.php");
  $conn = getDbConn();

  // chech connection
  //echo '<pre>'; print_r($conn); exit;
  // insert data into tables 
  if (isset($_POST["submit"]) == "register"){

    //show the data inserted into fields
    //echo '<pre>'; print_r($_POST); //exit;
    //echo '<pre>'; print_r($_FILES); exit;

    //photo 
    $fileName = time().'-'.$_FILES['img']['name'];
    $status = move_uploaded_file($_FILES['img']['tmp_name'], 'Photo/Doctor/'.$fileName);
    //var_dump($status);
    //exit

    //pdf 
    $fileName2 = time().'-'.$_FILES['certificate']['name'];
    $status2 = move_uploaded_file($_FILES['certificate']['tmp_name'], 'Photo/verification/'.$fileName);
    //var_dump($status);
    //exit

    //query to be executed
    $query = dbInsert('doctor', [
      'first_name' => $_POST["Fname"],
      'last_name' => $_POST["Lname"],
      'email_id' => $_POST["email"],
      'contact_number' => $_POST["contact_number"],
      'password' => $_POST["pass"],
      'address' => $_POST["address"],
      'photo' => $fileName,
      'hospital_name' => $_POST["hospital_name"],
      'certificate' => $fileName2,
      'specialist' => $_POST["specialist"],
      'verification' => 'pending',
      'status' => $_POST["status"],
      'gender' => $_POST["gender"],
    ]);

    //echo $query;
    //exit;

    if($query){
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

?>

<!DOCTYPE html>

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

  <!-- Register as doctor -->

  <h2 class="mx-5 mt-3">Register as Doctor</h2>

  <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mt-5">
        <div class="form-row mx-5">
          <div class="form-group col-md-6">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" id="fname" required name="Fname">
          </div>

          <div class="form-group col-md-6">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" id="lname" required name="Lname">
          </div>

          <div class="form-group col-md-6">
            <label for="email">Email Id</label>
            <input type="email" class="form-control" id="email" required name="email">
          </div>

          <div class="form-group col-md-6">
            <label for="contact_number">Mobile Number</label>
            <input type="text" class="form-control" id="contact_number" required name="contact_number">
          </div>

          <div class="form-group col-md-6">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="pass" required name="pass">
          </div>

          <div class="form-group col-md-6">
            <label for="hospital_name">Hospital Name</label>
            <input type="text" class="form-control" id="hospital_name" required name="hospital_name">
          </div>

          <div class="form-group col-md-6">
            <label for="specialist">Specialist Of</label>
            <input type="text" class="form-control" id="specialist" required name="specialist">
          </div>
        </div>

        <div class="form-group mx-5">
          <label for="address">Address Include zipcode, state, city</label>
          <input type="textarea" class="form-control" id="address" placeholder="1234 Main St" required name="address">
        </div>

        <div class="input-group mb-3 ml-5 mt-3">
          <label>Select Image File:</label>
          <input type="file" required id="img" name="img">
        </div>

        <div class="input-group mb-3 ml-5 mt-3">
          <label>Select certificate File:</label>
          <input type="file" id="certificate" name="certificate">
        </div>


        <div class="btn-group btn-group-toggle ml-5 mt-1 mb-3" data-toggle="buttons">
          <label for="status" class="mr-3">current status:</label>
          <label class="btn btn-dark active">
            <input type="radio" name="status" id="option1" value="On" checked> On
          </label>
          <label class="btn btn-dark">
            <input type="radio" name="status" id="option2" value="Off"> Off
          </label>
        </div>

        <div class="btn-group btn-group-toggle ml-5 mt-1" data-toggle="buttons">
          <label for="gender" class="mr-3">Gender:</label>
          <label class="btn btn-dark active">
            <input type="radio" name="gender" id="option1" value="Male" checked> Male
          </label>
          <label class="btn btn-dark">
            <input type="radio" name="gender" id="option2" value="Female"> Female
          </label>
        </div>

        <div class="container mt-4 mr-5 m-md-4">
          <button type="submit" class="btn btn-outline-success" name="submit" value="register">Register</button>
        </div>

      </div>
    </form>
  </div>

</body>

</html>
