<?php 
	session_start();
	require_once("connect.php");

	if (!isset($_SESSION["product_edit_error"])){
		$_SESSION["product_edit_error"]="";
	}
	$pid = $_GET["pid"]; 
	$sql = "SELECT * FROM product WHERE pid=$pid";
	$result = $conn->query($sql);

	if ($result->num_rows == 0){
		$_SESSION["product_error"] = "Data not exist!";
		header("Location:product_view.php");
	} else {
		$row = $result->fetch_assoc();
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Edit Product</title>
	</head>
	<body>
		<h1 align=center>Edit Product</h1>
		<center><font color=red><?php echo $_SESSION["product_edit_error"];?></font></center>
		<form method=POST action="product_edit_action.php?pid=<?php echo $pid;?>">
			<table border=0 align=center width=400>
				<tr>
					<td>Product Name:</td>
					<td><input style="width:180px" type=text value="<?php echo $row["pname"];?>" name=txtPname></td>
				</tr>
				<tr>
					<td>Product Description:</td>
					<td><textarea cols=20 style="width:180px" rows=6 name=taPdesc><?php echo $row["pdesc"];?></textarea></td>
				</tr>
				<tr>
					<td>Product Image:</td>
					<td><input type=text  style="width:180px" value="<?php echo $row["pimage"];?>" name=txtPimage></td>
				</tr>
				<tr>
					<td>Product Order:</td>
					<td><input type=text style="width:180px" name=txtPorder  value="<?php echo $row["porder"];?>"></td>
				</tr>
				<tr>
					<td>Product Insert Date:</td>
					<td><input type=date style="width:180px" name=txtPinsertdate value="<?php echo $row["pinsertdate"];?>"></td>
				</tr>
				<tr>
					<td>Product Update Date:</td>
					<td><input type=date style="width:180px" name=txtPupdatedate value="<?php echo $row["pupdatedate"];?>"></td>
				</tr>
				<tr>
					<td>Product Price:</td>
					<td><input type=text style="width:180px" name=txtPprice value="<?php echo $row["pprice"];?>"></td>
				</tr>
				<tr>
					<td>Product Quantity:</td>
					<td><input type=text style="width:180px" name=txtPquantity value="<?php echo $row["pquantity"];?>"></td>
				</tr>
				<tr>
					<td>Category ID:</td>
					<td><input type=text style="width:180px" name=txtCid value="<?php echo $row["cid"];?>"></td>
				</tr>
				<tr>
				<td>Product Status:</td>
					<td>
						<input type="radio" name="rdPstatus" value="1" <?php if ($row["pstatus"] == 1) echo "checked" ?>>Active
						<input type="radio" name="rdPstatus" value="0" <?php if ($row["pstatus"] == 0) echo "checked" ?>>Inactive
					</td>
				</tr>
				<tr>
					<td align=right><input type=submit value="Update"></td>
					<td><input type=reset value="Reset"></td>
				</tr>
			</table>
		</form>
	</body>
</html>

<?php 
	}
	$conn->close();
	$_SESSION["product_edit_error"]="";
?>
