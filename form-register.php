<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Registration Form</title>

	<link rel="stylesheet" href="css/demo1.css">
	<link rel="stylesheet" href="css/form-register.css">


</head>
<body style="background:url(images/bg.jpg) no-repeat;background-size:cover;margin:0px;" >
	<header>
		<a href="#"></a>
    </header>
    <div class="main-content" style="margin-top:0px;">

        <!-- You only need this form and the form-register.css -->
		<div>
        <form class="form-register" method="post" action="register.php" ">

            <div class="form-register-with-email" >

                <div class="form-white-background" >

                    <div class="form-title-row">
                        <h1>Create an account</h1>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Username</span>
                            <input type="text" name="uname" required placeholder="Enter your username">
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Email</span>
                            <input type="email" name="email" required placeholder="Enter your emailaddress">
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Password</span>
                            <input type="password" name="password" required placeholder="Enter your password">
                        </label>
                    </div>
					
					<div class="form-row">
                        <label>
                            <span>Birthday</span>
                            <input type="date" name="bdate" required >
                        </label>
                    </div>
					
					<div class="form-row">
                        <label>
                            <span>Gender</span>
                            <select name="gender">
								<option value="" selected disabled hidden>Choose here</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
                        </label>
                    </div>
					
					<div class="form-row">
                        <label>
                            <span>Location</span>
                            <input type="text" name="locate" required>
                        </label>
                    </div>
					
                    <div class="form-row">
                        <label class="form-checkbox">
                            <input type="checkbox" name="chkbx" value="checked" required>
                            <span>I agree to the <a href="#">terms and conditions</a></span>
                        </label>
                    </div>

                    <div class="form-row">
                        <input type="submit" id="regbtn" name="regbtn" value="Register">
                    </div>

					<a href="form-login.php" class="form-log-in-with-existing">Already have an account? Login here &rarr;</a>
					
                </div>

                
				
            </div>

        </form>
		</div>
    </div>

	
	<script src="js/jquery.1.11.1.min.js"></script>
			<script src="js/jquery.maskedinput.min.js"></script>
			<script src="js/jquery.validate.min.js"></script>
			<script src="js/jquery.form.min.js"></script>
			<script src="js/j-forms.min.js"></script>
			
			
</body>

</html>
