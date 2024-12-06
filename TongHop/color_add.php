<?php 
	session_start();
	if (!isset($_SESSION["color_add_error"])){
		$_SESSION["color_add_error"]="";
	}
	
	require_once("connect.php"); // Assuming this file contains your database connection information

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$colorname = $_POST["txtColorname"];
		$colorstatus = $_POST["nColorstatus"];

		// You should perform validation on $colorname and $colorstatus here

		// Assuming your color table has columns colorname and colorstatus
		$sql = "INSERT INTO color (colorname, colorstatus) VALUES ('$colorname', $colorstatus)";

		if ($conn->query($sql) === TRUE) {
			header("Location: color_view.php"); // Redirect to the color view page after successful insertion
			exit();
		} else {
			$_SESSION["color_add_error"] = "Error: " . $conn->error;
		}
	}

	$conn->close();
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Color Add</title>
</head>
<body>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h1 align=center>Add new color</h1>
    <center><font color=red><?php echo $_SESSION["color_add_error"];?></font></center>
    <table align="center">
        <tr>
            <td>Color Name:</td>
            <td><input type="text" name="txtColorname"></td>
        </tr>
        <tr>
			<td>Trạng thái:</td>
			<td>
				<input type="radio" name="rdSstatus" value="1" checked>Hoạt động
				<input type="radio" name="rdSstatus" value="0">Ngừng hoạt động
			</td>
		</tr>
        <tr>
            <td align=right><input type="submit" value="Add New"></td>
            <td><input type="reset" value="Reset"></td>
        </tr>
    </table>
</form>
</body>
</html>

<?php 
	$_SESSION["color_add_error"]="";
?>
