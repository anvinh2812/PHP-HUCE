<?php
	session_start();
	require_once("connect.php"); // Kết nối CSDL
	$pid = $_GET["pid"];
	$sql = "DELETE FROM product WHERE pid=$pid";
	$conn->query($sql) or die($conn->error);

	if ($conn->error == ""){
		$_SESSION["product_error"] = "Delete successful!";
	} else {
		$_SESSION["product_error"] = "Delete fail!";
	}

	$conn->close(); // Close the connection after checking for errors

	header("Location:product_view.php");
?>
