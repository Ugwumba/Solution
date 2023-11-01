<?php

class Account{
	private $conn;
	private $table='users';

    public $id, $email;
    
	
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


    public function register() {
        if (isset($_POST["action"]) && $_POST["action"] == 1) {
            $error = $output = array();
    
            if (count(array_filter($_POST)) != count($_POST)) {
                $error['error'] = 'All fields are required';
            }
    
            if (empty($error)) {
                $email = $this->treat($_POST['email']);
                $password = $this->treat($_POST['password']);
                $password = md5(sha1($password));
    
                $checkemailSQL = "SELECT * FROM $this->table WHERE `email` = ?";
                $query = $this->conn->prepare($checkemailSQL);
                $query->execute([$email]);
    
                if ($query->rowCount() > 0) {
                    $output['error'] = true;
                    $output['message'] = 'Email is already taken.';
                } else {
                    // Insert the new user into the database
                    $insertSQL = "INSERT INTO $this->table (`email`, `password`) VALUES (?, ?)";
                    $insertQuery = $this->conn->prepare($insertSQL);
                    if ($insertQuery->execute([$email, $password])) {
                        $output['message'] = 'Registration successful';
                    } else {
                        $output['error'] = true;
                        $output['message'] = 'Registration failed. Please try again later.';
                    }
                }
            } else {
                $output['error'] = true;
                $output['message'] = $error['err'];
            }
        }
    
        echo json_encode($output);
    }
    



    public function login(){
        if (isset($_POST["action"]) && $_POST["action"] == 2) {
			$error=$output=array();
        	
        	if(count(array_filter($_POST))!=count($_POST)){
				$error['err']='All fields are required';
			}
			if (empty($error)) {
		        $email = $this->treat($_POST['email']); 
		        $password = $this->treat($_POST['password']); 
		        $password=md5(sha1($password));
		        $sql = "SELECT * FROM $this->table WHERE `email` =? AND `password` = ?";
		      	$query = $this->conn->prepare($sql);
		      	$query->execute([$email, $password]);

		     	if ($query->rowCount()>0) {
		      		$row = $query->fetch(PDO::FETCH_ASSOC); 
		    		$_SESSION['email'] = $row['email'];
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

    //change password
    function changepassword(){
		if($this->treat(isset($_POST['action']))){
			$guid = $_POST['guid'];
		    $oldpassword=$this->treat($_POST['oldpassword']);
		    $newpassword=$this->treat($_POST['newpassword']);
			$cnewpassword=$this->treat($_POST['cnewpassword']);
			$error=$output=array();
			if ($newpassword!==$cnewpassword) {
				$error['err']="New Password Mismatched";
			}
			$sql="SELECT password FROM $this->table WHERE `id`=?";
		    $query = $this->conn->prepare($sql);
		    $query->execute([$guid]);
			$row = $query->fetch(PDO::FETCH_ASSOC); 
			if (!empty($oldpassword)) {
				if($row['password']!==md5(sha1($oldpassword))){
					$error['err']="Old password is Incorrect";
				}
			}
			if (empty($cnewpassword)) {
				$error['err']="Confirm new Password";
			}
			if (empty($newpassword)) {
				$error['err']="New Password is required";
			}
			if (empty($oldpassword)) {
				$error['err']="Old password is required";
			}
			if(empty($error)){
				$newpassword=md5(sha1($newpassword));
				$sql = "UPDATE $this->table SET `password` = ? WHERE id = ?";
				$query = $this->conn->prepare($sql);
				if($query->execute([$newpassword, $guid])){
					$output['message'] = 'Password Changed successfully';
				}else{
					$output['error']=true;
					$output['message'] = $this->conn->error;
				}
			}else{
				$output['error']=true;
				$output['message'] = $error['err'];
			}
		}
		echo json_encode($output);
	}

	



}

?>