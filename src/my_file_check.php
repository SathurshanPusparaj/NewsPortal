<?php
	require_once 'config/DBconfig.php';
	$dbconnect = getconnection();
	
		function checkfield($field,$string){
			$query = "select *from memberinfo where $field LIKE '$string%' ";
			$result = mysqli_query($GLOBALS['dbconnect'],$query);
		
			if(!$result){
				echo "unable to connect";
			
			}else{
				if(mysqli_num_rows($result)>0){
					return true;
				}else{
					return false;
				}
			
			}
		}
		
		function verifylogin($uname,$pword){
			$query = "select *from memberinfo where emailaddress = '$uname' AND password = '$pword'";
			$result = mysqli_query($GLOBALS['dbconnect'],$query);
			
			if(!$result){
				echo "unable to connect".mysqli_error($GLOBALS['dbconnect']);
			
			}else{
				if(mysqli_num_rows($result)>0){
					$row = mysqli_fetch_array($result);
					$ar=array($row[0],$row[7]);
					return $ar;
				}else{
					return null;
				}
			
			}
		}
		
		function check_news(){
			$query = "select *from news order by udate desc";
			$result = mysqli_query($GLOBALS['dbconnect'],$query);
			
			if(!$result){
				echo "unable to connect".mysqli_error($GLOBALS['dbconnect']);
			
			}else{
				return $result;
			}
		}
		
		function check_category($type){
			$query = "select *from news where category ='".$type."' order by udate desc";
			$result = mysqli_query($GLOBALS['dbconnect'],$query);
			
			if(!$result){
				echo "unable to connect".mysqli_error($GLOBALS['dbconnect']);
			
			}else{
				return $result;
			}
		}
		
		function detailnews($newsid){
			$query = "select headline,sdescription,ldescription,path,udate from news where nid = ".$newsid;
			$final = mysqli_query($GLOBALS['dbconnect'],$query);
			
			if(!$final){
				echo "unable to connect".mysqli_error($GLOBALS['dbconnect']);
			
			}else{
				return $final;
			}
		}
		
		function insertworkerlog($id){
			$d= getconnection();
			$sql = "insert into userlog(uid,signin)values(".$id.",'".date('Y-m-d H:i:s')."')";
			
			$final = mysqli_query($d,$sql);
			
			if(!$final){
				echo "unable to connect".mysqli_error($d);
			}else{
				
				return mysqli_insert_id($d);
			}
		}
		function search($keyword){
			$query = "select *from news where sdescription like '%$keyword%' order by udate desc";
			$result = mysqli_query($GLOBALS['dbconnect'],$query);
			
			if(!$result){
				echo "unable to connect".mysqli_error($GLOBALS['dbconnect']);
			
			}else{
				return $result;
			}
		}
?>