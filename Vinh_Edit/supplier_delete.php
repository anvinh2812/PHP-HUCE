<?php
	session_start();
	require_once("connect.php"); //kết nối CSDL
	$sid = $$_POST["sid"];
	$sql = "delete from supplier where sid=$sid";
	$conn->query($sql) or die($conn->error);
	$conn->close();
	if ($conn->error==""){
		$_SESSION["supplier_error"]="Delete successful!";
	} else {
		$_SESSION["supplier_error"]="Delete fail!";
	}
	header("Location:supplier_view.php");
?>