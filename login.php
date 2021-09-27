<?php
include_once 'connection/DBConnection.php';
$conn = DBConnection::getConnection();
$response = array();

if(isTheseParametersAvailable(array('username', 'password'))){

      $username = $_POST['username']; 
	  $password = $_POST['password']; 
	

	$query = "SELECT * FROM `webuser` WHERE webuser_email=:email AND webuser_password=:password";
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $stmt=$conn->prepare($query);
    $stmt->bindValue(":email", $username,PDO::PARAM_STR);
    $stmt->bindValue(":password", $password,PDO::PARAM_STR);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
 //if the user exist with given credentials 
	if($result > 0){
		 $response['status'] = true; 
		 $response['message'] = 'Login successfull'; 
		 $response['user'] = $result; 
	}else{
	 $response['status'] = false; 
	 $response['message'] = 'Invalid username or password';
	}
}


else{
	$response['status'] = false; 
	$response['message'] = 'Invalid parameter pass';
}
echo json_encode($response);
exit();


function isTheseParametersAvailable($params){
	 foreach($params as $param){
	 	if(!isset($_POST[$param])){
			 return false; 
	 	}
	 }
	 //return true if every param is available 
	 return true; 
 }




?>