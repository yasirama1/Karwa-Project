<?php
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
session_start();
$link = mysqli_connect('localhost','id6296780_awasay','islamispeace786','id6296780_karwa','3306');
if($link === false){
// Check connection
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$mob_no = $_POST['mobileNumber'];
$password = $_POST['password'];


// attempt insert query execution
$sql = "select * from Customer where mobileNumber = $mob_no AND password = '$password';";
$result = mysqli_query($link,$sql);
$count = mysqli_num_rows($result);

if($count > 0) {
   $_SESSION['mobileNumber'] = $mob_no;
   header("location: Menu.html");
}else {
   header("location: loginError.html");
}
 
// close connection
mysqli_close($link);
?>

