<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$tablenum = $_POST['tablenum'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','user_info',3310);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into main_info(name, email, tablenum) values(?, ?, ?)");
		$stmt->bind_param("ssi", $name, $email, $tablenum);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		header('location: order.html');
		$stmt->close();
		$conn->close();
	}
?>
