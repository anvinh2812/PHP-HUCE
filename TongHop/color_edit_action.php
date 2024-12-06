<?php
	session_start();
	require_once("connect.php"); // Connect to the database

	$colorid = $_GET["colorid"];
	$colorname = $_POST["txtColorname"];
	$colorstatus = $_POST["nColorstatus"];

	$sql = "SELECT * FROM color WHERE colorname LIKE '$colorname' AND colorid <> $colorid";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$_SESSION["color_edit_error"] = "$colorname already exists!";
		header("Location:color_edit.php?colorid=$colorid");
	} else {
		$sql = "UPDATE color SET
			colorname='$colorname',
			colorstatus=$colorstatus
			WHERE colorid=$colorid";
			
		$conn->query($sql) or die($conn->error);

		if ($conn->error == "") {
			$_SESSION["color_edit_error"] = "Update Successful!";
			header("Location:color_view.php");
		} else {
			$_SESSION["color_edit_error"] = "Error updating data!";
			header("Location:color_edit.php?colorid=$colorid");
		}
	}

	$conn->close();
?>
