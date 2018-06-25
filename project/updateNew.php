<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>id6296780_karwa WebApp</title>
<style>
a:link {
	text-decoration:none;
    color: white;
    background-color: transparent;
	font-size:175%;
	font-family:Century Gothic ;
}
a:visited {
	text-decoration:none;
    color: white;
    background-color: transparent;
	font-size:175%;
	font-family:Century Gothic ;
}
a:hover {
	text-decoration:none;
    color: yellow;
    background-color: transparent;
	font-size:175%;
	font-family:Century Gothic ;
}
</style>
<?php

$bookID = $_GET['bookingID'];
$_SESSION['bookID'] = $bookID;

$link = mysqli_connect('localhost','id6296780_awasay','islamispeace786','id6296780_karwa','3306');
	 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	$sql = "Select * from Booking where BookingID = '$bookID';";
	
	$result = mysqli_query($link, $sql);
	
	$count = mysqli_num_rows($result);


	if ($count > 0) {
		$row = mysqli_fetch_row($result);
	}
	
?>
</head>
<body bgcolor="#00e6e6">
	<p style="text-align:center">
	<img src="id6296780_karwa.png" style= "width:100px;height:100px;";>
	</p>
	<p  style="color:white; font-family:Century Gothic ; font-size:250%; text-align: center;">  Update Booking</p>
<form action="updates.php" method="post" style="color:white; font-family:Century Gothic ; font-size:120%; text-align: center;">
	<p style= "align=center; font-family:Century Gothic ; color:white; font-weight: bold;" >
    	<label for="departure">Pick Up Location:</label><br>
        <input type="text" value = "<?php echo $row[11]; ?>" name="departure" id="departure">
    </p>
    <p style= "align=center; font-family:Century Gothic ; color:white; font-weight: bold;">
    	<label for="destination">Drop Off Location:</label><br>
		<?php echo $row[5]; ?>
        <input type="text" value = "<?php echo $row[5]; ?>" name="destination" id="destination">
	
    </p>
	<p style= "align=center; font-family:Century Gothic ; color:white; font-weight: bold;" >
    	<label for="pickTime">Pick Up Time:</label><br>
        <input type="time" value = "<?php echo $row[9]; ?>" name="pickTime" id="pickTime">
    </p>
	<p style= "align=center; font-family:Century Gothic ;color:white; font-weight: bold;" >
    	<label for="pickDate">Pick Up Date: <br>(Input in this format: yyyy/mm/dd)*</label><br>
        <input type="text" value = "<?php echo $row[8]; ?>" name="pickDate" id="pickDate">
    </p>
	<p style= "align=center; font-family:Century Gothic ;color:white; font-weight: bold;" >
    	<label for="extraDetails">Extra Information:</label><br>
        <input type="text" value = "<?php echo $row[12]; ?>" name="extraDetails" id="extraDetails">
    </p>
    <input align="center"  type="submit" value="Update Booking">
	<form align="center" action="message.html">
</form>
</p>
<form action="Booking.html" method="post" style="color:white; font-family:Century Gothic ; font-size:120%; text-align: center;">
    <input type="submit" value="Go Back" />
</form>


</body>
</html>