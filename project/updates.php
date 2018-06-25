<?php

	session_start();

	$link = mysqli_connect('localhost','id6296780_awasay','islamispeace786','id6296780_karwa','3306');
	 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	$bookingID = $_SESSION['bookID'];
	$destination = $_POST['destination'];
	$departure = $_POST['departure'];
	$pickTime = $_POST['pickTime'];
	$pickDate = $_POST['pickDate'];
	$extraDetails = $_POST['extraDetails'];

	$sql = "UPDATE Booking
			SET DropOffLocation = '$destination' , pickUpDate = '$pickDate' , pickUpTime = '$pickTime', PickUpLocation = '$departure', AddBookingInfo= '$extraDetails'
			WHERE BookingID = '$bookingID';";		
	
	$result = mysqli_query($link, $sql);
	if($result){
		header("location: updateDone.html");
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	 
	mysqli_close($link);
	
?>
