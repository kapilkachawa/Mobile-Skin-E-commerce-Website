<?php
session_start();
include('includes/config.php');
if(isset($_SESSION['user_acc']))
{
	header("location:index.php");
}
include('includes/source.php');
?>
<?php
$error = false;	
if(isset($_POST['login']))
{
	// get username and password
	$your_email = mysqli_real_escape_string($con,$_POST['username']);
	$your_pass = mysqli_real_escape_string($con,$_POST['password']);
	$status = "1";
    $error = array();
	
    // check whether $username is empty or not
    if (empty($your_email)) {
		echo $error['your_email'] = "<script>alert('Note: Email can not be empty!')</script>";
	}
	if (empty($your_pass)) {
		echo $error['your_pass'] = "<script>alert('Note: Password can not be empty!')</script>";
	}
	if (!$error) 
	{
		if(!empty($your_email) && !empty($your_pass) )
		{
           // get data from user table
			echo $sql_query = "SELECT * FROM tbl_user WHERE email = '$your_email' AND password = '$your_pass' AND status = '$status'";
			$result = mysqli_query($con, $sql_query);
			if(mysqli_num_rows($result)==1)
			{
				$rows=mysqli_fetch_array($result);
				$_SESSION['user_acc']=1;
				$_SESSION['userid']=$rows['id'];
				echo "<script>window.location='index.php'</script>";
			}else 
			{
				echo "<script>alert('Invalid Username or Password!')</script>";
				echo "<script>window.location='login.php'</script>";
			}
		}               
	} 
}
?>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<link rel="stylesheet" href="all CSS/loginn.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d871e58d52.js" crossorigin="anonymous"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> 
</head>
<body>
<nav>
      <h2 class="logo"><b><i>Three</i> <i style="color: gray;">Layers</i></b></h2>
      <ul id="sidemenu">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contect</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <section class="second_navbar">
      <div class="list">
        <div><a href="index.php">Home</a></div>
        <div><a href="#">About</a></div>
        <div><a href="#">Services</a></div>
        <div><a href="#">Contect</a></div>
      </div>
    </section>



<div class="log-container">
	<div class="log-child">
		<div class="log-header">
			<h1 class="header">Login Here</h1>
		</div>
		<form method="POST" action="#" class="log-form">
      <div class="input-box">
			<input type="email" class="log-input" id="username" name="username" placeholder="Email" required><br>
			<input type="password" class="log-input" id="password" name="password" placeholder="Password" required><br>
      </div>
      <div class="forgot-pass">
        <a class="forgot" href="#">Forgot your password?</a>
      </div>
			<button type="submit" class="log-btn animate__animated animate__flipInX" name="login">Sign in</button>
      <div class="line">
        <div class="line-1">
        <hr>
        </div>
        Or login using
        <div class="line-1">
        <hr>
        </div>
      </div>
			<div class="not-have-acc">New Customer?&nbsp;<a href="register.php">Sign up</a></div>
		</form>
	</div>
</div>



<footer class="footer">
    <div class="containerrr">
      <div class="rowwww">
        <div class="footer-col">
          <h4>Shop</h4>
          <ul class="footer-ul">
            <li><a href="#">CASE CLUB</a></li>
            <li><a href="#">Our services</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Products</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Get Help</h4>
          <ul class="footer-ul">
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Shipping</a></li>
            <li><a href="#">Returns</a></li>
            <li><a href="#">Pay Method</a></li>
            <li><a href="#">Help Center</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Online Shop</h4>
          <ul class="footer-ul">
            <li><a href="#">Watch</a></li>
            <li><a href="#">Mobiles</a></li>
            <li><a href="#">Skins</a></li>
            <li><a href="#">Accessories</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Follow Us</h4>
          <div class="social-link">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
