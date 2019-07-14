<?php
session_start();
	if(isset($_GET["logout"])) {
		$_SESSION["email"] = "";
        session_destroy();
        header('Location: login.php');
    }
    if(empty($_SESSION['email'])){
        header('Location: login.php');
        exit();
    }
?>
<!DOCTYPE html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="main.css">
	<title>XYZ flight booking site</title>
</head>
<header>
    <h1>
    <img src="logo.png" class="logo" />
    XYZ Flight Booking.</h1>
    <nav>
        <ul>
            <h3>
                <em>
                    <li><a href="xyz.php" value = "Home">Home</a></li>
                    <li><a href="booking.php">Book</a></li>
                    <?php
                    if(empty($_SESSION["email"])){ ?>
                    <li><a href="registration.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                    <?php } else{ ?>
                        <li><a href="xyz.php?logout=true" onclick="return confirm('You will be logged out. Continue?');">Logout</a></li>
                        <li><a href="transaction.php" class="active">Transactions</a></li>
                    <?php } ?>
                    <li><a href="xyz.php#about">About</a></li>
                    <li style="float:right"><a href="xyz.php#contact">Contact</a></li>
                </em>
            </h3>
        </ul>
    </nav>
</header>
<body>
    <?php
    if(isset($_GET["trans"])){
        $servername = "localhost";
        $dbname = "xyzbooking";

        // Create connection
        $conn = new mysqli($servername,"root","", $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        extract($_GET);
        $sql = "SELECT * from flights where num ='$trans'";
        if ($result = $conn->query($sql)) {
            if($result->num_rows>0){
                $row = $result->fetch_assoc();
                extract($row);
                $em = $_SESSION["email"];
                $pql = "INSERT INTO trans(departure, arrival, dtime, atime, name, num, price,dt, user) VALUES('$departure','$arrival','$dtime','$atime','$name','$num','$price','$dt', '$em')";
                if($conn->query($pql)){
                    echo "<h3>Your Transaction is completed</h3>";
                }
                else{
                    echo "Your Transaction is not completed";
                }
            }
        }
    }
    ?>
    <?php
        $servername = "localhost";
        $dbname = "xyzbooking";

        // Create connection
        $conn = new mysqli($servername,"root","", $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $em = $_SESSION['email'];
        $sql = "SELECT * from trans where user ='$em' ";
        if ($result = $conn->query($sql)) {
            if($result->num_rows>0){
                ?>
                <table class="center">
                <tr>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Departure City</th>
                    <th>Arrival City</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Price</th>
                    <th>Date</th>
                </tr> <?php
                while($row = $result->fetch_assoc()){
                    ?>
                    <tr>
                        <td> <?php echo $row['departure'] ?> </td>
                        <td> <?php echo $row['arrival'] ?> </td>
                        <td> <?php echo $row['dtime'] ?> </td>
                        <td> <?php echo $row['atime'] ?> </td>
                        <td> <?php echo $row['name'] ?> </td>
                        <td> <?php echo $row['num'] ?> </td>
                        <td> <?php echo $row['price'] ?> </td>
                        <td> <?php echo $row["dt"]?></td>
                    </tr>
                    <?php
                }
                ?>
                </table>
                <?php
                
            }
            else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
                ?> <h3>No Transactions found.</h3> <?php
            }
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            ?> <h3>Some Problem Occured.</h3> <?php
        }
?>
</body>
</html>