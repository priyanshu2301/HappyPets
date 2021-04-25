<?php 
    //connect to databse 
    include("header.php");
    $conn = getDbConn();

    //check connection
    //echo '<pre>'; print_r($conn); exit;

    // insert data into tables 
    if(isset($_POST["submit"]) == "askQue"){
        //show the data inserted into fields
        //echo '<pre>'; print_r($_POST); //exit;
        //echo '<pre>'; print_r($_FILES); //exit;

        //var_dump($status);
        //exit

        //query to be executed
        $query = dbInsert('faq', [
            'que_title' => $_POST["que_title"],
            'que_desc' => $_POST["que"],
            'date' => date("Y/m/d"),
            
        ]);
  
        //echo $query;
        //exit;

        if($query){
            echo ' </br>'.'<div class="alert alert-success" role="alert">
            Question is asked!
          </div>';
          } 
          else {
            echo '</br>'.'<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>problem submitting!</strong> try again later
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                            </div>';
        }

    }

    mysqli_close(getDbConn());

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
        <!-- the FaQ page-->
        <h2 class="mx-5 mt-3">FaQ</h2>

        <style>
        h2
        {
          text-align: center;
          margin-top: 2px;
        }
      </style>

        <!-- ask a question -->

        <div class="container">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mt-5">
                    <div class="container">
                        <h4 class="mx-3 mt-4">ask your question here!</h4>
                        <div class="form-group ml-3">
                            <input type="textarea" class="form-control" id="que_title" placeholder="Question title" required name="que_title">
                        </div>
                        <div class="form-group ml-3">
                            <input type="textarea" class="form-control" id="question" placeholder="ask your question here" required name="que">
                        </div>
                        <div class="container mb-4">
                            <button type="submit" class="btn btn-outline-primary" name="submit" value="askQue" >Ask</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    

        <!-- to see the questions asked recently -->
        <div class="container mt-5">
            <a class="btn btn-outline-danger" href="question.php" role="button"> See Recently aksed questions! </a>
        </div>


        <?php 
    include "footer.php";
?>