<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phonenumber = $_POST['mobilenumber'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	if(!empty($firstname) || !empty($lastname) || !empty($phonenumber) || !empty($email) || !empty($message)) {
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbName = "NewHotelManagement";

		$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

		if($conn===false) {
			die('Connection Error()'.mysqli_connect_error());
		} else {
			$SELECT = "SELECT Email From ContactForm WHERE Email = ? Limit 1";
			$INSERT = "INSERT INTO ContactForm(FirstName, LastName, Email, PhoneNumber, Message) values(?, ?, ?, ?, ?)";

			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("s", $Email);
			$stmt->execute();
			$stmt->bind_result($Email);
			$stmt->store_result();
			$rnum = $stmt->num_rows;

			if($rnum == 0) {
				$stmt->close();
				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("sssis", $firstname, $lastname, $phonenumber, $email, $message);
				$stmt->execute();
				echo "New record has been succesfully insertted. ";
			} else {
				echo "Email is already under use. ";
			}
			$stmt->close();
			$conn->close();
		}
	} else {
		echo "All fields are required. \n";
		die();
	}
?>