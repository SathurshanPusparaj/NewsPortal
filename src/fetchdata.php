<?php
require_once '../config/DBconfig.php';
	$dbconnect = getconnection();

	function check_pic_path($id){
		$query = "select *from memberdetails where uid =".$id;
		
		$result = mysqli_query($GLOBALS['dbconnect'],$query);
		
		if(!$result){
			echo "error".mysqli_error($GLOBALS['dbconnect']);
		}else{
			return $result;
		}
	}
	
	function getdetails($id){
			$query = "select *from memberinfo where uid =".$id;
			$result = mysqli_query($GLOBALS['dbconnect'],$query);
			
			if(!$result){
				echo "unable to connect".mysqli_error($GLOBALS['dbconnect']);
			
			}else{
				return $result;
			}
		}
		
		function getnews($id){
			$sql= "select *from news where uid =".$id;
			$data = mysqli_query($GLOBALS['dbconnect'],$sql);
			
			if(!$data){
				echo "unable to connect".mysqli_error($GLOBALS['dbconnect']);
			}else{
				return $data;
			}
		}
?>