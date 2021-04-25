<?php
include'header.php';
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST["email_id"];
    $password = $_POST["password"];

   // if(!isset($_POST['']))
    //{
      //  $showError = "Select login type";
    //}
    // for petowner
    if(isset($_POST['petowner']))
    {
        $sql = "Select u_id,email_id, password from petowner where email_id ='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $num = mysqli_num_rows($result);
        if ($num == 1)
        {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_type'] = $_POST['petowner'];
            $_SESSION['user_id'] = $row['u_id'];
            header("location: welcome.php");
        } 
        else
        {
            $showError = "Invalid email or password";
        }
    }

    //for caretaker
    elseif(isset($_POST['caretaker']))
    {
        $sql = "Select c_id,email_id, password from caretaker where email_id ='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $num = mysqli_num_rows($result);
        if ($num == 1)
        {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_type'] = $_POST['caretaker'];
            $_SESSION['user_id'] = $row['c_id'];
            header("location: caretaker.php");
        } 
        else
        {
            $showError = "Invalid email or password";
        }
    }

    //for doctor
    elseif(isset($_POST['doctor']))
    {
        $sql = "Select d_id, email_id, password, verification from doctor where email_id ='$email' AND password='$password' AND verification = 'verified' ";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $num = mysqli_num_rows($result);
        if ($num == 1)
        {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_type'] = $_POST['doctor'];
            $_SESSION['user_id'] = $row['d_id'];
            header("location: doctor.php");
        } 
        else
        {
            $showError = "Invalid email or password";
        }
    }

    //for seller
    elseif(isset($_POST['seller']))
    {
        $sql = "Select s_id,email_id, password from seller where email_id ='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $num = mysqli_num_rows($result);
        if ($num == 1)
        {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_type'] = $_POST['seller'];
             $_SESSION['user_id'] = $row['s_id'];
            header("location: seller.php");
        } 
        else
        {
            $showError = "Invalid email or password";
        }
    }
    

}    
?>

        <!--navbar code starts here-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Home
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link" href=""></a>
                </li>
            </ul>
            <a href="register.php"><button type="button" class="btn btn-outline-success">Register</button></a>
    </div>
  </nav>

  <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
        <h2 class="mx-5 mt-4">Log In</h2>
        <!-- form -->
        <form method = "post">
            <div class="form-group w-75 p-3 mx-4">
            <label for="email_id">Email address</label>
            <input type="email" class="form-control" id="email_id" name = "email_id" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            
            <div class="form-group w-75 p-3 mx-4">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group w-75 p-3 mx-4">
            <div class="btn-group" role="group" aria-label="Basic example">
            <label for="log">Log in As: </label>
            <button type="submit" name="petowner" id="petowner" class="btn btn-secondary ml-5" value="Petowner" required>Petowner</button>
            <button type="submit" name="caretaker" id="caretaker" class="btn btn-secondary" value="Caretaker" required>Caretaker</button>
            <button type="submit" name="doctor" id="doctor" class="btn btn-secondary" value="Doctor" required>Doctor</button>
            <button type="submit" name="seller" id="seller" class="btn btn-secondary" value="Seller" required>Seller</button>
            </div>
            </div>
        </form>
<?php include'footer.php'?>
