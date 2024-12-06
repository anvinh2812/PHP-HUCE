<?php 
	require("connect.php");
	$keyword = $_REQUEST["keyword"];
	$sql = "select * from product where pname like '%".$keyword."%'";
	$result = $conn->query($sql) or die($conn->error);
?>

<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
			<ul id="country-list">
				<?php while ($row=$result->fetch_assoc()){
				?>
				<li onClick="selectCountry('<?php echo $row["pname"];?>');">
					<?php echo $row["pname"];?>
				</li>
				<?php } 
				$conn->close();
				?>
			</ul>
	</body>
</html>