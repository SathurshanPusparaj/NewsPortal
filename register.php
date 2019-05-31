<?php
require_once 'form-register.php';
require_once 'src/my_file_check.php';

if(isset($_POST["regbtn"])){
	if(isset($_POST["uname"])&isset($_POST["chkbx"])&isset($_POST["email"])&isset($_POST["password"])&isset($_POST["gender"])&isset($_POST["locate"])){
	
		$value = checkfield("username",$_POST["uname"]);
		if($value){
			echo '<script type="text/javascript"> alert("This username already available") </script>';
			
		}	
		else{
			$value = checkfield("emailaddress",$_POST["email"]);
			if($value){
				echo '<script type="text/javascript"> alert("This emailadress already available") </script>';
			}else{
				require_once 'lib/insert_data.php';
				$column = array("username","emailaddress","password","address","gender","dob");
				$data = array();
				$data[0]=$_POST["uname"];
				$data[1]=$_POST["email"];
				$data[2]=$_POST["password"];
				$data[3]=$_POST["locate"];
				$data[4]=$_POST["gender"];
				$data[5]=$_POST["bdate"];
			
				insert_data($GLOBALS['dbconnect'],"memberinfo",$column,$data);
			}
		}
	}
}
	
?>