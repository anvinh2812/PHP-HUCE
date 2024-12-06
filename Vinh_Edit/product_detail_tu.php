<?php
session_start();
require_once("connect.php");

if (isset($_GET['pid']) && is_numeric($_GET['pid'])) {
    $pid = intval($_GET['pid']);

    $sql = "SELECT * FROM 	0209266_product_31 WHERE pid = $pid";
    $result = $conn->query($sql) or die($conn->error);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        $category_id = $product["cid"];
        $category_query = "SELECT cname FROM 	0209266_categories_31 WHERE cid = $category_id";
        $category_result = $conn->query($category_query) or die($conn->error);
        $category_name = ($category_result->num_rows > 0) ? $category_result->fetch_assoc()["cname"] : "trống";


        $supplier_id = $product["sid"];
        $supplier_query = "SELECT sname FROM 	0209266_suplier_31 WHERE sid = $supplier_id";
        $supplier_result = $conn->query($supplier_query) or die($conn->error);
        $supplier_name = ($supplier_result->num_rows > 0) ? $supplier_result->fetch_assoc()["sname"] : "trống";

        $size_id = $product["sizeid"];
        $size_query = "SELECT sizename FROM 	0209266_sie_31 WHERE sizeid = $size_id";
        $size_result = $conn->query($size_query) or die($conn->error);
        $size_name = ($size_result->num_rows > 0) ? $size_result->fetch_assoc()["sizename"] : "trống";
    } else {
        echo "Product not found. <a href='product_view_page.php'>Back to Product List</a>";
    }
} else {
    echo "Invalid product ID. <a href='product_view_page.php'>Back to Product List</a>";
}
?>

<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h1 align="center">Product Details</h1>
    <?php if (isset($product)) { ?>
        <table border="1" width="100%">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Order</th>
                <th>Insert Date</th>
                <th>Update Date</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Status</th>
                <th>Supplier</th>
                <th>Size</th>

            </tr>
            <tr>
                <td><?php echo $product["pid"]; ?></td>
                <td><?php echo $product["pname"]; ?></td>
                <td><?php echo $product["pdesc"]; ?></td>
                <td><img src="images/<?php echo $product["pimage"]; ?>" width="160px"></td>
                <td><?php echo $product["porder"]; ?></td>
                <td><?php echo $product["pinsertdate"]; ?></td>
                <td><?php echo $product["pupdatedate"]; ?></td>
                <td><?php echo $product["pprice"]; ?></td>
                <td><?php echo $product["pquantity"]; ?></td>
                <td><?php echo $category_name; ?></td>
                <td><?php echo $product["pstatus"]; ?></td>
                <td><?php echo $supplier_name; ?></td>
                <td><?php echo $size_name; ?></td>

            </tr>
        </table>
    <?php } ?>
</body>
</html>
