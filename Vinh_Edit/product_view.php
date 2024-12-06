<?php 
	session_start();
	if (!isset($_SESSION["product_error"])){
		$_SESSION["product_error"]="";
	}
	require_once("connect.php");
	$result=$conn->query("SELECT * FROM 0209266_product_31"); // Đảm bảo 'product' là tên chính xác của bảng
?>

<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h1 align=center>Product List</h1>
		<center><font color=red><?php echo $_SESSION["product_error"];?></font>
		<br>
			<a href="product_add.php">Add new product</a>
		</center>
		<table border=1 align=center width=100% cellspacing=5>
			<tr>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Product Image</th>
				<th>Product Description</th>
				<th>Product Order</th>
				<th>Product Price</th>
				<th>Product Quantity</th>
				<th>Category ID</th>
				<th>Product Status</th>
				<th>Product Insert Date</th> <!-- Thêm cột Product Insert Date -->
				<th>Product Update Date</th> <!-- Thêm cột Product Update Date -->
				<th>sid</th>
				<th>colorid</th>
				<th>Edit</th>
				<th>Del</th>
			</tr>
			<?php 
				while ($row = $result->fetch_assoc()){
					?>
			<tr>
				<td><?php echo $row["pid"];?></td>
				<td><?php echo $row["pname"];?></td>
				<td><img src="images/<?php echo $row["pimage"];?>" width=200></td>
				<td><?php echo $row["pdesc"];?></td>
				<td><?php echo $row["porder"];?></td>
				<td><?php echo $row["pprice"];?></td>
				<td><?php echo $row["pquantity"];?></td>
				<td><?php echo $row["cid"];?></td>
				<td><?php if ($row["pstatus"]==1) echo "Active";
							else echo "Inactive";?></td>
				<td><?php echo $row["pinsertdate"];?></td> <!-- Hiển thị giá trị Product Insert Date -->
				<td><?php echo $row["pupdatedate"];?></td> <!-- Hiển thị giá trị Product Update Date -->
				<td><?php echo $row["sid"] ?></td>
				<td><?php echo $row["colorid"] ?></td>
				<td>
					<a href="product_edit.php?pid=<?php echo $row["pid"];?>">
						<img src="images/b_edit.png" border=0>
					</a>
				</td>
				<td>
					<a onclick="return confirm('Are you sure to delete <?php echo $row["pname"];?>?');" href="product_delete.php?pid=<?php echo $row["pid"];?>">
						<img src="images/b_drop.png" border=0>
					</a>
				</td>
				
			</tr>
			<?php 
				}
				$conn->close();
			?>
			
		</table>
		<?php 
			/*var_dump($result);
			echo $result->num_rows; // 4 
			$row=$result->fetch_assoc();
			echo $row["pname"]; //Samsung */
	
		?>
	</body>
</html>
<?php 
	unset($_SESSION["product_error"]);
?>
