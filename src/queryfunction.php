<?php
	require_once "../config/DBconfig.php";
	
	$connection = getconnection();
	
	
	if(isset($_GET["udelete"])){
		$userid = $_GET["ndelete"];
		delete_content("memberinfo","uid",$userid);
	}else if(isset($_GET["ndelete"])){
		$newsid = $_GET["ndelete"];
		delete_content("news","nid",$newsid);
	}else if($_GET["nverified"]){
		$verifyid = $_GET["nverified"];
		update_content($verifyid);
	}
	
	
	function delete_content($table,$colname,$id){
		$sql = "delete from ".$table." where ".$colname." =".$id;
	
		$final = mysqli_query($GLOBALS['connection'],$sql);
		
		if(!$final){
			echo "error".mysqli_error($GLOBALS['connection']);
		}else{
			 header("Location:admindashboard.php");
		}
		
	}
	function update_content($id){
		$sql = "update news set verified=1 where nid = ".$id;
	
		$final = mysqli_query($GLOBALS['connection'],$sql);
		
		if(!$final){
			echo "error".mysqli_error($GLOBALS['connection']);
		}else{
			 header("Location:admindashboard.php");
		}
		
	}
?>