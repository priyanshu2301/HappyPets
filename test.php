<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "happypets";

$conn = mysqli_connect($servername, $username, $password, $db);

// check connection
if (!$conn){
  die("connection was not successful : ". mysqli_connect_error());
} else {
  echo "connection was successful";
}

?>


query for inserting data:
petOwner table :-
INSERT INTO `petowner` (`u_id`, `first_name`, `last_name`, `email_id`, `contact_number`, `password`, `address`, `photo`)
   VALUES ('1', 'priyanshu', 'patel', 'priyanshu@gmail.com', '7359911956', '#2003Pri',
     'prih  udhusd oisd o oisdj osdkj  oid', 'C:\\Users\\Priyanshu\\Pictures\\Screenshots\\Home.png');

INSERT INTO `petowner` (`u_id`, `first_name`, `last_name`, `email_id`, `contact_number`, `password`, `address`, `Gender`, `photo`)
VALUES (NULL, 'bill', 'gates', 'bill@gates,com', '9995556662', '896523', 'USA', '1', NULL);

Gender:
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="male">Male
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="other") echo "checked";?>
value="other">Other