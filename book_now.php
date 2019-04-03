<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$phonenumber = $_POST['phonenumber'];
	$select_room = $_POST['selectroom'];
	$input_parents = $_POST['inputparents'];
	$input_kids = $_POST['inputkids'];
	$check_in_date = $_POST['check_in_date'];
	$check_out_date = $_POST['check_out_date'];

	if(!empty($firstname) || !empty($lastname) || !empty($phonenumber) || !empty($email) || !empty($address) || !empty($phonenumber) || !empty($select_room) || !empty($input_parents) || !empty($input_kids) || !empty($check_in_date) || !empty($check_out_date)) {
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbName = "NewHotelManagement";

		$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

		if($conn===false) {
			die('Connection Error()'.mysqli_connect_error());
		} else {
			$insert_into_db = "INSERT INTO RegisterForm(FirstName, LastName, Email, PhoneNumber, SelectRoom, InputParents, InputKids, CheckInDate, CheckOutDate) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

			/*$stmt = $conn->prepare($INSERT);
			$stmt->execute();
			$stmt->bind_result($Email);
			$stmt->store_result();
			$rnum = $stmt->num_rows;

			if($rnum == 0) {
				$stmt->close();
				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("ssissisiiii", $firstname, $lastname, $phonenumber, $email, $address, $phonenumber, $select_room, $input_parents, $input_kids, $check_in_date, $check_out_date);
				$stmt->execute();
				echo "New record has been succesfully insertted. ";
			} else {
				echo "Email is already under use. ";
			}
			$stmt->close();
			$conn->close();*/

			if(mysqli_query($conn, $insert_into_db)) {
				echo "Data Inserted succesfully...";
			} else {
				echo "Error ". $insert_into_db ."<br>". mysqli_error($conn);
			}

			mysqli_close($conn);
		}
	} else {
		echo "All fields are required. \n";
		die();
	}
?>