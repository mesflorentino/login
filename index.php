<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d636d1fa57.js" crossorigin="anonymous"></script>
	<title>Login</title>
</head>
<body>

<!--------navigation bar---------->

		<div class="navbar">
 			<div class="logo">
 				<a href="index.html"><img src="images/logolast.png" width="120px"></a>
 			</div>
 			<nav>
 				<ul id="MenuItems">
 					<li><a href="index.html">Home</a></li>
 					<li><a href="product.html">Products</a></li>
 					<li><a href="about.html">About</a></li>
 					<li><a href="contact.html">Contact</a></li>
 					<li><a href="account.html">Account</a></li>
 				</ul>
 			</nav>
 			<a href="cart.html"><img src="images/cart.png" width="30px" height="30px"></a>
 			<img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
    	</div>

<!--------login form---------->
<img src="images/athletes.png" width="100%">
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>

<!--------footer---------->

<div class="footer">
		<div class="row">
			<div class="footer-col-1">
				<h3>Download our App</h3>
				<p>Download our App for Android and Mobile Devices</p>
				<div class="app-logo">
					<img src="images/play-store.png">
					<img src="images/app-store.png">
				</div>
			</div>
			<div class="footer-col-2">
				<img src="images/logowhite22.png">
				<p>Our Purpose Is To Provide Authentic And Quality Shoes For All</p>
			</div>
			<div class="footer-col-3">
				<h3>Useful Links</h3>
				<ul>
					<li>Coupons</li>
					<li>Blog</li>
					<li>Affiliates</li>
					<li>Location</li>
				</ul> 
			</div>
			
			<div class="footer-col-4">
				<h3>Follow Us!</h3>
				<ul>
					<li>Facebook</li>
					<li>Twitter</li>
					<li>Instagram</li>
					<li>Youtube</li>
				</ul> 
			</div>
		</div>
		<hr>
		<p class="copyright">Copyright 2021</p>
	</div>

</body>
</html>