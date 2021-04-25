<?php 
//connect to database
include("header.php");
$conn = getDbConn();

?>

<!-- Navbar for user looged in-->
<?php 
if(isset($_SESSION["loggedin"]))
{
    $u_id = $_SESSION["user_id"];
  ?><nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
      <a class="navbar-brand" href="petowner.php">Back</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
  </div>
</nav>
<a href="adoptionForm.php?u_id=<?php echo $u_id; ?>" role="button" class="btn btn-outline-primary ml-3 mt-5">Give To Adopt</a>
<?php
}
else
{
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Back</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<a href="adoptionForm.php"  class="btn btn-outline-primary ml-3 mt-5">Give To Adopt</a>
<?php
}
?>

        <!-- list of pets -->
        <h3 class="mx-5 ml-5 mt-5">Pets Available For Adoption</h3>
        <div class="container">
<?php 

$sql = "SELECT * FROM `adoption_list`";
$in = $conn->query($sql);
$pt_id = 0;

while($row = mysqli_fetch_assoc($in)){
    
    $photo = $row["pet_photo"];
    
?>
<div class="container border border-dark mt-5">

<div class="card">
            <div class="col-md-4">
                <img src="photo/adoption/<?php echo $photo; ?>" class="card-img">
            </div>
    <div class="card-header">
        <?php echo $row["pet_type"]; ?>
    </div>
    <div class="card-body">
        <p class="card-text"><?php echo $row["pet_description"]; ?></p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Pet Breed: <?php echo $row["pet_breed"]; ?></li>
            <li class="list-group-item">Owner Name: <?php echo $row["first_name"]; echo " "; echo $row["last_name"]; ?></li>
            <li class="list-group-item">Owner Email: <?php echo $row["email_id"]; ?></li>
            <li class="list-group-item">Mobile Number: <?php echo $row["contact_number"]; ?></li>
            <li class="list-group-item">Pet DOB: <?php  echo $row["pet_date_of_birth"]; ?></li>
            <li class="list-group-item">address: <?php  echo $row["address"]; ?></li>
            <li class="list-group-item">Pet price: <?php  echo $row["pet_price"]; ?></li>
        </ul>
    </div>
</div>


</div>

<?php 
$pt_id = $pt_id + 1;
}
?>
        </div>
        
<?php
include "footer.php";
?>