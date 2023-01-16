<?php
	$id = $_GET['id'];
	
	$servername = "localhost";
	$username = "lab5";
	$password = "lab5";
	$databasename = "blog";


	$conn = new mysqli($servername, $username, $password, $databasename);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "DELETE FROM posts WHERE id='$id'";
	$result = mysqli_query($conn, $sql);

	$conn->close();

header("Location: http://localhost/lab5/list.php", TRUE, 301);
exit( );