<?php
session_start();
require_once("connect.php");
// Check if the user clicked the logout link
if (isset($_GET['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header("Location: login.php");
    exit();
}

$search = "";
$page = 1;
$num_row = 3;

if (isset($_POST["txtSearch"])) {
    $search = $_POST["txtSearch"];
}

if (isset($_GET["page"])) {
    $page = $_GET["page"];
}

$sql = "SELECT product.*, categories.cname
        FROM product
        JOIN categories ON product.cid = categories.cid
        WHERE pname LIKE ? OR pdesc LIKE ?";
$searchTerm = '%' . $search . '%';

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$resultCount = $stmt->get_result();
$totalRows = $resultCount->num_rows;

$num_of_page = ceil($totalRows / $num_row);

$offset = ($page - 1) * $num_row;
$sql = "SELECT product.*, categories.cname
        FROM product
        JOIN categories ON product.cid = categories.cid
        WHERE pname LIKE ? OR pdesc LIKE ?
        LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $searchTerm, $searchTerm, $offset, $num_row);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Product Search</title>
</head>
<body>
    <h1 align="center">Search for Products</h1>
    <div id="logout">
        <a href="?logout=1">Logout</a>
    </div>
    <form name="f" method="POST">
        <center>
            Enter text to find:
            <input type="text" name="txtSearch" value="<?php echo htmlspecialchars($search); ?>" size="50">
            <input type="submit" value="Search" name="cmd">
        </center>
    </form>
    
    <table border="1" width="100%">
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
        if ($result->num_rows == 0){
            echo "<tr><td style='color: red;' colspan='7'>No result!</td></tr>";
        } else {
            while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row["pid"];?></td>
            <td><?php echo $row["pname"];?></td>
            <td><?php echo $row["pdesc"];?></td>
            <td><img src="<?php echo $row["pimage"];?>" width="200"></td>
            <td><?php echo $row["pprice"];?></td>
            <td><?php echo $row["pquantity"];?></td>
            <td><?php echo $row["cname"];?></td>
        </tr>
        <?php 
            }
        }
        ?>
    </table>
    
    <center>
        <?php 
        if ($num_of_page > 1) {
            if ($page > 1) {
                $prevPage = $page - 1;
                echo "<a href='product_search_page.php?page=" . $prevPage . "'>back</a> ";
            }
            
            // Display only a limited number of page links for better user experience
            $maxPageLinks = 5; // Change this value as needed
            $startPage = max(1, $page - floor($maxPageLinks / 2));
            $endPage = min($num_of_page, $startPage + $maxPageLinks - 1);
            
            for ($i = $startPage; $i <= $endPage; $i++) {
                if ($i == $page) {
                    echo " <strong>" . $i . "</strong> ";
                } else {
                    echo " <a href='product_search_page.php?page=" . $i . "'>" . $i . "</a> ";
                }
            }
            
            if ($page < $num_of_page) {
                $nextPage = $page + 1;
                echo "<a href='product_search_page.php?page=" . $nextPage . "'>Next</a>";
            }
        }
        ?>
    </center>
</body>
</html>
