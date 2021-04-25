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
    <a class="navbar-brand" href="doctor.php">Home
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
      <a href="logout.php"><button type="button" class="btn btn-outline-success">Log out</button></a>

    </div>
  </nav>
  <style>
.navbar{margin-bottom:15px;}
</style>
</nav>
<?php
    include 'sidebar.php';

    if($_SESSION['user_type'] == 'Doctor' && isset($_GET['editprofile'])){

       if($_SESSION['user_type'] == 'Doctor')
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
          $hospital_name = $_POST['hospital_name'];
          $contact_number = $_POST['contact_number'];
          $new_image = $_POST['photo'];
          if(isset($_FILES['img']['name']))
          {
            $fileName = time().'-'.$_FILES['img']['name'];
            $status = move_uploaded_file($_FILES['img']['tmp_name'], 'Photo/Doctor/'.$fileName);
            if($status)
            {
              $new_image = $fileName;
            } 
          }
  
          if($new_image!="")
          {
          $edit = "Update doctor SET first_name = '$first_name', last_name = '$last_name', email_id = '$email', password = '$password', address = '$address', hospital_name = '$hospital_name', contact_number = '$contact_number', photo = '$new_image' where d_id = '$user_id' ";
          }
          else
          {
            $edit = "Update doctor SET first_name = '$first_name', last_name = '$last_name', email_id = '$email', password = '$password', address = '$address', hospital_name = '$hospital_name', contact_number = '$contact_number' where d_id = '$user_id' ";
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
          }
        }


        $sql = "SELECT * FROM doctor where d_id = '".$user_id."'";
        $result = mysqli_query($conn, $sql);
        $first_name = "";
        $last_name = "";
        $email_id = "";
        $password = "";
        $address = "";
        $hospital_name = "";
        $contact_number = "";
        $image = "";
        // code to fetch data
        while ($row = mysqli_fetch_array($result))
        {
          $first_name = $row['first_name'];
          $last_name = $row['last_name'];
          $email_id = $row['email_id'];
          $password = $row['password'];
          $address = $row['address'];
          $hospital_name =$row['hospital_name'];
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
        <form class="row g-3" style="margin-left: 0px; margin-top:20px;" method="POST" enctype="multipart/form-data" action="">
        <div class="text-center">
        <img style="width:120px; height:125px; border-radius: 50%;" src="Photo/Doctor/<?php echo "$image"; ?>" />
        </div>
        <div class="text-center">
          <input type="file" id="img" name="img" class="my_file"/> 
        </div>
    <div class="col-md-6">
      <label for="first_name" class="form-label">First Name</label>
      <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo "$first_name"; ?>">
    </div>
    <div class="col-md-6">
      <label for="last_name" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo "$last_name"; ?>">
    </div>
    <div class="col-md-6">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo "$email_id"; ?>">
    </div>
    <div class="col-md-6">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" value="<?php echo "$password"; ?>">
    </div>
    <div class="col-12">
      <label for="address" class="form-label">Address</label>
      <input type="text" class="form-control" id="address" name="address" value="<?php echo "$address"; ?>">
    </div>
    <div class="col-md-6">
      <label for="hospital_name" class="form-label">HospitalName</label>
      <input type="text" class="form-control" id="hospital_name" name="hospital_name" value="<?php echo "$hospital_name"; ?>">
    </div>
    <div class="col-md-6">
      <label for="contact_number" class="form-label">Contact Number</label>
      <input type="Number" class="form-control" id="contact_number" name="contact_number" value="<?php echo "$contact_number"; ?>">
    </div>
      <div class="col-12" style="margin-top:30px;">
        <button type="submit" class="btn btn-primary" id="Edit" name="Edit">Update</button>
      </div>
    </form> 
    </div>

    <?php
    }else if($_SESSION['user_type'] == 'Doctor' && isset($_GET['clientreq'])){
        //Doctor client request
        ?>
        <?php 
  // Delete request
  $delete = false;
  $update = false;
  if(isset($_POST['delete'])){
    $d_req_id = $_POST['delete'];
    $dl = "DELETE FROM `doctor_client_req` WHERE d_req_id = $d_req_id";
    $result = mysqli_query($conn, $dl);
    $delete = true;
  }

  //Accept request
  if(isset($_POST['accept'])){
    $d_req_id = $_POST['accept'];
    $edit = "Update doctor_client_req SET req ='Accept' where d_req_id = '$d_req_id'  ";
    $result = mysqli_query($conn, $edit);
    $update = true;
  }
  ?>

      <div class="right_content">
      <?php
      if($delete)
    {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Request is deleted.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }

if($update)
    {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Request is accepted.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
?>

            <h3>Doctor Client Request</h3>
            <!--CSS for Doctor client req h3-->
            <style>
              h3
              {
                text-align:center;
                margin-top:2px;
              }
            </style>
            <div style="margin: 0px 0px 0px 0px;" class="d-flex align-items-start bd-highlight mb-3">
              <div class="container my-4">
              <form method="POST" action="">
              <table class="table table-striped">
              <thead>
              <tr>
                  <th scope="col">d_req_id</th>
                  <th scope="col">first_name</th>
                  <th scope="col">last_name</th>
                  <th scope="col">email_id</th>
                  <th scope="col">contact_number</th>
                  <th scope="col">pet_type</th>
                  <th scope="col">pet_problem</th>
                  <th scope="col">problem_description</th>
                  <th scope="col">req_date</th>
                  <th scope="col">request</th>
			          <th colspan="2" style="text-align:center;">Action</th>
             </tr>
              </thead>
            <tbody>
<!-- query for displaying data in table of client req-->               
      <?php 
        $sql = "SELECT * FROM `doctor_client_req` where d_id =" .$user_id;
        $result = mysqli_query($conn, $sql);
        $d_req_id = 0;
        while($row = mysqli_fetch_assoc($result)){
          $d_req_id = $d_req_id + 1;
          echo "<tr>
          
          <td>". $row['d_req_id'] . "</td>
          <td>". $row['first_name'] . "</td>
          <td>". $row['last_name'] . "</td>
          <td>". $row['email_id'] . "</td>
          <td>". $row['contact_number'] . "</td>
          <td>". $row['pet_type'] . "</td>
          <td>". $row['pet_problem'] . "</td>
          <td>". $row['problem_description'] . "</td>
          <td>". $row['req_date'] . "</td>
          <td>". $row['req'] . "</td>";
          $d_req_id = $row['d_req_id'];
          echo "<td> <button class='accept btn btn-sm btn-primary' name='accept' id='accept' value='$d_req_id'>Accept</button></td> 
         <td><button class='delete btn btn-sm btn-primary' name='delete' id='delete' value='$d_req_id'>Delete</button>  </td>
        </tr>";
      } 
        ?>
    </tbody>
  </table>
  </form>
    </div>
  </div>
</div>
  <!-- query for delet operation in client req table-->
  <?php
 // work Histroy 
      }else if($_SESSION['user_type']== 'Doctor' && isset($_GET['d_workhistory'])){
  ?>
      <div class="right_content">
      <h3>Work History</h3>
      <style>
        h3
        {
          text-align: center;
          margin-top: 2px;
        }
      </style>
      <?php 
      $user_id = $_SESSION["user_id"];
    $sql = "SELECT * FROM `doctor_client_req` where req = 'Accept' AND d_id = ".$user_id;
    $result = mysqli_query($conn, $sql);
    $d_req_id = 0;

    while($row = mysqli_fetch_assoc($result)){     
?>


    <div class="card mb-3 mt-5 ml-5" style="max-width: 900px;">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $row["first_name"]; echo " "; echo $row["last_name"]; ?>
                    </h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Mobile Number:
                            <?php echo $row["contact_number"]; ?>
                        </li>
                        <li class="list-group-item">Email Id:
                            <?php echo $row["email_id"]; ?>
                        </li>
                        <li class="list-group-item">Request Date:
                            <?php echo $row["req_date"]; ?>
                        </li>
                        <li class="list-group-item">Pet Type:
                            <?php echo $row["pet_type"]; ?>
                        </li>
                        <li class="list-group-item">Pet Problem:
                            <?php echo $row["pet_problem"]; ?>
                        </li>
                        <li class="list-group-item">Problem Description:
                            <?php echo $row["problem_description"]; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php
    $d_req_id = $d_req_id + 1;
    }
?>
      </div>
       
        <?php
      }else if($_SESSION['user_type']== 'Doctor' && isset($_GET['feedback'])){
      ?>
      <div class="right_content">
        <h3>Feedback</h3>
        <style>
        h3
        {
          text-align: center;
          margin-top: 2px;
        }
      </style>

    <?php
      $d_id = $_SESSION["user_id"];
       $sql = "SELECT * FROM `doctor_feedback` where d_id = ". $d_id;
       $result = mysqli_query($conn, $sql);
       $df_id = 0;
   
       while($row = mysqli_fetch_assoc($result)){     
       $rating = $row["rating"];
       $u_id = $row["u_id"];
       $date = $row["feedback_date"];

       $select = "SELECT * FROM `petowner` where u_id = ". $u_id;
       $res = mysqli_query($conn, $select);
       
       while($row = mysqli_fetch_assoc($res)){
    ?>
    
      <div class="card mb-3 mt-5 ml-5" style="max-width: 900px;">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $row["first_name"]; echo " "; echo $row["last_name"]; ?>
                    </h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Mobile Number:
                            <?php echo $row["contact_number"]; ?>
                        </li>
                        <li class="list-group-item">Email Id:
                            <?php echo $row["email_id"]; ?>
                        </li>
                        <li class="list-group-item">Rating:
                            <?php echo $rating; ?>
                        </li>
                        <li class="list-group-item">Feedback Date:
                            <?php echo $date; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
   
    <?php

       }
       $df_id = $df_id + 1;
    }
  
?>

      </div>
      <?php
    }else if($_SESSION['user_type'] == 'Doctor'){    
    ?>
    <div class = "right_content">
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
            <div class="card-header">Request Received</div>
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
