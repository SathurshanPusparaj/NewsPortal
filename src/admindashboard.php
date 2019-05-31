<?php session_start(); $_SESSION["user"]="power" ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Dashboard</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="admindashboard.php" style="font-size:20px;">Citizen</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav" style="margin-left:75%;">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link"><?php echo date('Y-m-d H:i:s') ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link"><form action="log.php" method="post">
				<input type="submit" name="out" value="Logout" style="background:none;border:none;">
		</form></a>
      </li>
    </ul>
  </div>
</nav>

<div class="container" style="margin-top:10px;">
  <div class="row" >
  <div div class="col-sm-3" style="background-color:#EEEEEE;border-radius:5px;">
		<nav class="nav flex-column">
	<form action="admindashboard.php" method="post">
    <input type="submit" value="Dashboard" name="dash" class="nav-link" style='background-color:#EEEEEE;color:#0056C0;text-decoration:none;border:none;text-align:left;'>
	<input type="submit" value="Userslist" name="users" class="nav-link" style='background-color:#EEEEEE;color:#0056C0;text-decoration:none;border:none;text-align:left;'>
  	<input type="submit" value="Uploaded news" name="unews" class="nav-link" style='background-color:#EEEEEE;color:#0056C0;text-decoration:none;border:none;text-align:left;'>
  	<input type="submit" value="Not verified news" name="nvnews" class="nav-link" style='background-color:#EEEEEE;color:#0056C0;text-decoration:none;border:none;text-align:left;'>
	<input type="submit" value="Upload news" name="upload" class="nav-link" style='background-color:#EEEEEE;color:#0056C0;text-decoration:none;border:none;text-align:left;'>
  	<input type="submit" value="Profile" name="profile" class="nav-link" style='background-color:#EEEEEE;color:#0056C0;text-decoration:none;border:none;text-align:left;'>
  	<input type="submit" value="About" name="about" class="nav-link" style='background-color:#EEEEEE;color:#0056C0;text-decoration:none;border:none;text-align:left;'>
	</form>
	</nav>
  </div>
  <div div class="col-sm-8" style="margin-left:10px;">
	<div class="container" id="one">
  <div class="row" >
    <div class="col"style="margin-top:10px;">
      <div class="card" style="width: 20rem;">
  <div class="card-body">
    <p class="card-text" style="font-size:45px;"><?php  require_once "adminfunctions.php"; echo num_entries("memberinfo"); ?></p>
    <h4 class="card-title">Users</h4>
  </div>
</div>
    </div>
    <div class="col" style="margin-top:10px;">
      <div class="card" style="width: 20rem;">
  <div class="card-body">
    <p class="card-text" style="font-size:45px;"><?php echo num_entries("news"); ?></p>
    <h4 class="card-title">Totals news</h4>
  </div>
</div>
    </div>
  </div>  
  
  
  <h1 style="margin-left:10px;">About</h1>
<p class="card-text" style="margin-left:10px;">An online newspaper is the online version of a newspaper, either as a stand-alone publication or as the online version of a printed periodical.

Going online created more opportunities for newspapers, such as competing with broadcast journalism in presenting breaking news in a more timely manner. The credibility and strong brand recognition of well-established newspapers, and the close relationships they have with advertisers, are also seen by many in the newspaper industry as strengthening their chances of survival.</p>

<h1 style="margin-left:10px;">User LogActivity</h1>

 <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Sign in</th>
      <th scope="col">Sign out</th>
    </tr>
  </thead>
  <tbody>
    <?php
		$result = logactivity();
		
		while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
			echo "<tr>";
			echo "<td>".$row[0]."</td>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "</tr>";
			
		}
	?>
  </tbody>
