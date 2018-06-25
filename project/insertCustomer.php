<?php
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
$link = mysqli_connect('localhost','id6296780_awasay','islamispeace786','id6296780_karwa','3306');
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$email = $_POST['e_mail'];
$first = $_POST['f_name'];
$last = $_POST['l_name'];
$mobile = $_POST['mobile_number'];
$pass = $_POST['password'];
// attempt insert query execution
$sql = "INSERT INTO Customer (Email, FirstName, LastName, mobileNumber, password ) VALUES ('$email', '$first','$last','$mobile', '$pass')";

if(mysqli_query($link, $sql)){
    echo "User created successfully.";
	header("location: loginPage.html");
} else{
    header("location: addCustomerError.html");
}
 
// close connection
mysqli_close($link);
?>