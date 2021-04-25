<?php 
include 'header.php';
if(!isset($_SESSION["loggedin"])){
  header('Location:index.php');
    exit;
  }
include 'asidebar.php';
$insert = false;
$update = false;
$delete = false;
if(isset($_GET['delete'])){
  $pt_id = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `adaption_list` WHERE `pt_id` = $pt_id";
  $result = mysqli_query($conn, $sql);
}
?>

<?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert' style='width:100%;'>
    <strong>Success!</strong> Your data has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>

<div class = "right_content">
  <div class="container my-4" style="margin-left:0px">
    <table class="table table-striped" id="myTable">
      <thead>
        <tr>
          <th scope="col">pt_id</th>
          <th scope="col">c_id</th>
          <th scope="col">first_name</th>
          <th scope="col">last_name</th>
          <th scope="col">email_id</th>
          <th scope="col">contact_number</th>
          <th scope="col">pet_type</th>
          <th scope="col">address</th>
          <th scope="col">pet_photo</th>
          <th scope="col">pet_description</th>
          <th scope="col">pet_breed</th>
          <th scope="col">pet_date_of_birth</th>
          <th scope="col">pet_price</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `adaption_list`";
          $result = mysqli_query($conn, $sql);
          $pt_id = 0;
          while($row = mysqli_fetch_assoc($result)){
            $pt_id = $pt_id + 1;
            echo "<tr>
            
            <td>". $row['pt_id'] . "</td>
            <td>". $row['u_id'] . "</td>
            <td>". $row['first_name'] . "</td>
            <td>". $row['last_name'] . "</td>
            <td>". $row['email_id'] . "</td>
            <td>". $row['contact_number'] . "</td>
            <td>". $row['pet_type'] . "</td>
            <td>". $row['address'] . "</td>
            <td>". $row['pet_photo'] . "</td>
            <td>". $row['pet_description'] . "</td>
            <td>". $row['pet_breed'] . "</td>
            <td>". $row['pet_date_of_birth'] . "</td>
            <td>". $row['pet_price'] . "</td>
            <td> <button class='delete btn btn-sm btn-primary' id=d".$row['pt_id'].">Delete</button>  </td>
          </tr>";
        } 
          ?>
      </tbody>
    </table>
  </div>
</div>

<script>
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        pt_id = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this data!")) {
          console.log("yes");
          window.location = `/final-year-project-master/a_al.php?delete=${pt_id}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
<?php
include 'footer.php';
?>