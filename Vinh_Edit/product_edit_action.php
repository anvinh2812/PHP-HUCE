<?php
	session_start();
	require_once("connect.php"); // Kết nối CSDL

	$pid = $_GET["pid"];
	$pname = $_POST["txtPname"];
	$pdesc = $_POST["taPdesc"];
	$pimage = $_POST["txtPimage"];
	$porder = $_POST["txtPorder"];
	$pinsertdate = $_POST["txtPinsertdate"];
	$pupdatedate = $_POST["txtPupdatedate"];
	$pprice = $_POST["txtPprice"];
	$pquantity = $_POST["txtPquantity"];
	$cid = $_POST["txtCid"];
	$pstatus = $_POST["rdPstatus"];

	$sql = "SELECT * FROM product WHERE pname LIKE '$pname' AND pid <> $pid";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$_SESSION["product_edit_error"] = "$pname already exists!";
		header("Location:product_edit.php?pid=$pid");
	} else {
		$sql = "UPDATE product SET
			pname='$pname',
			pdesc='$pdesc',
			pimage='$pimage',
			porder=$porder,
			pinsertdate='$pinsertdate',
			pupdatedate='$pupdatedate',
			pprice=$pprice,
			pquantity=$pquantity,
			cid=$cid,
			pstatus='$pstatus'
			WHERE pid=$pid";
			
		$conn->query($sql) or die($conn->error);

		if ($conn->error == "") {
			$_SESSION["product_error"] = "Update Successful!";
			header("Location:product_view.php");
		} else {
			$_SESSION["product_edit_error"] = "Error updating data!";
			header("Location:product_edit.php?pid=$pid");
		}
	}

	$conn->close();
?>
