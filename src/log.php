<?php
	session_start();
	require_once '../config/DBconfig.php';
	$dbconnect = getconnection();
	$delvalue;
	if(isset($_POST["out"])){
		signout();
	}
	function signout(){
		$query = "update userlog set signout='".date('Y-m-d H:i:s')."'where Logid=".$_SESSION["logid"];
			$result = mysqli_query($GLOBALS['dbconnect'],$query);
		
			if(!$result){
				echo "unable to connect".mysqli_error($GLOBALS['dbconnect']);
			
			}else{
				session_destroy();
				header("location:../index.php");
			
			}
	}
	
	if(isset($_POST["uploadbtn"])){
		
		uploadpic("profile");
	}
	
	function uploadpic($i){
		$name=$_FILES['file']['name'];
		$extension=strtolower(substr($name,strpos($name,'.')+1));
		
		$tmp_name = $_FILES['file']['tmp_name'];
		
		if(isset($name)){
			if(!empty($name)){
				if(($extension=='jpg'||$extension=='jpeg'||$extension=='png')){
					if($i=="profile"){
						$location = "images/".$i."/";
						
						move_uploaded_file($tmp_name,"../".$location.$name);
						$GLOBALS['delvalue']=findpath();
						updatepath($location.$name);
					}else{
						$location = "images/".$i."/";
						move_uploaded_file($tmp_name,"../".$location.$name);
						return $location.$name;
					}
				}
				else{
					if($_SESSION["user"]=="power"){
						header("Location:admindashboard.php");
				}else{
					header("Location:userdashboard.php");
					}
				}
			}
		}
	}
	function findpath(){
		$query = "select userpic from memberdetails where uid =".$_SESSION["id"];
		
		$result = mysqli_query($GLOBALS['dbconnect'],$query);
		
		if(!$result){
			echo "error".mysqli_error($GLOBALS['dbconnect']);
		}else{
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			if($row["userpic"]!=null){
				return 1;
			}else{
				return 0;
			}
		}
	}
	function updatepath($location){
		if($GLOBALS['delvalue']==0){
			$query = "insert into memberdetails(uid,userpic) values(".$_SESSION["id"].",'".$location."')";
		}else{
			$query = "update memberdetails set userpic='".$location."' where uid =".$_SESSION["id"];
		}
		
		$result = mysqli_query($GLOBALS['dbconnect'],$query);
		
		if(!$result){
			echo "error".mysqli_error($GLOBALS['dbconnect']);
		}else{
			if($_SESSION["user"]=="power"){
				header("Location:admindashboard.php");
			}else{
				header("Location:userdashboard.php");
			}
		}
	}
	
	if(isset($_POST["newsupload"])){
		
		$head=$_POST["title"];
		$sdes=$_POST["descrip"];
		$category =$_POST["category"];
		$date=date('Y-m-d');
		$v=0;
		
		$name=$_FILES['file']['name'];
		
		if(isset($name)){
			$upload = uploadpic("news");
			$query = "insert into news(uid,category,headline,sdescription,path,verified,udate) values(".$_SESSION["id"].",'".$category."','".$head."','".$sdes."','".$upload."',".$v.",'".$date."')";
		}else{
			$query = "insert into news(uid,category,headline,sdescription,verified,udate) values(".$_SESSION["id"].",'".$category."','".$head."','".$sdes."',".$v.",'".$date."')";
		}
		
		$result = mysqli_query($GLOBALS['dbconnect'],$query);
		
		if(!$result){
			echo "error".mysqli_error($GLOBALS['dbconnect']);
		}else{
			header("Location:userdashboard.php");
		}
	}
	
	if(isset($_POST["adminnewsupload"])){
		
		$head=$_POST["title"];
		$sdes=$_POST["sdescrip"];
		$ldes=$_POST["ldescrip"];
		$category =$_POST["category"];
		$date=date('Y-m-d');
		$v=1;
		
		$name=$_FILES['file']['name'];
		
		if(isset($name)){
			$upload = uploadpic("news");
			$query = "insert into news(uid,category,headline,sdescription,ldescription,path,verified,udate) values(".$_SESSION["id"].",'".$category."','".$head."','".$sdes."','".$ldes."','".$upload."',".$v.",'".$date."')";
		}else{
			$query = "insert into news(uid,category,headline,sdescription,ldescription,verified,udate) values(".$_SESSION["id"].",'".$category."','".$head."','".$sdes."','".$ldes."',".$v.",'".$date."')";
		}
		
		$result = mysqli_query($GLOBALS['dbconnect'],$query);
		
		if(!$result){
			echo "error".mysqli_error($GLOBALS['dbconnect']);
		}else{
			header("Location:admindashboard.php");
		}
	}
	
	if(isset($_POST["update-ex"])){
		
		if(isset($_POST["edu-text"])||isset($_POST["ex-text"])){
			$check=findpath();
			
		if($check==0){
			$query = "insert into memberdetails(uid,education,experience) values(".$_SESSION["id"].",'".$_POST["edu-text"]."','".$_POST["ex-text"]."')";
		}else{
			$query = "update memberdetails set education='".$_POST["edu-text"]."' and experience='".$_POST["ex-text"]."' where uid =".$_SESSION["id"];
		}
		
		$result = mysqli_query($GLOBALS['dbconnect'],$query);
		
			if(!$result){
				echo "error".mysqli_error($GLOBALS['dbconnect']);
			}else{
				header("Location:userdashboard.php");
			}
		}
		
	}
	
?>