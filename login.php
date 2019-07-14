
<?php
session_start();
    if(!empty($_SESSION["email"])){
        header('Location: xyz.php');
    }
?>
<!DOCTYPE Html>
<head>
    <title>Login into XYZ Flight Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">
    <script language = "Javascript">
    	function validateForm(){
	var pass = document.getElementById('password').value;
	var email = document.getElementById('email').value;
    var patt = new RegExp("^[\\w.]+@{1}[a-zA-Z]+\\.[a-z]+$");
    var re = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
	if(email=="" || email==null || !patt.test(email.toString())){
		alert("Enter a valid email.");
		return false;
	}
	if(!re.test(pass.toString())){

		alert("Enter a valid password.");
		return false;
	}
	return true;
}
    </script>
</head>
<header>

        <h1>
    <img src="logo.png" class="logo" />
    XYZ Flight Booking.</h1>
    <nav class="center">
            <ul>
                <h3>
                    <em>
                        <li><a href="xyz.php" value = "Home">Home</a></li>
                        <li><a href="registration.php">Register</a></li>
                        <li><a href="booking.php">Book</a></li>
                        <li><a class="active" href="login.php">Login</a></li>
                        <li><a href="xyz.php#about">About</a></li>
                        <li style="float:right"><a href="xyz.php#contact">Contact</a></li>
                    </em>
                </h3>
            </ul>
    </nav>
</header>

<body>

    <h1>Please login to continue booking your flight with us.</h1>
    <form  method="post" action="loginuser.php">
        <fieldset class = "center">
            <legend><h2>Login</h2></legend>
                <label >E-mail : </label><br /> 
                <input type="text" name="email" id="email"/><br />  <br /> 
                <label >Password : </label><br />
                <input type="password" name="password" id="password"/>
                <br />
                <?php
                if(isset($_GET["msg"]) && $_GET["msg"]=='failed'){
                    echo "Wrong Username/Password";
                }
                ?>
         <br /> 
            <input class="button" type="submit" value="Login" name = "login"/>
        </fieldset>
        <fieldset class = "center">
            <legend><h2>Sign Up!</h2></legend>
            <p>Don't have an account with us?</p>
            <a href="registration.php">Sign Up here!</a>
        </fieldset>
    </form>
    <br />
    <footer class = "center">
            Copyright 2019 &copy XYZ Corporation.		
    </footer>
</body>
</html>
