<?php
session_start();
	if(isset($_GET["logout"])) {
		$_SESSION["email"] = "";
        session_destroy();
        header('Location: login.php');
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
                    <li><a  href="xyz.php" value = "Home">Home</a></li>
                    <li><a href="booking.php" class="active">Book</a></li>
                    <?php
                    if(empty($_SESSION["email"])){ ?>
                    <li><a href="registration.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                    <?php } else{ ?>
                        <li><a href="xyz.php?logout=true" onclick="return confirm('You will be logged out. Continue?');">Logout</a></li>
                        <li><a href="transaction.php">Transactions</a></li>
                    <?php } ?>
                    <li><a href="xyz.php#about">About</a></li>
                    <li style="float:right"><a href="xyz.php#contact">Contact</a></li>
                </em>
            </h3>
        </ul>
    </nav>
</header>
<body>
<br>
<?php
    if(!empty($_GET["acity"]) && empty($_GET["jdate"])){
        echo "Enter Complete and correct Journey Details";
    }
    else if(isset($_GET["acity"])){
        $servername = "localhost";
        $dbname = "xyzbooking";

        // Create connection
        $conn = new mysqli($servername,"root","", $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        extract($_GET);
        $sql = "SELECT * from flights where atime='$acity' AND dtime='$dcity' ";
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
                        <td> <?php echo $_GET["jdate"]?></td>
                        <td><form method="post" action="<?php if(isset($_SESSION['email']))
                        echo "transaction.php?trans=".$row['num']."&dt=".$_GET['jdate'];
                        else echo "login.php";?>">
                            <input type="submit" name="test" value="submit"  />
                        </form></td>
                    </tr>
                    <?php
                }
                ?>
                </table>
                <?php
                
            }
            else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
                ?> <h3>No flights found.</h3> <?php
            }
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            ?> <h3>Some Problem Occured.</h3> <?php
        }
    }
?>
    <br>
<form action="booking.php" method="GET">
<fieldset class="center">
    <label><h3>Select Departure City </h3></label>
    <select id="dcity" name="dcity">
        <option value = "chennai">chennai</option>
        <option value="surat">surat</option>
        <option value="mumbai">mumbai</option>
    </select>
    <label><h3>Select Arrival City </h3></label>
    <select id="acity" name="acity">
        <option value="surat">surat</option>
        <option value = "chennai">chennai</option>
        <option value="mumbai">mumbai</option>
    </select>
    <label><h3>Journey Date</h3></label>
    <input type="date" name="jdate"/>
    <label><h3>Number of Passengers</h3></label>
    <select id="passengers" name="passengers">
        <option value="1">1</option>
        <option value = "2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <br><br>
    <input type="submit"  value="search"/>
</fieldset>
</form>
<br>
</body>
</html>
