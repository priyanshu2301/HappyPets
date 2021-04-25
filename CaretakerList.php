<?php 
//connectting to database
include("header.php");
$conn = getDbConn();
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
    <?php
    if(isset($_SESSION["loggedin"]))
    {
      ?>
    <a class="navbar-brand" href="petowner.php">Back</a>
    <?php
    }
    else
    {
      ?>
    <a class="navbar-brand" href="index.php">Back</a>
      <?php
    }
    ?>
      <!--  <a class="navbar-brand" href="index.php">Back</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<!-- cards -->

<?php 
    $sql = "SELECT * FROM `caretaker`";
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
                        <li class="list-group-item">Gender:
                            <?php echo $row["gender"]; ?>
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
                        <li class="list-group-item">Rating: 
                        <?php
                            //Query to display the average of the rating
                            $avg = "SELECT FORMAT(AVG(DISTINCT rating), 0) AS average FROM caretaker_feedback where c_id = ".$c_id;
                            $res= mysqli_query($conn, $avg);
                            $row = mysqli_fetch_assoc($res);
                            $average = $row['average'];
                            if($average != NULL)
                            {
                                echo $average . "/5";
                            }
                            else
                            {
                                echo "0/5";
                            }
                        ?>
                        </li>
                    </ul>
                    <a class="btn btn-outline-primary" href="caretaker_Req.php?c_id=<?php echo $c_id; ?>" role="button">Hire</a>
                   

                </div>
            </div>
        </div>
    </div>


<?php
    $c_id = $c_id + 1;
    }
?>


<?php
include 'footer.php';
?>