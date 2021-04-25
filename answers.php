<?php 

//connecting to databse.
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

        <h2 class="mx-5 mt-5">The Question</h2>
        <style>
        h2
        {
          text-align: center;
          margin-top: 2px;
        }
      </style>
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

                

            <!-- the answers shown -->
            <h3 class="mx-5 mt-5"> The Answers</h3>
            <?php 

                $sql = "SELECT * FROM `faq_ans` WHERE q_id =" .$q_id;
                $in = $conn->query($sql);
                $q_id = 0;

                while($row = mysqli_fetch_assoc($in)){
                    $id = $row["q_id"];
                    //echo $id;

                    
            ?>
                <div class="container border border-dark mt-5">

                <div class="card">
                    <div class="card-body">
                        <p class="card-text"><?php echo $row["answer"]; ?></p>
                        
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