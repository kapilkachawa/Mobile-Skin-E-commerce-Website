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
$br='\n';
$error = false;	
if (isset($_POST['signup'])) {	
	$fname = mysqli_real_escape_string($con,$_POST['fname']);
	$lname = mysqli_real_escape_string($con,strtolower($_POST['lname']));
	$email = mysqli_real_escape_string($con,strtolower($_POST['email']));
	$password = mysqli_real_escape_string($con,strtolower($_POST['password']));
	$mobile_no = mysqli_real_escape_string($con,strtolower($_POST['mobile_no']));
	$status = 1;
	date_default_timezone_set('Asia/Kolkata');
	$create_date = date("d/m/Y");
	$create_time = date( 'h:i:s A', time () );
	
	$error = array();
	
	if(empty($fname)){
		echo $error['fname'] = "<script>alert('Note: first name can not be empty!')</script>";
    }
	if(empty($lname)){
		echo $error['lname'] = "<script>alert('Note: last name can not be empty!')</script>";
    }
	if(empty($email)){
		echo $error['email'] = "<script>alert('Note: Email can not be empty!')</script>";
    }
	if(empty($password)){
		echo $error['password'] = "<script>alert('Note: Password can not be empty!')</script>";
    }
	if(empty($mobile_no)){
		echo $error['mobile_no'] = "<script>alert('Note: mobile_no can not be empty!')</script>";
    }
		
	if (!$error) 
	{
		if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($mobile_no) && !empty($status) && !empty($create_date) && !empty($create_time))
		{
			//fatch data check username already taken
			$sql_u = "SELECT * FROM tbl_user WHERE email = '$email'";
			$res_u = mysqli_query($con, $sql_u);
			if (mysqli_num_rows($res_u) > 0) { 	
				 echo $error['already'] = "<script>alert(' Sorry...! $email$br This email are already account taken.')</script>";
				 echo "<script>window.location='register.php'</script>";
			}
			else{
				//insert record in total room table
				
				$query = "INSERT INTO tbl_user(`fname`, `lname`, `email`, `password`, `mob`, `status`, `create_date`, `create_time`) VALUES ('".$fname."','".$lname."','".$email."','".$password."','".$mobile_no."','".$status."','".$create_date."','".$create_time."') ";
				if (mysqli_query($con, $query))
				{
					echo $error['info'] = "<script>alert(' Hi $fname , $br Your Case Club  Account Created Successfully..')</script>";
					echo "<script>window.location='login.php'</script>";

				}
				else{
					echo $error['info'] = "<script>alert('Account Created Failed..')</script>";
					echo "<script>window.location='register.php'</script>";
				}
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
    <title>Register Page</title>
	<link rel="stylesheet" href="all CSS/registerr.css">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
				<h1 class="header">Create Account</h1>
			</div>
			<form method="POST" action="#" class="log-form">
        <div class="input-box">
				  <input type="text" class="log-input" id="fname" name="fname" placeholder="First Name" required />
				  <input type="text" class="log-input" id="lname" name="lname" placeholder="Last Name" required />
				  <input type="email" class="log-input" id="email" name="email" placeholder="Email" required />
				  <input type="password" class="log-input" id="password" name="password" placeholder="Password" required />
        </div>
				<div class="pay-check-box-1"> <!--check box-->
					<input type="checkbox" onclick="loginPassword()">
					<label for="check">Show password</label>
				</div>
        <div class="input-box">
				<input type="text" class="log-input" id="mobile_no" name="mobile_no" onkeypress="return isNumber(event)" maxlength="10" placeholder="Mobile Number" required />
				<button type="submit" class="log-btn animate__animated animate__flipInX" name="signup">Create</button>
      </div>
				<div class="line">
          <div class="line-1">
        		<hr>
          </div>
        	Or login using
          <div class="line-1">
        	  <hr>
          </div>
      	</div>
				<div class="not-have-acc">Already have an account?&nbsp;<a href="login.php">Login here</a></div>				
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



<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
<script>
function loginPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>