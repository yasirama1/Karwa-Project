<?php
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
session_start();
$link = mysqli_connect('localhost','id6296780_awasay','islamispeace786','id6296780_karwa','3306');
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$destination = $_POST['destination'];
$departure = $_POST['departure'];
$pickTime = $_POST['pickTime'];
$pickDate = $_POST['pickDate'];
$extraDetails = $_POST['extraDetails'];
$mobileNumber = $_SESSION['mobileNumber'];
$taxiID = 321321;
$driverID = 2;
$bookingID = rand(0, 999999);
$date = date("Y-m-d");
$time = date("h:i:sa");
$fare = rand(40, 100);
$eta = rand(10, 20);
// attempt insert query execution
$sql = "INSERT INTO Booking (TaxiID,DriverID,BookingID,mobileNumber,ETA,DropOffLocation,bookingTime, bookingDate,
pickUpDate, pickUpTime,TotalFare, PickUpLocation, AddBookingInfo) 
		VALUES ('$taxiID','$driverID', '$bookingID', '$mobileNumber','$eta', '$destination', '$time', '$date',
		'$pickTime', '$pickDate', '$fare', '$departure','$extraDetails');";

if(mysqli_query($link, $sql)){
    header('Location: BookingUpdated.html');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>

