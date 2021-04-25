<?php 
include 'header.php';
if(!isset($_SESSION["loggedin"])){
	header('Location:index.php');
	  exit;
	}
include 'asidebar.php';
?>
<div class = "right_content">
	<h3>Manage Products </h3>
</div>
<?php
include 'footer.php';
?>