<?php 
	session_start();
	require_once("connect.php"); // Kết nối CSDL
	
	$pname = $_POST["txtPname"];
	$pdesc = $_POST["taPdesc"];
	$pimage = $_POST["txtPimage"];
	$porder = $_POST["txtPorder"];
	$cid = $_POST["selCategory"];
	$pstatus = $_POST["rdPstatus"];
	$pinsertdate = $_POST["txtPinsertdate"];
	$pupdatedate = $_POST["txtPupdatedate"];
	$pprice = $_POST["txtPprice"];
	$pquantity = $_POST["txtPquantity"];
	
	// Lấy PID lớn nhất hiện có và tăng nó lên 1
	$max_pid_result = $conn->query("SELECT MAX(pid) AS max_pid FROM product");
	$max_pid_row = $max_pid_result->fetch_assoc();
	$new_pid = $max_pid_row['max_pid'] + 1;
	
	$sql = "INSERT INTO product (pid, pname, pdesc, pimage, porder, pinsertdate, pupdatedate, pprice, pquantity, cid, pstatus)
	        VALUES ($new_pid, '$pname', '$pdesc', '$pimage', $porder, '$pinsertdate', '$pupdatedate', $pprice, $pquantity, $cid, $pstatus)";
	$conn->query($sql) or die($conn->error);
	
	if ($conn->error == ""){
		$_SESSION["product_error"] = "Insert successful!";
		header("Location:product_view.php");
	} else {
		$_SESSION["product_error"] = "Insert fail!";
		header("Location:product_add.php");
	}
	
	$conn->close();
?>
