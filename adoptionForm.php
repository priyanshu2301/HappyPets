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
    $u_id = $_GET["u_id"];
?>

<!-- Code to retrive same data in the form -->
<?php
$sql = "SELECT * FROM petowner where u_id = " . $u_id;
      $result = mysqli_query($conn, $sql);
      $first_name = "";
      $last_name = "";
      $email = "";
      $contact_number = "";
      $address = "";
      // code to fetch data
      while ($row = mysqli_fetch_array($result))
      {
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email_id'];
        $contact_number = $row['contact_number'];
        $address = $row['address'];
      }
      // code for fetch data end
     
    ?>


<?php
    // Query to insert data
    //$u_id = $_SESSION['user_id'];
    if (isset($_POST["submit"]) == "submit"){
        
        $fileName = time().'-'.$_FILES['img']['name'];
        $status = move_uploaded_file($_FILES['img']['tmp_name'], 'Photo/adoption/'.$fileName);

            $query = dbInsert('adoption_list', [
            'first_name' => $_POST["first_name"],
            'last_name' => $_POST["last_name"],
            'email_id' => $_POST["email"],
            'contact_number' => $_POST["contact_number"],
            'pet_type' => $_POST["pet_type"],
            'address' => $_POST["address"],
            'pet_photo' => $fileName,
            'pet_description' => $_POST["pet_description"],
            'pet_breed' => $_POST["pet_breed"],
            'pet_date_of_birth' => $_POST["pet_date_of_birth"],
            'pet_price' => $_POST["pet_price"],
            'u_id' => $u_id,
            ]);
            //echo $query;
            //exit;
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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="adoption.php">Back</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<h3>Adoption Form</h3>
<!--CSS for <h3> tag-->
<style>
    h3 {
        text-align: center;
        margin-top: 10px;
    }
</style>
<form action="" method="POST" enctype="multipart/form-data">
<div class="mt-5">
<div class="form-row mx-5">
    <div class="form-group col-md-6">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" id="first_name" required name="first_name" value="<?php echo $first_name; ?>">
    </div>

    <div class="form-group col-md-6">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" required name="last_name" value="<?php echo $last_name; ?>">
    </div>

    <div class="form-group col-md-6">
        <label for="email">Email Id</label>
        <input type="email" class="form-control" id="email" required name="email" value="<?php echo $email; ?>">
    </div>

    <div class="form-group col-md-6">
        <label for="contact_number">Mobile Number</label>
        <input type="text" class="form-control" id="contact_number" required name="contact_number" value="<?php echo $contact_number; ?>">
    </div>
</div>

<div class="form-group mx-5">
      <label for="address">Address Include zipcode, state, city</label>
      <input type="textarea" class="form-control" id="address" value="<?php echo $address; ?>" required name="address">
</div>

<div class="form-row mx-5">
    <div class="form-group col-md-6">
        <label for="pet_type">Pet Type</label>
        <input type="text" class="form-control" id="pet_type" required name="pet_type"
            placeholder="Dog/Cat/Rabbit/Etc...">
    </div>

    <div class="form-group col-md-6">
        <label for="pet_breed">Pet Breed</label>
        <input type="text" class="form-control" id="pet_breed" required name="pet_breed">
    </div>

    <div class="input-group mb-3 ml-5 mt-3">
          <label for="img">Select Pet Image File:   </label>
          <input type="file" required id="img" name="img">
        </div>
    

    <div class="form-group col-md-6">
        <label for="pet_description">Pet description</label>
        <input type="textarea" class="form-control" id="pet_description" required name="pet_description">
    </div>

    <div class="form-group col-md-6">
        <label for="pet_date_of_birth">Pet Birthdate</label>
        <input type="date" class="form-control" id="pet_date_of_birth" required name="pet_date_of_birth">
    </div>

    <div class="form-group col-md-6">
        <label for="pet_price">Pet Price</label>
        <input type="text" class="form-control" id="pet_price" required name="pet_price">
    </div>

    
    <div class="container mt-4 mr-5 m-md-4">
        <button type="submit" class="btn btn-outline-success" name="submit" value="submit">Submit</button>
    </div>
</div>    
</form>


<?php
include "footer.php";
?>