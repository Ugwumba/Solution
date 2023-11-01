<?php

class Admin{
    private $conn;
    private $table='admin';

    public $id, $username;

    function __construct($db) {
		$this->conn = $db;
	}

    //function to escape inputs
    function treat($data){
        //$data=mysqli_real_escape_string($this->conn, trim($data));
        $data=htmlspecialchars($data);
        return $data;
      }
  
      function treat_file($data){
        $data=str_replace("/", "_", $data);
        return $data;
      }


      public function login(){
        if (isset($_POST["action"]) && $_POST["action"] == 2) {
			$error=$output=array();
        	
        	if(count(array_filter($_POST))!=count($_POST)){
				$error['err']='All fields are required';
			}
			if (empty($error)) {
		        $email = $this->treat($_POST['username']); 
		        $password = $this->treat($_POST['password']); 
		        $password=md5(sha1($password));
		        $sql = "SELECT * FROM $this->table WHERE `username` =? AND `password` = ?";
		      	$query = $this->conn->prepare($sql);
		      	$query->execute([$email, $password]);

		     	if ($query->rowCount()>0) {
		      		$row = $query->fetch(PDO::FETCH_ASSOC); 
		    		$_SESSION['username'] = $row['username'];
		            $output['message']='Login Successful';
		        }else{
		        	$output['error']=true;
		            $output['message']= 'Oops the Entered data is incorrect.';        
		        }
		    }else{
		    	$output['error']=true;
		        $output['message']= $error['err']; 
		    }
           
        }
        return json_encode($output);
    }

}
?>