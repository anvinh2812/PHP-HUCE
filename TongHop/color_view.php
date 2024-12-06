<?php
    session_start();
	if (!isset($_SESSION["color_error"])){
		$_SESSION["color_error"]="";
	}
	require_once("connect.php");
	$result=$conn->query("SELECT * FROM color"); // Make sure 'color' is the correct table name
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Color List</title>
    <style>
        table th, table td {
        text-align: center;
    }
    </style>
</head>
<body>
<h1 align=center>Color List</h1>
    <center><font color=red><?php echo $_SESSION["color_error"];?></font>
    <br>
        <a href="color_add.php">Add new color</a>
    </center>
    <table border=1 align=center width=100% cellspacing=5>
        <tr>
            <th>Color ID</th>
            <th>Color Name</th>
            <th>Color Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
            while ($row=$result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row["colorid"]; ?></td>
            <td><?php echo $row["colorname"];?></td>
            <td><?php if ($row["colorstatus"]==1) echo "Active";
							else echo "Inactive";?></td>
            <td>
                <a href="color_edit.php?colorid=<?php echo $row["colorid"];?>">
                    <img src="images/b_edit.png" border=0>
                </a>
            </td>
            <td>
                <a onclick="return confirm('Are you sure to delete <?php echo $row["colorname"];?>?');" href="color_delete.php?colorid=<?php echo $row["colorid"];?>">
                    <img src="images/b_drop.png" border=0>
                </a>
            </td>
        </tr>
        <?php 
            }
            $conn->close();
        ?>
    </table>
</body>
</html>
