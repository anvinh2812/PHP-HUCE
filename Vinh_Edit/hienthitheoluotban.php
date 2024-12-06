<?php
    session_start();
    require_once("connect.php");
    if (!isset($_REQUEST["page"])){
		$page=1;
	} else { 
		$page = $_REQUEST["page"];
	}
    $num_row = 2;

    $sql1 = "select a.*, b.cname from 0209266_product_31 a, 0209266_categories_31 b where a.cid = b.cid";
	$result1 = $conn->query($sql1) or die($conn->error);
	$num_of_page=round($result1->num_rows / $num_row,0);
	if ($page<1) {
		$page = 1;
	} 
	if ($page>$num_of_page){
		$page = $num_of_page;
	}
	$sql = "select a.*, b.cname from 0209266_product_31 a, 0209266_categories_31 b where a.cid = b.cid limit " . $num_row*($page-1).",".$num_row;
	//echo $num_of_page;
    $sql_config = "select * from configuration where configname = 'categories_default'";
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Hien Thi Luot Ban Nhieu Nhat</title>
    </head>
    <body>
        <h1 align ="center">Hien Thi</h1>
        <div class="box-pro-home">
            <div class="title-box-pro-home">
                <a href="?cid = "></a>
            </div>
        </div>
    </body>
</html>