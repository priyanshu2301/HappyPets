<?php
    error_reporting(E_ERROR | E_PARSE);
    include 'header.php';
    if(!isset($_SESSION["loggedin"])){
      $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
      header('Location: ' . $home_url);
        exit;
      }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="seller.php">Home
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
          <a class="dropdown-item" href="#">Doc list</a>
          <a class="dropdown-item" href="CaretakerList.php">Caretaker list</a>
          <a class="dropdown-item" href="#">Adoption List</a>
          <a class="dropdown-item" href="#">FaQ</a>
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
  
    if($_SESSION['user_type'] == 'Seller' && isset($_GET['editprofile'])){
      //Code to display data of seller
    if($_SESSION['user_type'] == 'Seller')
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
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $date_of_birth = $_POST['date_of_birth'];
        $new_image = "";
        
        if(isset($_FILES['img']['name'])){
        	$fileName = time().'-'.$_FILES['img']['name'];
    		$status = move_uploaded_file($_FILES['img']['tmp_name'], 'Photo/seller/'.$fileName);	
    		if($status){
    			$new_image = $fileName;
    		}
        }
        
        if($new_image!=""){
        	$edit = "Update seller SET first_name = '$first_name', last_name = '$last_name', password = '$password', email_id = '$email', address = '$address', contact_number = '$contact_number', date_of_birth= '$date_of_birth', photo = '$new_image' where s_id = '$user_id' ";
        }else{
        	$edit = "Update seller SET first_name = '$first_name', last_name = '$last_name', password = '$password', email_id = '$email', address = '$address', contact_number = '$contact_number', date_of_birth= '$date_of_birth' where s_id = '$user_id' ";	
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
          unset($_POST);
		  header("Location: ".$_SERVER['PHP_SELF']);
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

      
      $sql = "SELECT * FROM seller where s_id = '".$user_id."'";
      $result = mysqli_query($conn, $sql);
      $first_name = "";
      $last_name = "";
      $password = "";
      $address = "";
      $contact_number = "";
      $date_of_birth = "";
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
        $date_of_birth = $row['date_of_birth'];
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
        <img style="width:120px; height:125px; border-radius: 50%;" src="Photo/seller/<?php echo "$image"; ?>" />
        </div>
        <div class="text-center">
          <input type="file" id="img" name="img" class="my_file" /> 
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
        <div class="col-md-6">
        <label for="date_of_birth" class="form-label">Birthdate</label>
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo "$date_of_birth"; ?>" />
        </div>
        <div class="col-12" style="margin-top:30px;">
        <button type="submit" class="btn btn-primary" name="Edit" id="Edit">Update</button>
        </div>
        </form>
        <!-- Form codes for displaying and editing ends-->
      </div>

    <?php
    }else if($_SESSION['user_type'] == 'Seller' && isset($_GET['feedback'])){
      ?>
      <div class="right_content">
      <h3>Feedback</h3>
      </div>
    <?php
      }else if($_SESSION['user_type']== 'Seller' && isset($_GET['Orders'])){
        ?>
        <div class="right_content">
        <h3>Orders</h3>
        </div>
        <?php
    }else if($_SESSION['user_type'] == 'Seller' && isset($_GET['addProduct'])){
      ?>
      <div class="right_content">
      <h3>Add Product</h3>
      <?php

      $address = "";
      $id = $_SESSION["user_id"];
      $sql = "SELECT * FROM `seller` WHERE s_id = ".$id;   
      $in = $conn->query($sql);
      $row = mysqli_fetch_assoc($in);
      $address = $row["address"];
  

              if (isset($_POST["submit"]) == "register"){

                //show the data inserted into fields
                //echo '<pre>'; print_r($_POST); //exit;
                //echo '<pre>'; print_r($_FILES); exit;
            
                //photo 
                $fileName = time().'-'.$_FILES['img']['name'];
                $status = move_uploaded_file($_FILES['img']['tmp_name'], 'Photo/product/'.$fileName);
                //var_dump($status);
                //exit
            
                //query to be executed
                $query = dbInsert('store_product', [
                  'product_title' => $_POST["title"],
                  'product_description' => $_POST["desc"],
                  'availability' => $_POST["availability"],
                  'delivery_option' => $_POST["delivery"],
                  'product_photo' => $fileName,
                  's_id' => $id,
                  'store_address' => $address,
                  
                ]);
            
                if($query){
                  echo 'success!';
                } 
                else {
                  echo 'no success!';
                }
            
               
            
              }
            
              mysqli_close(getDbConn());
      ?>
        <div class="container">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-5">
              <div class="form-row mx-5">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" placeholder="Product Title" id="title" required name="title">
                </div>
                <div class="form-group col-md-6">
                  <input type="textarea" class="form-control" placeholder="Product Description" id="desc" required name="desc">
                </div>
                <div class="form-group col-md-6">
                  <label for="gender" class="mr-3">availability:</label>
                  <label class="btn btn-dark active">
                    <input type="radio" name="availability" id="option1" value="InStock" checked> In Stock
                  </label>
                  <label class="btn btn-dark">
                    <input type="radio" name="availability" id="option2" value="OutStock"> Out Of Stock
                  </label>
                </div>
                <div class="form-group col-md-6">
                  <label for="gender" class="mr-3">Delivery Service:</label>
                  <label class="btn btn-dark active">
                    <input type="radio" name="delivery" id="option1" value="yes" checked> Delivery
                  </label>
                  <label class="btn btn-dark">
                    <input type="radio" name="delivery" id="option2" value="no"> No delivery
                  </label>
                </div>

                <div class="form-row mx-5">
                  <div class="input-group mb-3 ml-5 mt-3">
                  <label>Select Image File:</label>
                  <input type="file" required id="img" name="img">
                </div>

                <div class="container mt-4 mr-5 m-md-4">
                  <button type="submit" class="btn btn-outline-success" id="submit" name="submit" value="register">Add</button>
                </div>

              </div>
            </div>
          </form>
        </div>      
      </div>   

      <?php
      }else if($_SESSION['user_type']== 'Seller' && isset($_GET['myProducts'])){
        ?>
        <div class="right_content">
        <h3>My Products</h3>
        <?php 
        
        $id = $_SESSION["user_id"];
        $query = "SELECT * FROM  `store_product` WHERE s_id =". $id;
        $in = $conn->query($query);
        $s_id = 0;

        while($row = mysqli_fetch_assoc($in)){
            
            
        ?>
        <div class="container">
        
          <div class="card" style="width: 18rem;">
            <img src="Photo/product/<?php echo $row["product_photo"]; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Name: <?php echo $row["product_title"];  ?></h5>
              <p class="card-text">Description: <?php echo $row["product_description"];  ?>     </p>
              <h6 class="card-text"> Availability: <?php echo $row["availability"]; ?></h6>
              <h6 class="card-text"> Delivery: <?php echo $row["delivery_option"]; ?></h6>
              <button>Delete</button>
            </div>
          </div>
        
        </div>

        <?php 
        $s_id = $s_id + 1;
        }
        ?>
        


        </div>
      <?php
    }else if($_SESSION['user_type'] == 'Seller'){    
    ?>
    <div class="right_content">
    <!--radio button for active status on home page
      <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
      </label>-->
      <!-- use css for radio button
      <style>
            .switch 
            {
              position: relative;
              display: inline-block;
              width: 60px;
              height: 34px; 
              margin-left: 1180px;
            }
            .switch input
             {
                opacity: 0;
                width: 0;
                height: 0;
              }
              .slider 
              {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: .4s;
                transition: .4s;
              }
              .slider:before
              {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
              }
              input:checked + .slider
              {
                background-color: #2196F3;
              }
              input:focus + .slider
              {
                box-shadow: 0 0 1px #2196F3;
              }
              input:checked + .slider:before
              {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
              }
              .slider.round 
              {
                border-radius: 34px;
              }
              .slider.round:before
              {
                border-radius: 50%;
              }
      </style>
      </div>-->
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
</div>
<?php
    }
      include'footer.php';
?>