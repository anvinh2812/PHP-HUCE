<?php 
	session_start();
	if (!isset($_POST["txtSearch"])){
		$search = "";
	} else {
		$search = $_POST["txtSearch"];
	}

?>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
			<h1 align=center>Search Product</h1>
			<form name=f method=POST>
				<center>
				Enter text to find:
				<input type=text name=txtSearch value="<?php echo $search;?>" size=50>
				<input type=submit value="Search" name=cmd>
				</center>
			</form>
			<?php
				if (isset($_POST["cmd"])){
					require_once("connect.php");
					$sql = "select product.*, categories.cname
							from product, categories
							where product.cid = categories.cid
							and (pname like '%".$search."%'
							or pdesc like '%".$search."%')";
					$result = $conn->query($sql) or die($conn->error);
				?>
				<table border=1 width=100% align=center>
					<tr>
						<th>Code</th>
						<th>Name</th>
						<th>Description</th>
						<th>Image</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Category Name</th>
					</tr>
					<?php 
						if ($result->num_rows==0){
							echo "<tr><td style='font-color:red' colspan=7>No result!</td></tr>";
						} else {
							while ($row=$result->fetch_assoc()){
								?>
								<tr>
									<td><?php echo $row["pid"];?></td>
									<td><?php echo $row["pname"];?></td>
									<td><?php echo $row["pdesc"];?></td>
									<td><img src="images/<?php echo $row["pimage"];?>" width=200></td>
									<td><?php echo $row["pprice"];?></td>
									<td><?php echo $row["pquantity"];?></td>
									<td><?php echo $row["cname"];?></td>
									
								</tr>
								<?php 
							}
						}
					
					?>
				</table>
				<?php 
				}
			?>
	</body>
</html>
<!-- <%
Dim search
search = ""
If Request.Form("txtSearch") <> "" Then
    search = Request.Form("txtSearch")
End If
%>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h1 align="center">Search Product</h1>
    <form method="POST">
        <center>
            Enter text to find:
            <input type="text" name="txtSearch" value="<%= search %>" size="50">
            <input type="submit" value="Search" name="cmd">
        </center>
    </form>

    <% If Request.Form("cmd") <> "" Then %>
        <% 
        Set conn = Server.CreateObject("ADODB.Connection")
        conn.open "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" & Server.MapPath("ProductManagement.mdb")
        Set rs = Server.CreateObject("ADODB.Recordset")
        sql = "SELECT product_0201366_6.*, categories_0201366_6.cname " & _
              "FROM product_0201366_6, categories_0201366_6 " & _
              "WHERE product_0201366_6.cid = categories_0201366_6.cid " & _
              "AND (pname LIKE '%" & search & "%' " & _
              "OR pdesc LIKE '%" & search & "%')"
        rs.Open sql, conn
        %>

        <table border="1" width="100%" align="center">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category Name</th>
            </tr>

            <% If rs.EOF Then %>
                <tr><td style="color:red;" colspan="7">No result!</td></tr>
            <% Else %>
                <% Do While Not rs.EOF %>
                    <tr>
                        <td><%= rs("pid") %></td>
                        <td><%= rs("pname") %></td>
                        <td><%= rs("pdesc") %></td>
                        <td><img src="images/<%= rs("pimage") %>" width="200"></td>
                        <td><%= rs("pprice") %></td>
                        <td><%= rs("pquantity") %></td>
                        <td><%= rs("cname") %></td>
                    </tr>
                    <% rs.MoveNext
                Loop
                %>
            <% End If %>
        </table>

        <% 
        rs.Close
        conn.Close
        Set rs = Nothing
        Set conn = Nothing
        %>
    <% End If %>
</body>
</html> -->
