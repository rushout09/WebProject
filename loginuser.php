<?php
    session_start();
    $servername = "localhost";
    $dbname = "xyzbooking";

    // Create connection
    $conn = new mysqli($servername,"root","", $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    extract($_POST);
    $sql = "SELECT email from user_info where email='$email' AND password='$password' ";
    $result = $conn->query($sql);
    if ($result) {
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $_SESSION["email"] = $row['email'];
            header('Location: xyz.php');
            exit();
        }
        else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            header('Location: login.php?msg=failed');
        exit();
        }
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('Location: login.php?msg=failed');
        exit();
    }
$conn->close();
?>