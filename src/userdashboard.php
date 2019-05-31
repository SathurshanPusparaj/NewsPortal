<?php  session_start();  ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Lato|Merriweather|Montserrat'>

      <link rel="stylesheet" href="../css/style.css">

  
</head>

<body>
<section class="bgfbox">
	<div class="container">
		<div class="row flex-row">

			<div class="col-md-4" >
				<div class="bgfbox-first bg-primary" >
					<div class="bgfbox-content">
						<div class="bgfbox-text-wrap">
							<h2 class="h1">Welcome To Citizen News Portal</h2>
							<a class="read-more" href="#">Learn More <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> </a><br><br><br><br>
								<input type="submit" name="update" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="Update" value="update" style="background:none;border:none;float:left;">
							<form action="log.php" method="post">

								<input type="submit" name="out" value="Logout" style="background:none;border:none;float:right;">
							</form>
						</div>
						<!-- / .bgfbox-text-wrap -->
					</div>
					<!-- / .bgfbox-content -->
				</div>
				<!-- / .bgfbox-first -->
			</div>

			<div class="col-md-4">
				<div class="bgfbox-content bg-white bg-hover-inverse bg-hover-fade">
					<!-- / .bgfbox-icon-wrap -->
					<div class="bgfbox-text-wrap">
						<?php
							require_once "fetchdata.php";	
							
							$result = check_pic_path($_SESSION["id"]);
							$value=mysqli_fetch_array($result,MYSQLI_ASSOC);
							
							if($value["userpic"]!=null){
								echo "<img src='../".$value["userpic"]."' class='img-circle' alt='Profile-Picture' width='200' height='200' style='margin-left:13%;'><br>";
							}else{
								echo "<img src='../images/defaultuser.jpg' class='img-circle' alt='Profile-Picture' width='200' height='200' style='margin-left:13%;'><br>";
							}
							echo"<form action='log.php' method='post' enctype='multipart/form-data'>";
							echo "<label for='uploadbtn' style='margin-left:65%;color:blue;text-decoration:underline;'>Edit</label>";
							echo "<input type='file' name='file' id='uploadbtn' style='display:none;'>";
							echo "<input type='submit' value='upload' name='uploadbtn'  style='margin-left:2%;color:black;text-decoration:none;border:none;'>";
							echo"</form>";
							
							$result1=getdetails($_SESSION["id"]);
							$value1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
							
							echo "<p style='margin-left:40%;'>".$value1["username"]."</p>";
							echo "<p class='small' style='margin-left:25%;'>".$value1["emailaddress"]."</p>";
						 ?>
					</div>
					<!-- / .bgfbox-text-wrap -->
				</div>
				<!-- / .bgfbox-content -->
			</div>

			<div class="col-md-4">
				<div class="bgfbox-content bg-white bg-hover-inverse bg-hover-fade">
					<!-- / .bgfbox-icon-wrap -->
					<div class="bgfbox-text-wrap">
						<h3 class="title">Submit news</h3>
					<form action="log.php" method="post" enctype="multipart/form-data">
						<input type="text" name="title" class="form-control" placeholder="headline" required=""><br>
						<input type="text" name="descrip" class="form-control" placeholder="description" required=""><br>
						<select name="category">
						<option value="World">World</option>
						<option value="Business">Business</option>
						<option value="Tech">Tech</option>
						<option value="Entertainment">Entertainment</option></select><br><br>
						<input type="file" value="upload the image" style="margin-bottom:23px;" name='file'>
						
						<input type="submit" name="newsupload" value="Submit" class="btn btn-primary">
					</form><br>
					</div>
					<!-- / .bgfbox-text-wrap -->
				</div>
				<!-- / .bgfbox-content -->
			</div>
			<?php
			
			
			if($value["education"]!=null){
				echo "<div class='col-md-4'>";
				echo "<div class='bgfbox-content bg-white bg-hover-inverse bg-hover-fade'>";
					echo "<div class='bgfbox-text-wrap'>";
						echo "<h4>Education</h4>";
						echo "<p>".$value["education"]."</p>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
			}
			
			if($value["experience"]!=null){
				echo "<div class='col-md-4'>";
				echo "<div class='bgfbox-content bg-white bg-hover-inverse bg-hover-fade'>";
					echo "<div class='bgfbox-text-wrap'>";
						echo "<h4>Experience</h4>";
						echo "<p>".$value["experience"]."</p>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
			}

			if($value1["address"]!=null){
				echo "<div class='col-md-4'>";
				echo "<div class='bgfbox-content bg-white bg-hover-inverse bg-hover-fade'>";
					echo "<div class='bgfbox-text-wrap'>";
						echo "<h4>Contact</h4>";
						echo "<p>".$value1["address"]."</p>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
			}
			
			
			$result = getnews($_SESSION["id"]);
			
			if($result->num_rows!=0){
					echo "<div class='col-md-4'>";
					echo "<div class='bgfbox-content bg-white bg-hover-inverse bg-hover-fade'>";
					echo "<div class='bgfbox-text-wrap'>";
						echo "<h2 class='h1' style='text-decoration:underline;'>Recently Uploaded News</h2>";
					echo "</div>";
					echo "</div>";
					echo "</div>";
				while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					if($row["verified"]==1){
						echo "<div class='col-md-4'>";
						echo "<div class='bgfbox-content bg-white bg-hover-inverse bg-hover-fade'>";
						echo "<div class='bgfbox-text-wrap'>";
						if($row["path"]!=null){
							echo "<img src='../".$row["path"]."' alt='Profile-Picture' width='250' height='200' style='border-radius:10px;'><br>";
						}
						echo "<h4>".$row["headline"]."</h4>";
						echo "<p>".$row["sdescription"]."</p>";
						echo "</div>";
						echo "</div>";
						echo "</div>";
					}
				}
			}
			
			?>
			
			
			


		</div>
		<!-- / .flex-row -->
	</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter about your Education and experience</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="log.php" method="post">
      <div class="modal-body">
       
          <div class="form-group">
            <label for="message-text" class="col-form-label">Education:</label>
            <textarea class="form-control" name="edu-text"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Experience:</label>
            <textarea class="form-control" name="ex-text"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Update" name="update-ex">
      </div
	  </form>
    </div>
  </div>
</div>
	<!-- / .container -->
</section>
<!-- / .bfgbox -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>

</body>
</html>
