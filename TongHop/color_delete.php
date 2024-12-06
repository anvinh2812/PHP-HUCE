<?php
	session_start();
	require_once("connect.php"); // Connect to the database

	$colorid = $_GET["colorid"];
	$sql = "DELETE FROM color WHERE colorid=$colorid";
	$conn->query($sql) or die($conn->error);

	if ($conn->error == ""){
		$_SESSION["color_error"] = "Delete successful!";
	} else {
		$_SESSION["color_error"] = "Delete fail!";
	}

	$conn->close(); // Close the connection after checking for errors

	header("Location:color_view.php");
?>
