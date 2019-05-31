<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login Form</title>
	<link rel="stylesheet" href="css/form-login.css">

</head>

<body>
	<header>
		
    </header>

    <div class="main-content" style="margin-top:0px;">

        <!-- You only need this form and the form-login.css -->

        <form class="form-login" method="post" action="login.php">

            <div class="form-log-in-with-email">

                <div class="form-white-background">

                    <div class="form-title-row">
                        <h1>Log in</h1>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Email</span>
                            <input type="email" name="email" required>
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Password</span>
                            <input type="password" name="password" required>
                        </label>
                    </div>

                    <div class="form-row">
                        <input type="submit" name="lgbtn" value="LOG IN">
                    </div>

                </div>

                <a href="register.php" class="form-create-an-account">Create an account &rarr;</a>

            </div>
			<div>
			</div>
        </form>

    </div>

</body>

</html>
<?php

if(isset($_GET["status"])){
		if($_GET["status"]==404){
			
			echo '<script type="text/javascript"> if(confirm("re-enter the username or password")){ window.location.replace("form-login.php")} </script>';

			}
	}

?>
