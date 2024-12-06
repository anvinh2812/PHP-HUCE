<?php
    session_start();
    require_once("connect.php");

    $colorname = $_POST["txtColorname"];
    $colorstatus = $_POST["nColorstatus"];

    $sql = "SELECT * FROM color WHERE colorname LIKE '$colorname'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $_SESSION["color_add_error"] = "$colorname already exists!";
        header("Location: color_add.php");
    } else {
        $sql = "INSERT INTO color (colorname, colorstatus) VALUES ('$colorname', $colorstatus)";
        $conn->query($sql);

        if ($conn->error == ""){
            $_SESSION["color_add_error"] = "Update Successful!";
            header("Location: color_view.php");
        } else {
            $_SESSION["color_add_error"] = "Error inserting data!";
            header("Location: color_add.php");
        }
    }

    $conn->close();
?>
