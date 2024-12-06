<?php
	session_start();
	require_once("connect.php"); // Connect to the database

	$sid = $_GET["sid"];
	$sql = "DELETE FROM supplier WHERE sid=$sid";
	$conn->query($sql) or die($conn->error);

	if ($conn->error == ""){
		$_SESSION["supplier_error"] = "Delete successful!";
	} else {
		$_SESSION["supplier_error"] = "Delete fail!";
	}

	$conn->close(); // Close the connection after checking for errors

	header("Location:supplier_view.php");
?>
