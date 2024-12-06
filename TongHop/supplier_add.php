<?php 
	session_start();
	if (!isset($_SESSION["supplier_add_error"])){
		$_SESSION["supplier_add_error"]="";
	}
	
	require_once("connect.php"); // Assuming this file contains your database connection information
	$conn->close();
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Supplier_Add</title>
    </head>
    <body>
    <h1 align=center>Add new supplier</h1>
		<center><font color=red><?php echo $_SESSION["supplier_add_error"];?></font></center>
		<form method=POST action="supplier_add_action.php">
            <table align=center>
                <tr>
                    <td>Supplier name:</td>
                    <td><input type="text" name=txtSname></td>
                </tr>
                <tr>
                    <td>Supplier address: </td>
                    <td><input type="text" name=txtSaddress></td>
                </tr>
                <tr>
                    <td>Supplier phone: </td>
                    <td><input type="text" name=txtSphone></td>
                </tr>
                <tr>
                    <td>Supplier tax: </td>
                    <td><input type="number" name=nStax></td>
                </tr>
                <tr>
                    <td>Trạng thái:</td>
                    <td>
                        <input type="radio" name="rdSstatus" value="1" checked>Hoạt động
                        <input type="radio" name="rdSstatus" value="0">Ngừng hoạt động
                    </td>
                </tr>

                <tr>
					<td align=right><input type=submit value="Add new"></td>
					<td><input type=reset value="Reset"></td>
				</tr>
            </table>
    </body>
</html>
<?php 
	$_SESSION["supplier_add_error"]="";
?>
