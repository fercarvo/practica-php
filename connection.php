<?php

	$servername = "localhost";
	$username = "admin";
	$password = "1991";
	$dbname = "practica_php";

	// Create connection
// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// prepare and bind
	$stmt = $conn->prepare('INSERT INTO donaciones (nombre, apellido, donacion) VALUES (?, ?, ?)');
	$stmt->bind_param('ssd', $nombre, $apellido, $donacion);

	$nombre = $_POST['inputNombre'];
	$apellido = $_POST['inputApellido'];
	$donacion = $_POST['inputCantidad'];
	$stmt->execute();

	$stmt->close();
	$conn->close();
	header("location: home.php");
?>