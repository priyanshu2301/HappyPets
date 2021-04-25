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
  $q_id = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `question_answer` WHERE `q_id` = $q_id";
  $result = mysqli_query($conn, $sql);
}
?>
<?php
  if($delete){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> You data has been deleted successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
?>

<div class = "right_content">
  <div class="container my-4" style="margin-left:0px;">
    <table class="table table-striped" id="myTable">
      <thead>
        <tr>
          <th scope="col">q_id</th>
          <th scope="col">email_id</th>
          <th scope="col">question</th>
          <th scope="col">answer</th>
          <th scope="col">que_date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `question_answer`";
          $result = mysqli_query($conn, $sql);
          $q_id = 0;
          while($row = mysqli_fetch_assoc($result)){
            $q_id = $q_id + 1;
            echo "<tr>
            
            <td>". $row['q_id'] . "</td>
            <td>". $row['email_id'] . "</td>
            <td>". $row['question'] . "</td>
            <td>". $row['answer'] . "</td>
            <td>". $row['que_date'] . "</td>
            <td> <button class='delete btn btn-sm btn-primary' id=d".$row['q_id'].">Delete</button>  </td>
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
        q_id = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this data!")) {
          console.log("yes");
          window.location = `/final-year-project-master/a_qa.php?delete=${q_id}`;
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