<?php 
	session_start();
	require_once("connect.php");

	if (!isset($_SESSION["color_edit_error"])){
		$_SESSION["color_edit_error"]="";
	}

	$colorid = $_GET["colorid"]; // Get colorid from the URL
	$sql = "SELECT * FROM color WHERE colorid=$colorid"; // Query data from color table
	$result = $conn->query($sql);

	if ($result->num_rows == 0){
		$_SESSION["color_edit_error"] = "Data not exist!";
		header("Location:color_view.php");
	} else {
		$row = $result->fetch_assoc();
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Edit Color</title>
	</head>
	<body>
		<h1 align=center>Edit Color</h1>
		<center><font color=red><?php echo $_SESSION["color_edit_error"];?></font></center>
		<form method=POST action="color_edit_action.php?colorid=<?php echo $colorid;?>">
			<table border=0 align=center width=400>
				<tr>
					<td>Color Name:</td>
					<td><input style="width:180px" type=text value="<?php echo $row["colorname"];?>" name=txtColorname></td>
				</tr>
				<tr>
                    <td>Trạng thái:</td>
                    <td>
						<input type="radio" name="rdColorstatus" value="1" <?php if ($row["colorstatus"] == 1) echo "checked" ?>>Active
						<input type="radio" name="rdColorstatus" value="0" <?php if ($row["colorstatus"] == 0) echo "checked" ?>>Inactive
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
	$_SESSION["color_edit_error"]="";
?>
