<?php 

include("header.php");
$conn = getDbConn();

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="Faq.php">Back</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

   
        
    

<!-- Questions list -->
<h2 class="mx-5 mt-4"> Recently asked Questions</h2>
<style>
        h2
        {
          text-align: center;
          margin-top: 2px;
        }
      </style>
<?php 

$sql = "SELECT * FROM `faq`";
$in = $conn->query($sql);
$q_id = 0;

while($row = mysqli_fetch_assoc($in)){
    $id = $row["q_id"];
    //echo $id;

    
?>
<div class="container border border-dark mt-5">

<div class="card">
    <div class="card-header">
        <?php echo $row["que_title"]; ?>
    </div>
    <div class="card-body">
        <p class="card-text"><?php echo $row["que_desc"]; ?></p>
        <a href="getAnswer.php?q_id=<?php echo $id; ?>" class="btn btn-primary" type="button" name="ans" value="<?php $id; ?>">Answer</a>   
        <a href="answers.php?q_id=<?php echo $id; ?>" type="button" name="ans" class="btn btn-primary">View Answers</a>
        <h6 class="mx-5 mt-3">Date: <?php echo $row["date"]; ?></h6>
    </div>
</div>


</div>

<?php 
$q_id = $q_id + 1;
}
?>

<?php 
    include "footer.php";
?>