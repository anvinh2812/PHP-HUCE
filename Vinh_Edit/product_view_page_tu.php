<?php
session_start();
require_once("connect.php");

$num_row = 3;
$page = (isset($_GET["page"]) && is_numeric($_GET["page"])) ? intval($_GET["page"]) : 1;
if ($page < 1) {
    $page = 1;
}

$categories_query = "SELECT DISTINCT cname FROM 	0209266_categories_31";
$categories_result = $conn->query($categories_query) or die($conn->error);

$filterCategory = isset($_GET['category']) ? $_GET['category'] : null;

$sql = "SELECT a.*, b.cname FROM 	0209266_product_31 a
        JOIN 	0209266_categories_31 b ON a.cid = b.cid";

if ($filterCategory) {
    $sql .= " WHERE b.cname = '" . $filterCategory . "'";
}

$sql .= " ORDER BY b.cname, a.pid LIMIT " . ($page - 1) * $num_row . ", " . $num_row;

$result = $conn->query($sql) or die($conn->error);

$groupedProducts = [];
while ($row = $result->fetch_assoc()) {
    $categoryName = $row['cname'];
    if (!isset($groupedProducts[$categoryName])) {
        $groupedProducts[$categoryName] = [];
    }
    $groupedProducts[$categoryName][] = $row;
}

$num_of_page = isset($num_of_page) ? $num_of_page : 1;

?>

<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h1 align="center">san pham</h1>

    <div id="sidebar" style="float: left; width: 20%;">
        <h2>Categories</h2>
        <ul>
            <li><a href="product_view_page.php">All</a></li>
            <?php
            while ($category = $categories_result->fetch_assoc()) {
                $categoryName = $category['cname'];
                echo "<li><a href='product_view_page.php?category=$categoryName'>$categoryName</a></li>";
            }
            ?>
        </ul>
    </div>

    <div id="content" style="float: right; width: 80%;">
        <?php
        if (empty($groupedProducts)) {
            echo "<p>No products found.</p>";
        } else {
            foreach ($groupedProducts as $categoryName => $products) {
                echo "<h2>$categoryName</h2>";
                echo "<table border='1' width='100%'>";
                echo "<tr>";
                echo "<th>Code</th>";
                echo "<th>Name</th>";
                echo "<th>Image</th>";
                echo "<th>Price</th>";
                echo "<th>Quantity</th>";
                echo "<th>Category</th>";
                echo "<th>Detail</th>";
                echo "</tr>";

                foreach ($products as $product) {
                    echo "<tr>";
                    echo "<td>" . $product["pid"] . "</td>";
                    echo "<td>" . $product["pname"] . "</td>";
                    echo "<td><img src='images/" . $product["pimage"] . "' width='160px'></td>";
                    echo "<td>" . $product["pprice"] . "</td>";
                    echo "<td>" . $product["pquantity"] . "</td>";
                    echo "<td>" . $product["cname"] . "</td>";
                    echo "<td><a href='product_detail.php?pid=" . $product["pid"] . "'>Detail</a></td>";
                    echo "</tr>";
                }

                echo "</table>";
            }
        }

        echo "<center>";
        for ($i = 1; $i <= $num_of_page; $i++) {
            if ($i == $page) {
                echo " " . $i . " ";
            } else {
                echo " <a href='product_view_page.php?page=" . $i;
                if ($filterCategory) {
                    echo "&category=$filterCategory";
                }
                echo "'>" . $i . "</a> ";
            }
        }
        echo "</center>";
        ?>
    </div>
</body>
</html>
