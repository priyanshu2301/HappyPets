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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="petowner.php?d_hirehistory">Back</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>


<?php
    $dt = date('Y-m-d');
    $u_id = $_SESSION['user_id'];
    if (isset($_POST["submit"]) == "submit"){
        $query = dbInsert('doctor_feedback', [
            'feedback_date' => $dt,
            'd_id' => $d_id,
            'u_id' => $u_id,
            'rating' => $_POST['star'],
 ]);
 if($query){
    echo ' </br>'.'<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your feedback has been sent.
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



<h1>Doctor Feedback</h1>
<!--CSS for <h3> tag-->
<style>
    h1 {
        text-align: center;
        margin-top: 10px;
    }
</style>
<div class="container mt-5">
<div class = "card">
<div class="text-center">
        <div class="card-header">
            <h3>Give your rating</h3>
        </div>
<div class="stars">
  <form action="" method="POST">
    <input class="star star-5" id="star-5" type="radio" value="5" name="star"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" value="4" name="star"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" value="3" name="star"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" value="2" name="star"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" value="1" name="star"/>
    <label class="star star-1" for="star-1"></label>
    <div class="container mt-4 mr-5 m-md-4">
        <button type="submit" class="btn btn-outline-success" name="submit" value="submit">Submit</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
<?php
include "footer.php";
?>