
<?php
session_start();
    if(!empty($_SESSION["email"])){
        header('Location: xyz.php');
    }
?>

<!DOCTYPE Html>
<head>
    <link rel="stylesheet" type="text/css" href="main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script language = "Javascript">
        function validateForm(){
            var pass = document.getElementById('password').value;
            var passre = document.getElementById('passre').value;
            var email = document.getElementById('email').value;
            var age = document.getElementById('age').value;
            var fn = document.getElementById('fn').value;
            var ln = document.getElementById('ln').value;
            var tel = document.getElementById('tel').value;
            var patt = new RegExp("^[\\w\\.]+@{1}[a-zA-Z]+\\.[a-z]+$");
            var pat = new RegExp("^[\\d]{10}$")
            var opt = document.getElementById('opt').value;
            var address = document.getElementById('address').value;
            var re = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
            var name = /[^a-zA-Z]/
            if(fn=="" || fn==null || name.test(fn.toString())){
                alert("Enter a valid first name.");
                return false;
            }
            if(ln=="" || ln==null ||name.test(ln.toString())){
                alert("Enter a valid last name.");
                return false;
            }
            if(age=="" || age==null || age<0 || age>130){
                alert("Enter your correct age.");
                return false;
            }
            if(opt=="select"){
                alert("Choose one of the following options in select");
                return false;
            }
            if(tel=="" || tel==null || tel.toString().length!=10 || !pat.test(tel.toString())){
                alert("Enter Valid mobile number");
                return false;
            }
            if(email=="" || email==null || !patt.test(email.toString())){
		        alert("Enter a valid email.");
		        return false;
	        }
            if(address=="" || address==null)
            {
                alert("Enter valid address");
                return false;
            }
            if(pass=="" || pass==null){
                alert("password must not be empty.");
                return false;
            }
            if(!re.test(pass.toString())){
                alert("Password must contain minimum eight characters, at least one letter, one number and one special character");
                return false;
            }
            if(pass!=passre){
                alert("Passwords do not match.");
                return false;
            }
            return true;
        }
    </script>

    <title>Signup page.</title>
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
                        <li><a class="active" href="registration.php">Register</a></li>
                        <li><a href="booking.php">Book</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="xyz.php#about">About</a></li>
                        <li style="float:right"><a href="xyz.php#contact">Contact</a></li>
                    </em>
                </h3>
            </ul>
    </nav>
</header>
<body>
    <h1>
        Join us by filling this form!
    </h1>
    <form  action="createuser.php" method="POST" id="main">
        <fieldset class = "center">
            <legend><h2>Basic Information</h2></legend>
            <label>First Name : </label>
            <br>
            <input type="text" 	name = "fn" id = "fn"/>
            <br><br>
            <label>Last Name : </label>
            <br>
            <input type="text" name = "ln" id = "ln"/>
            <br><br>
            <label>Age : </label>
            <br>
            <input type="number" name = "age"/>
            <br><br>
            <label>Gender : </label><br>
            <input type="radio"  name="gen" value="1" checked><label>Male</label><br>
            <input type="radio"  name="gen" value="2"> <label>Female</label><br>
            <input type="radio" name="gen" value="3"> <label>Other</label>
            <br><br>
            <label>I am a:</label>
            <br>
            <select id="opt" name="opt">
                <option value = "select">select</option>
                <option value="Student">Student</option>
                <option value="Member of Armed forces">Member of Armed forces</option>
                <option value="Senior citizen">Senior citizen</option>
                <option value="businessman/self-employed">businessman/self-employed</option>
                <option value="employee">employee</option>
            </select>
        </fieldset>
        <fieldset class = "center">
                <legend><h2>Contact Details</h2></legend>
                <label>Contact No :</label>
                <br>
                <input type="tel:" name = "tel"/>
                <br><br>
                <label>Email ID :</label>
                <br>
                <input type="text" name="email"/>
                <br><br>
                <label>Address : </label>
                <br>
                <textarea name = "address" form = "main" rows = "6" cols = "50" placeholder="Enter your multiline address here."></textarea>
                <br><br>
                <label>Preferences : </label>
                <br>
                <input type="checkbox" id="pre" name="pref1" value="1" checked> <label>Send me work related emails.</label><br>
                <input type="checkbox" name="pref2" id="pre" value="1"> <label>Send me offers and discount related emails.</label><br>
                <input type="checkbox" name="pref3" id="pre" value="1"> <label>Send me partner schemes and offers</label>
                <br><br>

        </fieldset>
        <fieldset class = "center">
                <legend><h2>Password</h2></legend>
                <label>Enter a new Password :</label>
                <br>
                <input type="password" id="password" class="password" name="password"/>
                <br><br>
                <label>Confirm Password :</label>
                <br>
                <input type="password" id="passre" name = "passre"/>
                <br>
                <?php
                    if(isset($_GET["msg"])){
                        echo $_GET["msg"];
                    }
                    ?>
                <br>
                <input class="button" type="submit" value="Create Account">
        </fieldset>
    </form>
    <a href="login.php"><label><h2>Have an account? Sign In</h2></label></a>
    <br />
    <br />
    <footer class = "center">
		Copyright 2019 &copy XYZ Corporation.		
	</footer>
</body>
</html>