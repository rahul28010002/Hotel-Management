<?php
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "NewHotelManagement";
	$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

	if($conn == false) {
		die('Connection Error()'.mysqli_connect_error());
	}
	
	$output = 'SELECT FirstName, LastName, Email, PhoneNumber, SelectRoom, InputParents, InputKids, CheckInDate, CheckOutDate FROM RegisterForm';

	mysql_select_db('NewHotelManagement');
	$retrieve_value = mysql_query($output, $conn);

	if(!($retrieve_value)) {
		die('Unable to retrieve data: '.mysql_error());
	}

	while($row = mysql_fetch_array($retrieve_value, MYSQL_NUM)) {
		echo "FirstName: {$row[0]} <br>" . 
			"LastName: {$row[1]} <br>" . 
			"Email: {$row[2]} <br>" . 
			"PhoneNumber: {$row[3]} <br>" . 
			"SelectRoom: {$row[4]} <br>". 
			"InputParents: {$row[5]} <br>" . 
			"InputKids: {$row[6]} <br>" . 
			"CheckInDate: {$row[7]} <br>" . 
			"CheckOutDate: {$row[8]} <br>" . 
			"---------------------------- <br>";
	}

	mysql_free_result($retrieve_value);
	echo "Data fetched successfully. \n";
	mysql_close($conn);
?>