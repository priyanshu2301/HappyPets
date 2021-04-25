<?php 

//connect to databse
include("header.php");
$conn = getDbConn();



?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="question.php">Back</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

       
        <!-- the actual question -->

        <?php


        
            $q_id = $_GET["q_id"];
            /*
            $sql = dbSelectM('faq', 'q_id', $q_id);
            $row = mysqli_fetch_assoc($sql);
            $as = $row['que_desc'];
            echo $as; */
            $as = "";
            $sql = "SELECT * FROM `faq` WHERE q_id = ".$q_id;
         
            $in = $conn->query($sql);
            $row = mysqli_fetch_assoc($in);

            ?>

            
            <div class="container border border-dark mt-5">

            <div class="card">
                <div class="card-header">
                    <?php echo $row["que_title"]; ?>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo $row["que_desc"]; ?></p>
                    <h6 class="mx-5 mt-3">Date: <?php echo $row["date"]; ?></h6>
                </div>
            </div>


            </div>
            
<?php

                // insert data into tables 
  if (isset($_POST["submit"]) == "answer"){

    //show the data inserted into fields
    //echo '<pre>'; print_r($_POST); //exit;
    //echo '<pre>'; print_r($_FILES); //exit;


    //query to be executed
    $query = dbInsert('faq_ans', [
      'q_id' => $q_id,
      'answer' => $_POST['ans'],
      
    ]);

    //echo $query;
    //exit;

    if($query){
        echo ' </br>'.'<div class="alert alert-success" role="alert">
            Your Answer is Submitted...!!
          </div>';
    } else {
        echo ' </br>'.'<div class="alert alert-danger" role="alert">
            Your Answer is not Submitted...!!
          </div>';
    }
    

    }

    mysqli_close(getDbConn());

?>

            <div class="container mt-5">

                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="ans" placeholder="give your answer here" required name="ans">
                    </div>

                    <button type="submit" class="btn btn-outline-success" name="submit" value="answer" >Answer</button>
                </form>
            </div>


        <div class="container border dark-border mt-5">

            

        </div>


        
        <?php 
    include "footer.php";
?>