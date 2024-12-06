<?php
    session_start();
    require_once("connect.php");

    $sname = $_POST["txtSname"];
    $saddress = $_POST["txtSaddress"];
    $sphone = $_POST["txtSphone"];
    $stax = $_POST["nStax"];
    $sstatus = $_POST["nSstatus"];

    $sql = "select * from supplier where sname like '$sname'";
    if ($result->num_rows>0){
		$_SESSION["supplier_add_error"]="$cname adready exist!";
		header("Location:supplier_add.php");
	} else {
			$sql ="insert into supplier(sname, saddress, sphone, stax, sstatus) values ('$sname','$saddress','$sphone',$stax,$sstatus)";
			$conn->query($sql) or die($conn->error);
			if ($conn->error==""){
				$_SESSION["supplier_error"] = "Update Successful!";
				header("Location:supplier_view.php");
			} else {
				$_SESSION["supplier_add_error"]="Error insert data!";
				header("Location:supplier_add.php");
			}
	}
?>