<?php 
include 'DBConfig.php';
// Create connection


	$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);


	 $u_id = $obj['u_id'];
	 $role = $obj['role'];
 
	 if($role=="admin"){
		 $q = "SELECT a_id,aname,aphoneNumber,acompleteAddress,asocietyName,atype,aDemand,aarea,aDirection,date FROM available_rent";
	 }
	 else{
		 $q = "SELECT a_id,aname,aphoneNumber,acompleteAddress,asocietyName,atype,aDemand,aarea,aDirection,date FROM available_rent where u_id in ('$u_id','1')";
	 }
	

	$result= $con->query($q);
	
	
		if($result->num_rows>0){

            while($row[] = $result->fetch_assoc()) {

                $tem = $row;
                
                $json = json_encode($tem);
                
                }
                echo $json;	
		}
		else
		{		
		    echo  json_encode('No Data'); // alert msg in react native

		}
	
	
?>