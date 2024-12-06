<?php 
	session_start();
	require_once("connect.php");
	if (!isset($_REQUEST["page"])){
		$page=1;
	} else { 
		$page = $_REQUEST["page"];
	}
	$num_row=4;
	$sql1 = "select a.*, b.cname from Product a, Categories b where a.cid = b.cid";
	$result1 = $conn->query($sql1) or die($conn->error);
	$num_of_page=round($result1->num_rows / $num_row,0);
	if ($page<1) {
		$page = 1;
	} 
	if ($page>$num_of_page){
		$page = $num_of_page;
	}
	$sql = "select a.*, b.cname from Product a, Categories b where a.cid = b.cid limit " . $num_row*($page-1).",".$num_row;
	echo $num_of_page;
	$result = $conn->query($sql) or die($conn->error);
	
?>


<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
			<h1 align=center>List of Product</h1>
			<table border=1 width=100%>
				<tr>
					<th>Code</th>
					<th>Name</th>
					<th>Image</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Category</th>
					<th>Detail</th>
				</tr>
				<?php 
					if ($result->num_rows == 0){
						echo "<tr><td colspan = 7>No result!</td></tr>";
					} else {
						while ($row=$result->fetch_assoc()){
				?>
					<tr>
						<td><?php echo $row["pid"];?></td>
						<td><?php echo $row["pname"];?></td>
						<td><img src="images/<?php echo $row["pimage"];?>" width=160px></td>
						<td><?php echo $row["pprice"];?></td>
						<td><?php echo $row["pquantity"];?></td>
						<td><?php echo $row["cname"];?></td>
						<td><a href="product_detail.php?pname=<?php echo $row["pname"];?>">Detail</a></td>
					</tr>
				<?php 				
						}
					}
				?>
			</table>
			<center>
				<?php 
					for($i=1;$i<=$num_of_page;$i++){
						if ($i == $page){
							echo " ".$i." ";
						} else {
							echo " <a href=product_view_page.php?page=".$i.">".$i."</a> ";
						}
						
					}
				?>
			</center>
	</body>
</html>