<?php
	require "../config/DBconfig.php";
	
	$connection = getconnection();
	
	function num_entries($table){
	
		if($table=="memberinfo"){
			$sql = "select count(*) from memberinfo";
		}else{
			$sql = "select count(*) from news where verified=1";
		}
		
		
		$ans = mysqli_query($GLOBALS['connection'],$sql);
		
		if(!$ans){
			echo "error".mysqli_error($GLOBALS['connection']);
		}else{
			$row = mysqli_fetch_array($ans,MYSQLI_NUM);
			
			return $row[0];
		}
		
	}
	
	function logactivity(){
		$sql = "select m.username,l.signin,l.signout from memberinfo m inner join userlog l on m.uid=l.uid";
	
		$final = mysqli_query($GLOBALS['connection'],$sql);
		
		if(!$final){
			echo "error".mysqli_error($GLOBALS['connection']);
		}else{
			return $final;
		}
		
	}
	
	function display_users(){
		$sql = "select * from memberinfo";
	
		$final = mysqli_query($GLOBALS['connection'],$sql);
		
		if(!$final){
			echo "error".mysqli_error($GLOBALS['connection']);
		}else{
			return $final;
		}
	}
	function display_news($i){
		$sql = "select n.nid,n.headline,n.sdescription,n.udate,m.username from memberinfo m inner join news n on n.uid=m.uid where verified=".$i;
	
		$final = mysqli_query($GLOBALS['connection'],$sql);
		
		if(!$final){
			echo "error".mysqli_error($GLOBALS['connection']);
		}else{
			return $final;
		}
	}
	
?>