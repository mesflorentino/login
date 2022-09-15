<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
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
	<title>Register</title>
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

<!--------register form---------->


	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
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