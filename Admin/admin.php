
<?php
	include 'header.php'; 
	if(!isset($_SESSION["loggedin"])){
      header('Location:index.php');
        exit;
      }
  include 'asidebar.php';
?>  
 <div class = "right_content">
      <!-- start cards from here -->
      <div style="margin: 0px 0px 0px 0px;" class="d-flex align-items-start bd-highlight mb-3">  
        <div class="col-sm-4 mt-5">
            <div class="dat mb-3">
            <div class="card-body" style="position: relative;">
            <div id="clock">
            <p class="date"> <?php
                echo date("M,d,Y") . "\n"; ?></p>
            <p class="time"><?php
               date_default_timezone_set('Asia/Kolkata');
                echo date('H:i:A');
                ?></p>
        </div>
            </div>
            </div>
        </div>
      <style>
          .dat
          {
            background: radial-gradient(ellipse at center, #0a2e38 0%, #000000 70%);
            letter-spacing: 0.05em;
            font-size: 35px;
            font-family: "Share Tech Mono", monospace;
            color: #ffffff;
            text-shadow: 0 0 20px #0aafe6, 0 0 20px rgb(10 175 230 / 0%);
            max-width: 18rem;
            height: 169px;
            text-align: center;
            background-color:#0f3854;
          }
      </style>  
        
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width:18rem;">
            <div class="card-header">Request Received</div>
            <div class="card-body">
            <h4 class="card-title">50</h4>
            <a class="btn text-white" href="#">View</a>
            </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width:18rem;">
            <div class="card-header">FAQ</div>
            <div class="card-body">
            <h4 class="card-title">23</h4>
            <a class="btn text-white" href="#">View</a>
            </div>
            </div>
        </div>
      </div>
</div>
</div>
<?php 
include 'footer.php';
?>

