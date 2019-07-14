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
						<li><a class="active" href="xyz.php" value = "Home">Home</a></li>
						<li><a href="booking.php">Book</a></li>
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
<?php
if(!empty($_SESSION["email"]))
echo "User : ".$_SESSION["email"];
?>
	<br />
	<fieldset>
		<figure>
		<img class="left" src="abc.jpg"/>
		<figcaption><h2>Book Domestic & International Flight!</h2></figcaption>
		</figure>
		<aside class="right">
				<h2>Avail Banks Offers. Redeem on Flight & Hotel. Book Now at Yatra! Confirmed Check-ins. 24x7 Customer Support. Earn eCash on Booking. Easily Pay by EMIs. Lowest Price Guarantee. Leading Travel Brand. Lowest Flight Fares. Destinations: Delhi, Mumbai, Bengaluru, Chennai, Hyderabad.</h2>
				<a style="color: white" href = "booking.php"><input class="button" type="button" value="Book Now!"></a>
		</aside>
	</fieldset>	
	<br />
	<fieldset>
		<article>
			<h2>News</h2>
			<p>Airlines have come out with a host of discount offers on domestic and international flight tickets in order to attract customers. Air India is offering domestic and international flight tickets at a starting price of Rs. 979 and Rs. 6,000 respectively in a special promotional sale. Last week, Jet Airways announced 50 per cent discount on domestic and international flight tickets, which is applicable on base fare in both premiere and economy sections. These offers come amid high competition in the country's civil aviation sector boosted by robust growth in passenger traffic.</p>
		</article>	
	</fieldset>
	<br />
	<fieldset>
		<article>
			<h2>Testimonials</h2>
			<p>It gives me great pleasure to tell you that you have got amazing employees working with you. Customer Care had never been such a wonderful experience for me until I spoke to your agents. Whenever I call any other company it takes me ages to get through the IVR system, but getting through to Yatra was so simple. And then when I spoke to the Travel Consultant, she was more than generous in giving me the right answers without confusing me. I know working late at night is so difficult but she had amazing enthusiasm and energy to patiently answer all my stupid queries.

					And then I noticed I was charged extra on my travel. But before I could realize that something had to be done, I got a call from you saying it was a mistake and the necessary reversals would be done. I can see how bonded your employees are. Yatra is lucky to have people like them. Your team was very polite in all interactions, even leaving me a voice mail when I was in a meeting. When I called back, they recognized my name immediately. This shows your concern for your customers.
					
					It was indeed a wonderful experience traveling through Yatra.
					Prasanna Mandax</p>
		</article>
	</fieldset>
	<br />
	<fieldset>
		<article id="about">
			<h2>About us</h2>
			About Yatra
We are a leading online travel company in India providing a 'best in class' customer experience with the goal to be 'India's Travel Planner'. Through our website, www.yatra.com, our mobile applications and our other associated platforms, leisure and business travelers can explore, research, compare prices and book a wide range of services catering to their travel needs. Since our inception in 2006, more than 7 million customers have used one or more of our comprehensive travel-related services, which include domestic and international air ticketing, hotel bookings, homestays, holiday packages, bus ticketing, rail ticketing, activities and ancillary services. With over 83,000 hotels contracted across India, we are India's largest platform for domestic hotels.

A strong and "trusted" travel brand of India, our strengths include a large and loyal customer base, a multi-channel platform for leisure and business travelers, a robust mobile eco-system for a spectrum of travelers and suppliers, a strong technology platform designed to deliver a high level of scalability and innovation and a seasoned senior management team comprising of industry executives with deep roots in the travel industry in India and abroad.</p>
		</article>
	</fieldset>
	<br />
	<fieldset>
		<article id="contact">
			<h2>Contact us</h2>
			<a href="mailto:" style="color: white"><button class="button">Email</button></a>
			<a style="color: white" href = "https://www.facebook.com"><button class="button" >Facebook</button></a>
			<a style="color: white" href = "https://www.twitter.com"><button class="button" >Twitter</button></a>
			<button class="button" href = "call">Call us</button>
		</article>
	</fieldset>
	<footer class = "center">
		Copyright 2019 &copy XYZ Corporation.		
	</footer>
</body>
</html>