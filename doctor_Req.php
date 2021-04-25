<?php
    include 'header.php';
    $conn = getDbConn();
    if(!isset($_SESSION["loggedin"])){
        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
        header('Location: ' . $home_url);
          exit;
        }
?>
<?php
    $d_id = $_GET["d_id"];
?>
<?php
    $u_id = $_SESSION['user_id'];
    if (isset($_POST["submit"]) == "submit"){
        $query = dbInsert('doctor_client_req', [
        'first_name' => $_POST["Fname"],
        'last_name' => $_POST["Lname"],
        'email_id' => $_POST["email"],
        'contact_number' => $_POST["contact_number"],
        'pet_type' => $_POST["pet_type"],
        'req_date' => $_POST["req_date"],
        'pet_problem' => $_POST["pet_problem"],
        'problem_description' => $_POST["problem_description"],
        'req' => 'pending',
        'u_id' => $u_id,
        'd_id' => $_GET["d_id"],
        ]);
      if($query){
        echo ' </br>'.'<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your request has been sent.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      } 
      else {
        echo '</br>'.'<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Problem!</strong> Enter proper details
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
    }
    
?>
<!-- Code to retrive same data in the form -->
<?php
$query = "SELECT * FROM petowner where u_id = " . $u_id;
      $result = mysqli_query($conn, $query);
      $first_name = "";
      $last_name = "";
      $email = "";
      $contact_number = "";
      // code to fetch data
      while ($row = mysqli_fetch_array($result))
      {
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email_id'];
        $contact_number = $row['contact_number'];
      }
      // code for fetch data end
     
    ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="DocList.php">Back</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<h3>Doctor Request</h3>
<!--CSS for <h3> tag-->
<style>
    h3 {
        text-align: center;
        margin-top: 10px;
    }
</style>
<form action="" method="POST">
<div class="form-row mx-5">
    <div class="form-group col-md-6">
        <label for="fname">First Name</label>
        <input type="text" class="form-control" id="fname" required name="Fname" value="<?php echo $first_name; ?>">
    </div>

    <div class="form-group col-md-6">
        <label for="lname">Last Name</label>
        <input type="text" class="form-control" id="lname" required name="Lname" value="<?php echo $last_name; ?>">
    </div>

    <div class="form-group col-md-6">
        <label for="req_date">Request Date</label>
        <input type="date" class="form-control" id="req_date" required name="req_date">
    </div>

    <div class="form-group col-md-6">
        <label for="pet_type">Pet Type</label>
        <input type="text" class="form-control" id="pet_type" required name="pet_type"
            placeholder="Dog/Cat/Rabbit/Etc...">
    </div>

    <div class="form-group col-md-6">
        <label for="email">Email Id</label>
        <input type="email" class="form-control" id="email" required name="email" value="<?php echo $email; ?>">
    </div>

    <div class="form-group col-md-6">
        <label for="contact_number">Mobile Number</label>
        <input type="text" class="form-control" id="contact_number" required name="contact_number" value="<?php echo $contact_number; ?>">
    </div>

    <div class="form-group col-md-6">
        <label for="pet_problem">Pet problem</label>
        <input type="text" class="form-control" id="pet_problem" required name="pet_problem">
    </div>

    <div class="form-group col-md-6">
        <label for="problem_description">Problem Description</label>
        <input type="textarea" class="form-control" id="problem_description" required name="problem_description">
    </div>

    <div class="container mt-4 mr-5 m-md-4">
        <button type="submit" class="btn btn-outline-success" name="submit" value="submit">Send Request</button>
    </div>
</div>    
</form>


<?php
include "footer.php";
?>