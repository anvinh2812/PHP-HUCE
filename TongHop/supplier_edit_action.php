<?php
	session_start();
	require_once("connect.php");

	$sid = $_GET["sid"];
	$sname = $_POST["txtSname"];
	$saddress = $_POST["txtSaddress"];
	$sphone = $_POST["txtSphone"];
	$stax = $_POST["nStax"];
	$sstatus = $_POST["nSstatus"];

	$sql = "SELECT * FROM supplier WHERE sname LIKE '$sname' AND sid <> $sid";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$_SESSION["supplier_edit_error"] = "$sname already exists!";
		header("Location:supplier_edit.php?sid=$sid");
	} else {
		$sql = "UPDATE supplier SET
			sname='$sname',
			saddress='$saddress',
			sphone='$sphone',
			stax=$stax,
			sstatus=$sstatus
			WHERE sid=$sid";
			
		$conn->query($sql) or die($conn->error);

		if ($conn->error == "") {
			$_SESSION["supplier_error"] = "Update Successful!";
			header("Location:supplier_view.php");
		} else {
			$_SESSION["supplier_edit_error"] = "Error updating data!";
			header("Location:supplier_edit.php?sid=$sid");
		}
	}

	$conn->close();
?>
