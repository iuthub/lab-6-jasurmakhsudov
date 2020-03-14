<?php 
	
	session_start();
	
	$isPost = $_SERVER["REQUEST_METHOD"]=="POST";
	$isValid = TRUE;


	$name = isset($_SESSION["name"])?$_SESSION["name"]:"";
	$email = isset($_SESSION["email"])?$_SESSION["email"]:"";
	$username = isset($_SESSION["username"])?$_SESSION["username"]:"";
	$password = isset($_SESSION["password"])?$_SESSION["password"]:"";
	$confirmPassword = isset($_SESSION["confirmPassword"])?$_SESSION["confirmPassword"]:"";
	$date = isset($_SESSION["date"])?$_SESSION["date"]:"";
	$ccexpirydata = isset($_SESSION["ccexpirydata"])?$_SESSION["ccexpirydata"]:"";
	$address = isset($_SESSION["address"])?$_SESSION["address"]:"";
	$city = isset($_SESSION["city"])?$_SESSION["city"]:"";
	$postalcode = isset($_SESSION["postalcode"])?$_SESSION["postalcode"]:"";
	$homephone = isset($_SESSION["homephone"])?$_SESSION["homephone"]:"";
	$mobilephone = isset($_SESSION["mobilephone"])?$_SESSION["mobilephone"]:"";
	$ccnumber = isset($_SESSION["ccnumber"])?$_SESSION["ccnumber"]:"";
	$monthlysalary = isset($_SESSION["monthlysalary"])?$_SESSION["monthlysalary"]:"";
	$websiteurl = isset($_SESSION["websiteurl"])?$_SESSION["websiteurl"]:"";
	$gpa = isset($_SESSION["gpa"])?$_SESSION["gpa"]:"";
	$gender = isset($_SESSION["gender"])?$_SESSION["gender"]:"";
	$maritalstatus = isset($_SESSION["maritalstatus"])?$_SESSION["maritalstatus"]:"";
	
	$namePattern = "/\b[A-Z]{1}[a-z]+\b/";
	$emailPattern = "/\b[A-Za-z0-9]+@[A-Za-z0-9]+\.[A-Za-z]{2,}\b/";
	$usernamePattern = "/\w{5,}/";
	$passwordPatterm = "/.\w{8,}/";
	$confirmPasswordPattern = "/.\S{5,}/";
	$postalcodePattern = "/^\d{6}$/";
	$homephonePattern = "/^\d{2}\s?\d{7}$/";
	$mobilephonePattern = "/^\d{2}\s?\d{7}$/";
	$ccnumberPattern = "/^(\d{4}\s?){4}$/";
	$monthlysalaryPattern = "/^UZS [1-9]\d{0,2}(,\d{3})*\.\d{2}$/";
	$gpaPattern = "/^[0-4]{1}\.((5){1}|[0-4]{1}[0-9]{1})$/";


	if($isPost) {
		
		$name = $_REQUEST["name"];
		$email = $_REQUEST["email"];
		$username = $_REQUEST["username"];
		$password = $_REQUEST["password"];
		$confirmPassword = $_REQUEST["confirmPassword"];
		$postalcode = $_REQUEST["postalcode"];
		$ccexpirydata = $_REQUEST["ccexpirydata"];
		$address =$_REQUEST["address"];
		$websiteurl =$_REQUEST["websiteurl"];
		$date = $_REQUEST["date"];
		$homephone = $_REQUEST["homephone"];
		$mobilephone = $_REQUEST["mobilephone"];
		$ccnumber = $_REQUEST["ccnumber"];
		$monthlysalary = $_REQUEST["monthlysalary"];
		$gpa = $_REQUEST["gpa"];
		$city = $_REQUEST["city"];
		$gender = $_REQUEST["gender"];
		$maritalstatus = $_REQUEST["maritalstatus"];

		$_SESSION["name"] = $name;
		$_SESSION["email"] = $email;
		$_SESSION["username"] = $username;
		$_SESSION["password"] = $password;
		$_SESSION["confirmPassword"] = $confirmPassword;
		$_SESSION["postalcode"] = $postalcode;
		$_SESSION["ccexpirydata"] = $ccexpirydata;
		$_SESSION["address"] = $address;
		$_SESSION["city"] = $city;
		$_SESSION["websiteurl"] = $websiteurl;
		$_SESSION["gender"] = $gender;
		$_SESSION["maritalstatus"] = $maritalstatus;
		$_SESSION["date"] = $date;
		$_SESSION["homephone"] = $homephone;
		$_SESSION["mobilephone"] = $mobilephone;
		$_SESSION["ccnumber"] = $ccnumber;
		$_SESSION["monthlysalary"] = $monthlysalary;
		$_SESSION["gpa"] = $gpa;


	}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />


		<style>
		
		.error {
			color: red;
			font-weight: bold;
		}
	</style>


	</head>
	
	<body>
		<h1>Registration Form</h1>

		<p>
			This form validates user input and then displays "Thank You" page.
		</p>
		
		<hr />
		
		<h2>Please, fill below fields correctly</h2>
	<form action="index.php" method="post">
		<dl>
			<dt>Name</dt>
			<dd>
				<input type="text" name="name" value="<?= $name ?>" >
				
					<?php if($isPost && !preg_match($namePattern, $name)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide name.</span>
					<?php } ?>

			</dd>
			<dt>Email</dt>
			<dd>
				<input type="email" name="email" value="<?= $email ?>" >

				<?php if($isPost && !preg_match($emailPattern, $email)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide email.</span>
					<?php } ?>

			</dd>	
			<dt>Username</dt>
			<dd>

				<input type="text" name="username" value="<?= $username ?>" >

				<?php if($isPost && !preg_match($usernamePattern, $username)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide username.</span>
					<?php } ?>

			</dd>
			<dt>Password</dt>
			<dd>
				<input type="password" name="password" value="<?= $password ?>" >

				<?php if($isPost && !preg_match($passwordPatterm, $password)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide password.</span>
					<?php } ?>

			</dd>
			<dt>Confirm Password</dt>
			<dd>
				<input type="password" name="confirmPassword" value="<?= $confirmPassword ?>" >

				<?php if($isPost && !($password == $confirmPassword)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide confirm password.</span>
					<?php } ?>

			</dd>
			<dt>Date of Birth</dt>
			<dd>
				<input type="date" name="date" value="<?= $date ?>" required>
			</dd>
			<dt>Gender</dt>
			<dd>
				<input type="radio" name="gender" value="male" required>
				<label for="male">Male</label>
				<input type="radio" name="gender" value="femele" >
				<label for="female">Female</label>
			</dd>
			<dt>Marital Status</dt>
			<dd>
				<input type="radio" name="maritalstatus" value="single" required>
				<label for="single">Single</label>
				<input type="radio" name="maritalstatus" value="married">
				<label for="married">Married</label>
				<input type="radio" name="maritalstatus" value="divorced">
				<label for="divorced">Divorced</label>
				<input type="radio" name="maritalstatus" value="widowed">
				<label for="widowed">Widowed</label>
			</dd>
			<dt>Address</dt>
			<dd>
				<input type="text" name="address" value="<?= $address ?>" required>
			</dd>
			<dt>City</dt>
			<dd>
				<input type="text" name="city" value="<?= $city ?>" required>
			</dd>
			<dt>Postal Code</dt>
			<dd>
				<input type="text" name="postalcode" value="<?= $postalcode ?>">
				<?php if($isPost && !preg_match($postalcodePattern, $postalcode)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide postal code.</span>
					<?php } ?>
			</dd>
			<dt>Home Phone</dt>
			<dd>
				<input type="text" name="homephone" value="<?= $homephone ?>">
				
				<?php if($isPost && !preg_match($homephonePattern , $homephone)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide home phone.</span>
					<?php } ?>

			</dd>
			<dt>Mobile Phone</dt>
			<dd>
				<input type="text" name="mobilephone" value="<?= $mobilephone ?>">
				<?php if($isPost && !preg_match($mobilephonePattern , $mobilephone)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide mobile phone.</span>
					<?php } ?>
			</dd>
			<dt>Credit Card Number</dt>
			<dd>
				<input type="text" name="ccnumber" value="<?= $ccnumber ?>" >
				<?php if($isPost && !preg_match($ccnumberPattern , $ccnumber)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide credit card number.</span>
					<?php } ?>
			</dd>
			<dt>Credit Card Expiry Date</dt>
			<dd>
				<input type="date" name="ccexpirydata" value="<?= $ccexpirydata ?>" required>
			</dd>
			<dt>Monthly Salary</dt>
			<dd>
				<input type="text" name="monthlysalary" value="<?= $monthlysalary ?>" >
				<?php if($isPost && !preg_match($monthlysalaryPattern , $monthlysalary)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide monthly salary.</span>
					<?php } ?>

			</dd>
			<dt>Web Site URL</dt>
			<dd>
				<input type="url" name="websiteurl" value="<?= $websiteurl ?>" required>
			</dd>
			<dt>Overall GPA</dt>
			<dd>
				<input type="text" name="gpa" value="<?= $gpa ?>" >
				<?php if($isPost && !preg_match($gpaPattern , $gpa)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide gpa.</span>
					<?php } ?>
			</dd>

		</dl>
		
		<div>
			<input type="submit" value="Registor" name="submit">
		</div>
	</form>

	<?php 
		if($isPost && $isValid) {
			header("Location: success.php", TRUE, 301);
		}
	?>

	</body>
</html>