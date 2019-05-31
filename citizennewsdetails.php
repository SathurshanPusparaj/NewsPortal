<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Citizen</title>

    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.min.css">
    <link rel="stylesheet" href="http://myjslib.qiniudn.com/fonts/roboto/roboto.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

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



    </style>
  </head>
  <body>
    <!-- Always shows a header, even in smaller screens. -->
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header" style="background-color: #FFFFFF;">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title" style="color: #77C159;">Citizen</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>

      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
	  <a class="mdl-navigation__link" href="index.php">Home</a>
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
          <input class="mdl-textfield__input" type="text" name="sample"
                 id="waterfall-exp" style="color: black;">
        </div>
      </div>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Citizen</span>
    <nav class="mdl-navigation">
		<a class="mdl-navigation__link" href="index.php">Home</a>
      <a class="mdl-navigation__link" href="categorynews.php?type=world">World</a>
      <a class="mdl-navigation__link" href="categorynews.php?type=business">Business</a>
      <a class="mdl-navigation__link" href="categorynews.php?type=tech">Tech</a>
      <a class="mdl-navigation__link" href="categorynews.php?type=entertainment">Entertainment</a>
    </nav>
  </div>

  <main class="mdl-layout__content" style="background-color:#EEEEEE;">
    <div class="page-content" >
	<?php
		require_once 'src/my_file_check.php';
		
		if(isset($_GET["nid"])){
			$id= $_GET["nid"];
			$last = detailnews($id);
			
			while($row=mysqli_fetch_array($last,MYSQLI_ASSOC)){
				if($row["path"]!=null){
					echo "<div class='card mb-3' style='margin:1% 20% 0% 20%;'>";
						echo "<img class='card-img-top' src='".$row["path"]."' alt='image'>";
							echo "<div class='card-block'>";
								echo "<p class='card-text'><small class='text-muted'>".$row["udate"]."</small></p>";
								echo "<h4 class='card-title'>".$row["headline"]."</h4>";
								echo "<p class='card-text'><small class='text-muted'>".$row["sdescription"]."</small></p>";
								echo "<p class='card-text'>".$row["ldescription"]."</p>";
							echo "</div>";
					echo "</div>";
				}else{
					echo "<div class='card mb-3' style='margin:1% 20% 0% 20%;'>";
							echo "<div class='card-block'>";
								echo "<p class='card-text'><small class='text-muted'>".$row["udate"]."</small></p>";
								echo "<h4 class='card-title'>".$row["headline"]."</h4>";
								echo "<p class='card-text'><small class='text-muted'>".$row["sdescription"]."</small></p>";
								echo "<p class='card-text'>".$row["ldescription"]."</p>";
							echo "</div>";
					echo "</div>";
				}
			}
			
			
		}
	
	
	?>
	</div> 
  </main>
  </div>
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </body>
</html>