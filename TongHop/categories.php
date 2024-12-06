<?php 
	session_start();
	require_once("connect.php");
	if (!isset($_SESSION["categories_error"])){
		$_SESSION["categories_error"]="";
	}
	if (!isset($_POST["cmd"])) {
		$_POST["cmd"]="";
	}
	if ($_POST["cmd"]!=""){
		//nếu mà nhấn nút "Delete all"
		$sql="delete from Categories where cid in (";
		
		$arr = $_POST["ckCid"];
		//var_dump($arr);
		for($i=0;$i<count($arr)-1;$i++)
			$sql.=$arr[$i].",";
		$sql.= $arr[count($arr)-1].")";
		//echo $sql;
		$conn->query($sql) or die($conn->error);
		
	}
?>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h1 align=center>List of Categories</h1>
		<center><font color=red><?php echo $_SESSION["categories_error"];?></font>
		<br>
		<a href="categories_add.php">Add new category</a>
		</center>
		<form method=POST>
		<table border=1 align=center width=800>
		<tr>
		
			<th><a href="">Check all</a><br>
				<a href="">Clear all</a>
			</th>
			<th>cid</th>
			<th>cname</th>
			<th>cdesc</th>
			<th>cimage</th>
			<th>corder</th>
			<th>cstatus</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
		<?php 
				$sql = "select * from categories order by corder asc";
				$result = $conn->query($sql) or die("Can't get recordset");
				if ($result->num_rows>0) {
					while($row = $result->fetch_assoc()){
						?>
							<tr>
								<td><input type=checkbox name="ckCid[]" value="<?php echo $row["cid"];?>"></td>
								<td><?php echo $row["cid"];?></td>
								<td><?php echo $row["cname"];?></td>
								<td><?php echo $row["cdesc"];?></td>
								<td><img width=300 src="images/<?php echo $row["cimage"];?>"></td>
								<td><?php echo $row["corder"];?></td>
				
								<td><?php echo $row["cstatus"];?></td>
								<td><a href="categories_edit.php?cid=<?php echo $row["cid"];?>">Sửa</a></td>
								<td><a onclick="return confirm('Are you sure delete <?php echo $row["cname"];?>?');" href="categories_delete.php?cid=<?php echo $row["cid"];?>">Xóa</a></td>
								
							</tr>
						<?php 
						}
				} else {
					echo "<tr><td colspan=7>Tập kết quả rỗng</td></tr>";
				}
				

				$conn->close();
			unset($_SESSION["categories_error"]);
		?>
		<tr><td colspan=9><input type="submit" name=cmd value="Delete all"></td></tr>
		</table>
		
	</body>
</html>

