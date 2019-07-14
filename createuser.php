<?php
$servername = "localhost";
$dbname = "xyzbooking";

// Create connection
$conn = new mysqli($servername,"root","", $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
extract($_POST);
if(empty($fn) or empty($_POST["ln"]) or empty($_POST["age"]) or empty($_POST["gen"]) or empty($_POST["opt"]) or empty($_POST["tel"]) or empty($_POST["email"]) or empty($_POST["address"]) or empty($_POST["pref1"]) or empty($_POST["password"]) or empty($_POST["passre"])){
    header("Location: registration.php?msg=Values_Missing");
    exit();
}
if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    header("Location: registration.php?msg=Email_Invalid");
    exit();
}

if(!preg_match("/[a-zA-Z]/",$fn) or !preg_match("/[a-zA-Z]/",$ln)){
    header("Location: registration.php?msg=Enter_valid_Name");
    exit();
}
if(!preg_match("/^[\d]{10}$/",$tel)){
    header("Location: registration.php?msg=Invalid_Telephone");
    exit();
}
if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/",$password)){
    header("Location: registration.php?msg=Enter_Valid_Password");
    exit();
}
if($passre!=$password){
    header("Location: registration.php?msg=Passwords_do_not_match");
    exit();
}


$sql = "INSERT INTO user_info(fname,lname,age,gender,profession,phone,email,address,pref1,password,passre) 
values('$fn','$ln',$age,'$gen','$opt',$tel,'$email','$address',$pref1,'$password','$passre')";

if ($conn->query($sql) === TRUE) {
    header('Location: login.php');
    exit();
    
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: registration.php?msg=failed");
    exit();
}

$conn->close();
?>