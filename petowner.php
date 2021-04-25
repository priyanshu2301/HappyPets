<?php

    include 'header.php';
    if(!isset($_SESSION["loggedin"])){
      $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
      header('Location: ' . $home_url);
        exit;
      }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="welcome.php">Home
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
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="DocList.php">Doc list</a>
          <a class="dropdown-item" href="CaretakerList.php">Caretaker list</a>
          <a class="dropdown-item" href="adoption.php">Adoption List</a>
          <a class="dropdown-item" href="FaQ.php">FaQ</a>
          <a class="dropdown-item" href="store.php">Store</a>
        </div>
      </li>
      </ul>
      <a href="logout.php"><button type="button" class="btn btn-outline-success">Log out</button></a>

    </div>
  </nav>
      <style>
.navbar{margin-bottom:15px;}
</style>
<?php include'sidebar.php';

     if($_SESSION['user_type'] == 'Petowner' && isset($_GET['editprofile'])){
        //Code to display data of caretaker
    if($_SESSION['user_type'] == 'Petowner')
    {
       //Query to edit data
       $change = false;
       if(isset($_POST['Edit']) == "Update")
       {
         $user_id = $_SESSION['user_id'];
         $email = $_POST['email'];
         $first_name = $_POST['first_name'];
         $last_name = $_POST['last_name'];
         $password = $_POST['password'];
         $email = $_POST['email'];
         $address = $_POST['address'];
         $contact_number = $_POST['contact_number'];
         $new_image = "";

         if(isset($_FILES['img']['name'])){
        	$fileName = time().'-'.$_FILES['img']['name'];
    		$status = move_uploaded_file($_FILES['img']['tmp_name'], 'Photo/User/'.$fileName);	
    		if($status){
    			$new_image = $fileName;
    		}
        }

        if($new_image!=""){
         $edit = "Update petowner SET first_name = '$first_name', last_name = '$last_name', password = '$password', email_id = '$email', address = '$address', contact_number = '$contact_number', photo = '$new_image' where u_id = '$user_id' ";
        }
        else
        {
          $edit = "Update petowner SET first_name = '$first_name', last_name = '$last_name', password = '$password', email_id = '$email', address = '$address', contact_number = '$contact_number' where u_id = '$user_id' ";
        }
        $result = mysqli_query($conn, $edit);
         //$num = mysqli_num_rows($result);
         // Query to edit data ends here
         // Code for alters update or not
         if ($result == 1)
         {
           echo '<div style="margin-left: 210px;" class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Succes!</strong> Your data has been updated.
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
         }
         else
         {
           echo '<div style="margin-left: 210px;" class="alert alert-warning alert-dismissible fade show" role="alert">
           <strong>Fail!</strong> Your data has not been updated.
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
         unset($_POST);
		  header("Location: ".$_SERVER['PHP_SELF']);
         }
       }
      
      $sql = "SELECT * FROM petowner where u_id = '".$user_id."'";
      $result = mysqli_query($conn, $sql);
      $first_name = "";
      $last_name = "";
      $password = "";
      $email = "";
      $address = "";
      $contact_no = "";
      $image = "";
      // code to fetch data
      while ($row = mysqli_fetch_array($result))
      {
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $password = $row['password'];
        $email = $row['email_id'];
        $address = $row['address'];
        $contact_number = $row['contact_number'];
        $image = $row['photo'];
      }
      // code for fetch data end
     
    }
      ?>
      <div class="right_content">
      <h3>Edit Profile</h3>
      <!--CSS for <h3> tag-->
      <style>
          h3
          {
            text-align:center;
            margin-top: 2px;
          }
        </style>
        <!-- Form to display and edit data -->
        <form class="row g-3" style="margin-left: 0px; margin-top:20px;" method="POST" enctype="multipart/form-data" action="">
        <div class="text-center">
        <img style="width:120px; height:125px; border-radius: 50%;" src="Photo/User/<?php echo "$image"; ?>" />
        </div>
        <div class="text-center">
          <input type="file" id="img" name="img" class="my_file"/> 
        </div>
        <div class="col-md-6">
          <label for="first_Name" class="form-label">First Name</label>
          <input type="text" class="form-control" id="first_Name" name="first_name" value="<?php echo "$first_name"; ?>" />
        </div>
        <div class="col-md-6">
          <label for="last_Name" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="last_Name" name="last_name" value="<?php echo "$last_name"; ?>" />
        </div>
        <div class="col-md-6">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" value="<?php echo "$password"; ?>" />
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo "$email"; ?>" />
        </div>
        <div class="col-12">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" id="address" name="address" value="<?php echo "$address"; ?>" />
        </div>
        <div class="col-md-4">
        <label for="contact_number" class="form-label">Mobile Number</label>
        <input type="text" class="form-control" id="contact_number" name="contact_number" value="<?php echo "$contact_number"; ?>" / />
        </div>
        <div class="col-12" style="margin-top:30px;">
        <button type="submit" class="btn btn-primary" name="Edit" id="Edit">Update</button>
        </div>
        </form>
        </div>
        <!-- Form codes for displaying and editing ends-->
          
    <?php
    }else if($_SESSION['user_type'] == 'Petowner' && isset($_GET['c_hirehistory'])){
      // Caretaker higher history
      ?>
      <div class="right_content">
      <h3>Caretaker Hire History</h3>
         <!--CSS for <h3> tag-->
      <style>
          h3
          {
            text-align:center;
            margin-top: 2px;
          }
        </style>
        <?php 
        $select = "SELECT * FROM `caretaker_client_req` where req='Accept' AND u_id = ".$user_id;
        $res = mysqli_query($conn,$select);
        while($row = mysqli_fetch_assoc($res))
        {
          $c_id = $row["c_id"];
        
    $sql = "SELECT * FROM `caretaker` where c_id = ".$c_id;
    $result = mysqli_query($conn, $sql);
    $c_id = 0;

    while($row = mysqli_fetch_assoc($result)){     
    $photo = $row["photo"];
    $c_id = $row["c_id"];
?>


    <div class="card mb-3 mt-5 ml-5" style="max-width: 900px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="photo/careTaker/<?php echo $photo; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $row["first_name"]; echo " "; echo $row["last_name"]; ?>
                    </h5>
                    <p class="card-text">address :
                        <?php echo $row["address"]; ?>
                    </p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Mobile Number:
                            <?php echo $row["contact_number"]; ?>
                        </li>
                        <li class="list-group-item">status:
                            <?php echo $row["status"]; ?>
                        </li>
                        <li class="list-group-item">specialist of:
                            <?php echo $row["specialist"]; ?>
                        </li>
                        <li class="list-group-item">email id:
                            <?php echo $row["email_id"]; ?>
                        </li>
                        <li class="list-group-item">Rating: 4.5/5</li>
                    </ul>
                    <a class="btn btn-outline-primary" style="margin-left:30px" href="caretaker_feedback.php?c_id=<?php echo $c_id; ?>" role="button">Give Feedback</a>
                </div>
            </div>
        </div>
    </div>


<?php
    $c_id = $c_id + 1;
    }
  }
?>
   
      </div>
    <?php
      }else if($_SESSION['user_type']== 'Petowner' && isset($_GET['d_hirehistory'])){
        ?>
        <div class="right_content">
        <h3>Doctor Hire History</h3>
        <!--CSS for <h3> tag-->
      <style>
          h3
          {
            text-align:center;
            margin-top: 2px;
          }
        </style>
        <?php 
        $select = "SELECT * FROM `doctor_client_req` where req='Accept' AND u_id = ".$user_id;
        $res = mysqli_query($conn,$select);
        while($row = mysqli_fetch_assoc($res))
        {
          $d_id = $row["d_id"];
        
          $sql = "SELECT * FROM `doctor` where d_id = ". $d_id;
          $result = mysqli_query($conn, $sql);
          $d_id = 0;

          while($row = mysqli_fetch_assoc($result)){ 

              if($row["verification"] == "verified"){
              
              $photo = $row["photo"];
              $d_id = $row["d_id"];
              
              
          ?>
    
          <div class="card mb-3 mt-5 ml-5" style="max-width: 900px;">
              <div class="row no-gutters">
                  <div class="col-md-4">
                  <img src="photo/Doctor/<?php echo $photo; ?>" class="card-img">
                  </div>
                  <div class="col-md-8">
                  <div class="card-body">
                      <h5 class="card-title"><?php echo $row["first_name"]; echo " "; echo $row["last_name"]; ?></h5>
                      <p class="card-text">address : <?php echo $row["address"]; ?></p>
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item">Mobile Number: <?php echo $row["contact_number"]; ?></li>
                          <li class="list-group-item">status: <?php echo $row["status"]; ?></li>
                          <li class="list-group-item">specialist of: <?php echo $row["specialist"]; ?></li>
                          <li class="list-group-item">email id: <?php echo $row["email_id"]; ?></li>
                          <li class="list-group-item">gender: <?php echo $row["gender"]; ?></li>
                          <li class="list-group-item">Rating: 4.5/5</li>
                      </ul>

                      <a class="btn btn-outline-primary" style="margin-left:30px" href="doctor_feedback.php?d_id=<?php echo $d_id; ?>" role="button">Give Feedback</a>
                  </div>
                  </div>
              </div>
          </div> 
                          
      <?php
          $d_id = $d_id + 1;
      }
          }
        }
      ?>
        </div>
      <?php
    }else if($_SESSION['user_type'] == 'Petowner'){    
    ?>
      <!-- start cards from here -->
      <div style="margin: 0px 0px 0px 0px;" class="d-flex align-items-start bd-highlight mb-3">  
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width:18rem;">
            <div class="card-header">Client Request</div>
            <div class="card-body">
            <h4 class="card-title">43</h4>
            <a class="btn text-white" href="#">View</a>
            </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width:18rem;">
            <div class="card-header">Reguest Received</div>
            <div class="card-body">
            <h4 class="card-title">50</h4>
            <a class="btn text-white" href="#">View</a>
            </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width:18rem;">
            <div class="card-header">FAQ</div>
            <div class="card-body">
            <h4 class="card-title">23</h4>
            <a class="btn text-white" href="#">View</a>
            </div>
            </div>
        </div>
      </div> 

<?php
} 
      include'footer.php';
?>