
<?php 
$update = false;
$delete = false;
include 'header.php';
if(!isset($_SESSION["loggedin"])){
	header('Location:index.php');
	  exit;
	}
include 'asidebar.php';
if(isset($_POST['delete'])){
  $d_id = $_POST['delete'];
 
  $sql = "DELETE FROM `doctor` WHERE `d_id` = $d_id";
  $result = mysqli_query($conn, $sql);
  $delete = true;
}
if(isset($_POST['verify'])){
  $d_id = $_POST['verify'];
  $edit = "Update doctor SET verification ='verified' where d_id = '$d_id'  ";
  $result = mysqli_query($conn, $edit);
  $update = true;
}
?>
<!-- design section-->
<?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your data has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
<div class = "right_content">
  <div class="container my-4" style="margin-left:0px">
	    <form method="POST" action="">
	    <table class="table table-striped" id="myTable">
	      	<thead>
			        <tr>
			          <th scope="col">d_id</th>
			          <th scope="col">first_name</th>
			          <th scope="col">last_name</th>
			          <th scope="col">email_id</th>
			          <th scope="col">contact_number</th>
			          <th scope="col">password</th>
			          <th scope="col">address</th>
			          <th scope="col">photo</th>
			          <th scope="col">hospital_name</th>
			          <th scope="col">certificate</th>
			          <th scope="col">specialist</th>
			          <th scope="col">verification</th>
			          <th scope="col">status</th>
			          <th colspan="2" style="text-align:center;">Action</th>
			        </tr>
	      	</thead>
	      <tbody>
	        <?php 
	          $sql = "SELECT * FROM `doctor`";
	          $result = mysqli_query($conn, $sql);
	          $d_id = 0;
	          while($row = mysqli_fetch_assoc($result)){
	            $d_id = $d_id + 1;
	            echo "<tr>
	            
	            <td>". $row['d_id'] . "</td>
	            <td>". $row['first_name'] . "</td>
	            <td>". $row['last_name'] . "</td>
	            <td>". $row['email_id'] . "</td>
	            <td>". $row['contact_number'] . "</td>
	            <td>". $row['password'] . "</td>
	            <td>". $row['address'] . "</td>
	            <td>";
	            ?>
	            <img style="width:100px; height:100px" src="/HappyPets/Photo/Doctor/<?php echo $row['photo']; ?>" />
	            <?php
	            echo "</td> <td>". $row['hospital_name'] . "</td>
	            <td>";
	            ?>
	            <img style="width:100px; height:100px" src="/HappyPets/Photo/verification/<?php echo $row['photo']; ?>" />
	            <?php
	            echo
	            "</td> <td>". $row['specialist'] . "</td>
	            <td>". $row['verification'] . "</td>
	            <td>". $row['status'] . "</td>";
	            $d_id = $row['d_id'];
	            echo " <td> <button class='verify btn btn-sm btn-primary' name='verify' id='verify' value='$d_id'>Verify</button></td> 
	            <td> <button class='delete btn btn-sm btn-primary' name='delete' id='delete' value='$d_id'>Delete</button></td>
	          </tr>";
	        	} 
	          ?>
      		</tbody>
    	</table>
    		</form>
  </div>
</div>
<?php
include 'footer.php';
?>