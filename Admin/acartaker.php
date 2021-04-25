<?php
$delete = false; 
include 'header.php';
if(!isset($_SESSION["loggedin"])){
	header('Location:index.php');
	  exit;
	}
include 'asidebar.php';

  if(isset($_POST['delete'])){
  $c_id = $_POST['delete'];
 
  $sql = "DELETE FROM `caretaker` WHERE `c_id` = $c_id";
  $result = mysqli_query($conn, $sql);
  $delete = true;

  }
?>
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
		<div class="container my-4" style="margin-left:0px;">
		  <form action="" method="POST">
		    <table class="table table-striped" id="myTable">
		      <thead>
		        <tr>
		          <th scope="col">c_id</th>
		          <th scope="col">first_name</th>
		          <th scope="col">last_name</th>
		          <th scope="col">email_id</th>
		          <th scope="col">contact_number</th>
		          <th scope="col">password</th>
		          <th scope="col">address</th>
		          <th scope="col">date_of_birth</th>
		          <th scope="col">photo</th>
		          <th scope="col">status</th>
		          <th scope="col">specialist</th>
		          <th scope="col">Action</th>
		        </tr>
		      </thead>
		      <tbody>
			        <?php 
			          $sql = "SELECT * FROM `caretaker`";
			          $result = mysqli_query($conn, $sql);
			          $c_id = 0;
			          while($row = mysqli_fetch_assoc($result)){
			            $c_id = $c_id + 1;
			            echo "<tr>
			            
			            <td>". $row['c_id'] . "</td>
			            <td>". $row['first_name'] . "</td>
			            <td>". $row['last_name'] . "</td>
			            <td>". $row['email_id'] . "</td>
			            <td>". $row['contact_number'] . "</td>
			            <td>". $row['password'] . "</td>
			            <td>". $row['address'] . "</td>
			            <td>". $row['date_of_birth'] . "</td>
			            <td>"
			            ?>
			            <img style="width:100px; height:100px" src="/HappyPets/Photo/careTaker/<?php echo $row['photo']; ?>" />
			            <?php
			            echo "</td>
			            <td>". $row['status'] . "</td>
			            <td>". $row['specialist'] . "</td>";
			            $c_id = $row['c_id'];
			           echo "<td> <button class='delete btn btn-sm btn-primary' name='delete' id='delete' value='$c_id'>Delete</button>  </td>
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