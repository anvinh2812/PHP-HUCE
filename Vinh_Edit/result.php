<?php
session_start();
require_once("connect.php");
$product_name = isset($_GET["product_name"]) ? $_GET["product_name"] : "";
$category = isset($_GET["category"]) ? $_GET["category"] : "";

$pname = $_GET["pname"];
$cid = $_GET["cid"];

$sql = "SELECT * FROM 0209266_product_31 WHERE pname LIKE '%$pname%' AND 0209266_product_31` LIKE '%$cid%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Tên sản phẩm: " . $row["pname"]. " - Danh mục: " . $row["cid"]. "<br>";
    }
} else {
    echo "Không tìm thấy kết quả.";
}
$num_rows = 10; // Số kết quả trên mỗi trang
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại

$start = ($page - 1) * $num_rows; // Vị trí bắt đầu của kết quả trên trang này

$sql = "SELECT * FROM 0209266_product_31 WHERE pname LIKE '%$pname%' AND 0209266_product_31` LIKE '%$cid%' LIMIT $start, $num_rows";

$conn->close();
?>