</table>
    
	</div>
		
		
	<?php
	if(isset($_POST["users"])){
		echo '<script type="text/javascript"> document.getElementById("one").style.display="none"; </script>';
		
			$result = display_users();
		if($result->num_rows<=0){
			echo "No members";
		}else{
			
		echo '<div class="container" id="two">';
		echo '<table class="table table-striped">';
		echo '<thead>';
		echo '<tr>';
			echo '<th scope="col">Username</th>';
			echo '<th scope="col">Emailaddress</th>';
			echo '<th scope="col">Address</th>';
			echo '<th scope="col">Gender</th>';
			echo '<th scope="col">Birthday</th>';
			echo '<th scope="col">Authority</th>';
			echo '<th scope="col"></th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
			while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
			echo "<tr>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[4]."</td>";
			echo "<td>".$row[5]."</td>";
			echo "<td>".$row[6]."</td>";
			echo "<td>".$row[7]."</td>";
			echo "<td><a href='queryfunction.php?udelete=".$row[0]."'>Delete</a></td>";
			echo "</tr>";
			}
			echo '</tbody>';
			echo '</table>';
			echo '</div>';
		}
		
	}
	
	
	
	if(isset($_POST["unews"])){
		echo '<script type="text/javascript"> document.getElementById("one").style.display="none"; </script>';
		
			$result = display_news(1);
		if($result->num_rows<=0){
			echo "No news";
		}else{
			
		echo '<div class="container" id="three">';
		echo '<table class="table table-striped">';
		echo '<thead>';
		echo '<tr>';
			echo '<th scope="col">Headline</th>';
			echo '<th scope="col">Description</th>';
			echo '<th scope="col">Date</th>';
			echo '<th scope="col">uploaded by</th>';
			echo '<th scope="col"></th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
			while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
			echo "<tr>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "<td>".$row[4]."</td>";
			echo "<td><a href='queryfunction.php?ndelete=".$row[0]."'>Delete</a></td>";
			echo "</tr>";
			}
			echo '</tbody>';
			echo '</table>';
			echo '</div>';
		}
		
	}

	if(isset($_POST["nvnews"])){
		echo '<script type="text/javascript"> document.getElementById("one").style.display="none"; </script>';
		
			$result = display_news(0);
		if($result->num_rows<=0){
			echo "<h1>No news</h1>";
		}else{
			
		echo '<div class="container" id="three">';
		echo '<table class="table table-striped">';
		echo '<thead>';
		echo '<tr>';
			echo '<th scope="col">Headline</th>';
			echo '<th scope="col">Description</th>';
			echo '<th scope="col">Date</th>';
			echo '<th scope="col">uploaded by</th>';
			echo '<th scope="col"></th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
			while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
			echo "<tr>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "<td>".$row[4]."</td>";
			echo "<td><a href='queryfunction.php?nverified=".$row[0]."'>verify</a></td>";
			echo "<td><a href='queryfunction.php?ndelete=".$row[0]."'>Delete</a></td>";
			echo "</tr>";
			}
			echo '</tbody>';
			echo '</table>';
			echo '</div>';
		}
		
	}
	if(isset($_POST["upload"])){
		echo '<script type="text/javascript"> document.getElementById("one").style.display="none"; </script>';
		echo '<h3 class="title">Submit news</h3>';
		echo '<form action="log.php" method="post" enctype="multipart/form-data">';
		echo '<input type="text" name="title" class="form-control" placeholder="headline" required=""><br>';
		echo '<input type="text" name="sdescrip" class="form-control" placeholder="Short description" required=""><br>';
		echo '<input type="text" name="ldescrip" class="form-control" placeholder="Long description" required=""><br>';
		echo '<select name="category">';
		echo '<option value="World">World</option>';
		echo '<option value="Business">Business</option>';
		echo '<option value="Tech">Tech</option>';
		echo '<option value="Entertainment">Entertainment</option></select><br><br>';
		echo '<input type="file" value="upload the image" style="margin-bottom:23px;" name="file">';
		echo '<input type="submit" name="adminnewsupload" value="Submit" class="btn btn-primary">';
		echo '</form>';
	}
	if(isset($_POST["profile"])){
		echo '<script type="text/javascript"> document.getElementById("one").style.display="none"; </script>';
		require_once "fetchdata.php";	
							
							$result = check_pic_path($_SESSION["id"]);
							$value=mysqli_fetch_array($result,MYSQLI_ASSOC);
							
							if($value["userpic"]!=null){
								echo "<img src='../".$value["userpic"]."' alt='Profile-Picture' width='200' height='200' style='margin-top:10px;margin-left:13%;margin-bottom:5px;border-radius:100px;'><br>";
							}else{
								echo "<img src='../images/defaultuser.jpg' alt='Profile-Picture' width='200' height='200' style='margin-top:10px;margin-left:13%;margin-bottom:5px;border-radius:100px;'><br>";
							}
							echo"<form action='log.php' method='post' enctype='multipart/form-data'>";
							echo "<label for='uploadbtn' style='margin-left:20%;color:blue;text-decoration:underline;'>Edit</label>";
							echo "<input type='file' name='file' id='uploadbtn' style='display:none;'>";
							echo "<input type='submit' value='upload' name='uploadbtn' id='uploadbtn' style='margin-left:2%;color:black;text-decoration:none;border:none;'>";
							echo"</form>";
							
							$result1=getdetails($_SESSION["id"]);
							$value1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
							
							echo "<p style='margin-left:12%;'>Name:-".$value1["username"]."</p>";
							echo "<p style='margin-left:12%;'>Email-Address:-".$value1["emailaddress"]."</p>";
							echo "<p style='margin-left:12%;'>Address:-".$value1["address"]."</p>";
							echo "<p style='margin-left:12%;'>Gender:-".$value1["gender"]."</p>";
							echo "<p style='margin-left:12%;'>Birthdate:-".$value1["dob"]."</p>";
	}
	
	if(isset($_POST["about"])){
		echo '<script type="text/javascript"> document.getElementById("one").style.display="none"; </script>';
		echo "<h1 style='margin-top:10px;'>Citizen</h1>";
		echo "<p>This is a online news website.This website help to deliver the news more faster than other news websites.</p>";
		
	}
?>	
  
		
  </div>
  
</div>
      
 </div>
 
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>

