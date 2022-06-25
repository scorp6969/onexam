<?php
// database connection
$host = "localhost";
$user = "root";
$pass = "root1234";
$db = "userinfo";

$email = $_POST['email'];
$passwd = $_POST['password'];

// process 1
$con = new mysqli($host,$user,$pass,$db);
if (!$con) {
  die('Connection failed: '.mysqli_connect_error());
}
else{
  echo "Successful Connection";
  
}

$qry = "INSERT INTO `userinfodata` (`id`, `email`, `password`) VALUES (NULL, '$email', '$passwd')";
$submit = mysqli_query($con, $qry);
if($submit){
  echo "New record created successfully";
  echo "$submit";
} else {
  echo "Error: " . $qry . "<br>" . mysqli_error($con);
}
mysqli_close($con);

// process 2
// $conn = new mysqli($host,$user,$pass,$db);
// if($conn->connect_error){
//   die('Connection failed: '.$conn->connect_error);
// }
// else{
//   $stmt = $conn->prepare("INSERT INTO `userinfodata` (`id`, `email`, `password`) VALUES (Null, ?, ?)");
//   $stmt->bind_param("ss", $email, $passwd);
//   $stmt->execute();
//   echo 'Submitted Successfully';
//   $stmt->close();
//   $conn->close();
// }

?>