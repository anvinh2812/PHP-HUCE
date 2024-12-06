<?php
session_start();
require_once("../connect.php");

if (!isset($_GET['pname'])) {
    // Handle the case where pname is not provided
    echo "Product name not found!";
} else {
    $pname = $_GET['pname'];
    // Fetch the product details based on the provided pname
    $sql = "SELECT a.*, b.cname FROM product a, categories b WHERE a.cid = b.cid AND a.pname = '$pname'";
    $result = $conn->query($sql) or die($conn->error);

    if ($result->num_rows > 0) {
        // Display the product details
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title>Product Details</title>
            </head>
            <body>
                <h1 align="center">Product Details</h1>
                <div>
                    <h2><?php echo $row["pname"]; ?></h2>
                    <p>Code: <?php echo $row["pid"]; ?></p>
                    <p>Price: <?php echo $row["pprice"]; ?></p>
                    <p>Quantity: <?php echo $row["pquantity"]; ?></p>
                    <p>Category: <?php echo $row["cname"]; ?></p>
                    <p>Image: <img src="images/<?php echo $row["pimage"]; ?>" width="160px" alt="Product Image"></p>
                    <p>Detail: <!-- Add more details here if available --></p>
                    <!-- You can display more details as needed -->
                </div>
            </body>
        </html>
        <?php
    } else {
        // Handle case where no product is found with the given pname
        echo "Product not found!";
    }
}
?>
