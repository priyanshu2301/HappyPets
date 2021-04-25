
<!-- side navbar code starts from here-->
  <div id="navigation bar"class="sidenav bg-dark sidenav-dark" data-color="light" data-mode="side" data-hidden="false"
    data-scroll-container="#scrollContainer"
    style="width: 205px; height:calc(100vh - 270px);position:sticky; transition: all 0.3s linear 0s; transform: translateX(0%);">
    <div id="scrollContainer" class="ps ps--active-y" style="max-height: calc(100% - 244px); position: sticky;">
      <ul class="sidenav-menu">
      <?php 
          $user_id = $_SESSION['user_id'];
          if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Petowner'){
            ?>
              <li class="nav-item" style="margin-left:-35px;">
                <a class="nav-link active" aria-current="page" href="petowner.php?editprofile=<?php echo $user_id; ?>">
                  <h6 style="color:white">Edit Profile</h6>
                </a>
              </li>
              <li class="nav-item" style="margin-left:-35px;">
                <a class="nav-link active" aria-current="page" href="petowner.php?c_hirehistory=<?php echo $user_id; ?>">
                  <h6 style="color:white">Caretaker History</h6>
                </a>
              </li>
              <li class="nav-item" style="margin-left:-35px;">
                <a class="nav-link active" aria-current="page" href="petowner.php?d_hirehistory=<?php echo $user_id; ?>">
                  <h6 style="color:white">Doctor History</h6>
                </a>
              </li>
              <?php 
          }
         elseif(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Caretaker'){
            ?>
              <li class="nav-item" style="margin-left:-35px;">
                <a class="nav-link active" aria-current="page" href="caretaker.php?c_editprofile=<?php echo $user_id; ?>">
                  <h6 style="color:white">Edit details</h6>
                </a>
              </li>
              <li class="nav-item" style="margin-left:-35px;">
                <a class="nav-link active" aria-current="page" href="caretaker.php?c_clientreq=<?php echo $user_id; ?>">
                  <h6 style="color:white">Client Request</h6>
                </a>
              </li>
              <li class="nav-item" style="margin-left:-35px;">
                <a class="nav-link active" aria-current="page" href="caretaker.php?c_workhistory=<?php echo $user_id; ?>">
                  <h6 style="color:white">Work history</h6>
                </a>
              </li>  
              <li class="nav-item" style="margin-left:-35px;">
                <a class="nav-link active" aria-current="page" href="caretaker.php?c_feedback=<?php echo $user_id; ?>">
                  <h6 style="color:white">Feedback</h6>
                </a>
              </li>  
              <?php 
         }
          elseif(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Doctor'){
            ?>
              <li class="nav-item" style="margin-left:-35px;">
                <a class="nav-link active" aria-current="page" href="doctor.php?editprofile=<?php echo $user_id; ?>">
                  <h6 style="color:white">Edit Profile</h6>
                </a>
              </li>
              <li class="nav-item" style="margin-left:-35px;">
                <a class="nav-link active" aria-current="page" href="doctor.php?clientreq=<?php echo $user_id; ?>">
                  <h6 style="color:white">Client Req</h6>
                </a>
              </li>
              <li class="nav-item" style="margin-left:-35px;">
                <a class="nav-link active" aria-current="page" href="doctor.php?d_workhistory=<?php echo $user_id; ?>">
                  <h6 style="color:white">Work history</h6>
                </a>
              </li>  
              <li class="nav-item" style="margin-left:-35px;">
                <a class="nav-link active" aria-current="page" href="doctor.php?feedback=<?php echo $user_id; ?>">
                  <h6 style="color:white">Feedback</h6>
                </a>
              </li>  
              <?php 
          }
          elseif(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Seller'){
            ?>
              <li class="nav-item" style="margin-left:-35px;">
                <a class="nav-link active" aria-current="page" href="seller.php?editprofile=<?php echo $user_id; ?>">
                  <h6 style="color:white">Edit profile</h6>
                </a>
              </li>
              <li class="nav-item" style="margin-left:-35px;">
                <a class="nav-link active" aria-current="page" href="seller.php?feedback=<?php echo $user_id; ?>">
                  <h6 style="color:white">Feedback</h6>
                </a>
              </li>
              <li class="nav-item" style="margin-left:-35px;">
                <a class="nav-link active" aria-current="page" href="seller.php?addProduct=<?php echo $user_id; ?>">
                  <h6 style="color:white">Add Product</h6>
                </a>
              </li>
              <li class="nav-item" style="margin-left:-35px;">
                <a class="nav-link active" aria-current="page" href="seller.php?myProducts=<?php echo $user_id; ?>">
                  <h6 style="color:white">My Products</h6>
                </a>
              </li>
              <li class="nav-item" style="margin-left:-35px;">
                <a class="nav-link active" aria-current="page" href="seller.php?Orders=<?php echo $user_id; ?>">
                  <h6 style="color:white">Orders</h6>
                </a>
              </li>  
              <?php
          }
          ?>
      </ul>
    </div>
  </div>
  <style>
.sidenav
{
  float:left; margin-right:15px;
}
.right_content
{
  height: calc(100vh - 280px);
  overflow-y: auto;
  overflow-x: auto;
}
</style>
  