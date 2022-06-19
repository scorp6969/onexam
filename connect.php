<?php
// database connection
$host = "localhost";
$user = "root";
$pass = "root1234";
$db = "sample";

$email = $_POST['email'];
$passwd = $_POST['password'];

// process 1

// $con = new mysqli($host,$user,$pass,$db);
// if (!$con) {
//   echo "Database not connected!";
// }

// $qry = "INSERT INTO `idpass` (`e_id`, `email`, `password`) VALUES (NULL, '$email', '$passwd')";
// $submit = mysqli_query($con, $qry);
// if(!$submit){
//   echo "Database not connected!";
// }else{
//   echo "Submitted Successfully";
// }

// process 2
$conn = new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
  die('Connection failed: '.$conn->connect_error);
}else{
  $stmt = $conn->prepare('INSERT INTO `idpass` (`e_id`, `email`, `password`) VALUES (Null, ?, ?)');
  $stmt->bind_param("ss", $email, $passwd);
  $stmt->execute();
  echo 'Submitted Successfully';
  $stmt->close();
  $conn->close();
}

?>