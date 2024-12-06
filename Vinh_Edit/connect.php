<?php 
$servername="localhost";
$username="root";
$password="";
$database="66pm56";
$conn = new mysqli($servername,$username,$password,$database);
if ($conn->connect_error){
	die("Lỗi kết nối với CSDL");
}
/*
	$sql = "insert into categories(cname,cdesc,cimage,corder,cstatus) 
			values ('Nokia','Hãng điện thoại hot nhất Hàn Quốc',
					'samsung.jpg',1,1)";
	$sql1 ="insert into categories(cname,cdesc,cimage,corder,cstatus) 
			values ('Sony','Hãng điện thoại nổi tiếng toàn cầu',
					'apple.jpg',2,1)"; 				
	$conn->query($sql) or die($conn->error);
	$conn->query($sql1) or die($conn->error);
	$conn->close();
*/
?>