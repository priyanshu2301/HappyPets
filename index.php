<?php 
  include 'header.php';
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
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="DocList.php">Doc list</a>
          <a class="dropdown-item" href="CaretakerList.php">Caretaker list</a>
          <a class="dropdown-item" href="adoption.php">Adoption List</a>
          <a class="dropdown-item" href="FAQ.php">FaQ</a>
          <a class="dropdown-item" href="store.php">Store</a>
        </div>
      </li>
      </ul>
      <a href="register.php"><button type="button" class="btn btn-outline-success mr-1">Register</button></a>
      <a href="login.php"><button type="button" class="btn btn-outline-success">Log In</button></a>

    </div>
  </nav>

  <!-- slider code starts from here-->

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/dog_image_6.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/bird_image_1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/cat_image_2.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>



  <!-- cards code start from here -->

  <div class="card mb-3 mt-5 container-sm">
    <img src="images/others/card_image_1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Find Caretaker For Your Pet</h5>
      <p class="card-text">
      A good pet sitter recognizes the needs of your pet and responds to them. The person should realize when 
      your cat doesn’t want to play anymore and give her space. Look for someone who handles your pet 
      affectionately and never uses physical punishment or force, like dragging on your dog's leash during a 
      walk.</p>
      
    </div>
  </div>

  <div class="card mb-3 mt-5 container-sm">
    <img src="images/others/card_image_2.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Works As Caretaker</h5>
      <p class="card-text">Pet sitting is a good option because anyone — from teens to retirees — can get pet 
      sitter jobs. The only requirements for this line of work are that you are comfortable around animals and 
      you like people.</p>
      
    </div>
  </div>

  <div class="card mb-3 mt-5 container-sm">
    <img src="images/others/card_image_3.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Adopt a Pet!</h5>
      <p class="card-text">A pet is a companion that will never judge you, will love you regardless of 
      whatever happens and will always be there. As well as making you feel great, their unconditional love 
      raises your self-esteem because of the affection they show you. It is said that animals know when they 
      have been rescued, so the bond between you and your rehomed pet will be especially strong.</p>
      
    </div>
  </div>

  <div class="card mb-3 mt-5 container-sm">
    <img src="images/others/dog_image_3.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Find Help And a Helper in Your Area</h5>
      <p class="card-text">Especially when your work schedule is subject to change, it’s advantageous to have 
      a pet sitter who is flexible and can step in on short notice. That way, if you have an important 
      appointment or need to stay late at the office, you can trust your pet will be taken care of.</p>
      
    </div>
  </div>


  
<?php
include 'footer.php';
?>