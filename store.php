<?php
//include("config/config.php");
include("config/header.php");
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
</nav>

<?php 

 $sql = "SELECT * FROM `store_product`";
 $in = $conn->query($sql);
$id = 0;

while($row = mysqli_fetch_assoc($in)){

    
?>

<div class="container mt-5">
        
          <div class="card" style="width: 18rem;">
            <img src="Photo/product/<?php echo $row["product_photo"]; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Name: <?php echo $row["product_title"];  ?></h5>
              <p class="card-text">Description: <?php echo $row["product_description"];  ?>     </p>
              <h6 class="card-text"> Availability: <?php echo $row["availability"]; ?></h6>
              <h6 class="card-text"> Delivery: <?php echo $row["delivery_option"]; ?></h6>
            </div>
          </div>
          
</div>




<?php 
$id = $id + 1;
}
?>



<?php
include "footer.php";
?>
