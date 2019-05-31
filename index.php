<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Citizen</title>

    <!-- Page styles -->
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/material.min.css">
    <link rel="stylesheet" href="css/roboto.css">
    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/style.css">
    
    <style>
     .mdl-navigation .mdl-navigation__link{
       color: #757575;
       font-weight: 700;
       font-size: 14px;

      }
     .mdl-layout__header .mdl-layout__drawer-button {
        background: transparent;
        color: #767777;
      }
      .material-icons{
      color: #767777;
      }

	
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }


    </style>
  </head>
  <body>
    <!-- Always shows a header, even in smaller screens. -->
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header" onload="loadImage()">
  <header class="mdl-layout__header" style="background-color: #FFFFFF;">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title" style="color: #77C159;">Citizen</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>

      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
	  <a class="mdl-navigation__link" href="">Home</a>
        <a class="mdl-navigation__link" href="categorynews.php?type=world">World</a>
        <a class="mdl-navigation__link" href="categorynews.php?type=business">Business</a>
        <a class="mdl-navigation__link" href="categorynews.php?type=tech">Tech</a>
        <a class="mdl-navigation__link" href="categorynews.php?type=entertainment">Entertainment</a>
      </nav>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
        <label class="mdl-button mdl-js-button mdl-button--icon"
               for="waterfall-exp">
          <i class="material-icons">search</i>
        </label>
        <div class="mdl-textfield__expandable-holder">
		<form action="search.php" method="post">
          <input class="mdl-textfield__input" type="text" name="sample"
                 id="waterfall-exp" style="color: black;">
			</form>
        </div>
      </div>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Citizen</span>
    <nav class="mdl-navigation">
		<a class="mdl-navigation__link" href="">Home</a>
      <a class="mdl-navigation__link" href="categorynews.php?type=world">World</a>
      <a class="mdl-navigation__link" href="categorynews.php?type=business">Business</a>
      <a class="mdl-navigation__link" href="categorynews.php?type=tech">Tech</a>
      <a class="mdl-navigation__link" href="categorynews.php?type=entertainment">Entertainment</a>
	  <a class="mdl-navigation__link" href="form-login.php">Signin</a>
	  <a class="mdl-navigation__link" href="register.php">Register</a>
    </nav>
  </div>

  <main class="mdl-layout__content" style="background-color:#EEEEEE;">
    <div class="page-content" ><!-- Your content goes here -->
	
		<div class="btn-group" id="view-source">
                <button id='add-btn' class="btn btn-primary" style="display:none;"></button>
                <button id='scaleup-btn' class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Scale Up</button>
                <button id='scaledown-btn' class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Scale Down</button>
            </div>
		<section>
		
        <div class="wf-container">
		
			<?php
	
				require_once 'src/my_file_check.php';
	
				$final = check_news();
	
				while($row = mysqli_fetch_array($final,MYSQLI_ASSOC)){
			
				if($row["path"]!=null){
						
						echo "<div class='wf-box' style='background-color:white;overflow:auto;'>";
						echo "<img src='".$row["path"]."'>";
						echo "<div class='content'>";
						echo "<p>".$row["udate"]."</p>";
						echo "<h3>".$row["headline"]."</h3>";
						echo "<p>".$row["sdescription"]."</p>";
						if($row["ldescription"]!=null){
							echo "<a style='margin-left:30%;text-decoration:none;' href=citizennewsdetails.php?nid=".$row["nid"]."> read more-> </a>";
						}
						echo "</div>";
						echo "</div>";
				}else{
					echo "<div class='wf-box' style='background-color:white;overflow:auto;'>";
					echo "<div class='content'>";
                    echo "<h3>".$row["headline"]."</h3>";
                    echo "<p>".$row["sdescription"]."</p>";
					if($row["ldescription"]!=null){
							echo "<a style='margin-left:30%;text-decoration:none;' href=citizennewsdetails.php?nid=".$row["nid"]."> read more-> </a>";
					}
					echo "</div>";
					echo "</div>";
				}
				}
				?>
        </div>
    </section>

    </div> 
  </main>
  </div>
  
    <script src="js/material.min.js"></script>
	<script src="js/responsive_waterfall.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
