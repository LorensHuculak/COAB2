<?php
class User {

    private $db;
    private $username;
    private $email;
    private $password;
    private $usersid;
    private $household;
    private $area;
    private $admin;
    
      public function getUsersID()
        {
            return $this->usersid;
        }

 
        public function setUsersID($username)
        {
            $this->usersid = $usersid;
        }
    
       public function getUsername()
        {
            return $this->username;
        }

 
        public function setUsername($username)
        {
            $this->username = $username;
        }
        
		
       public function getEmail()
        {
            return $this->email;
        }

 
        public function setEmail($email)
        {
            $this->email = $email;
        }
        
        public function getPassword()
        {
            return $this->password;
        }

 
        public function setPassword($password)
        {
            $this->password = $password;
        }
    
     public function getPicture()
        {
            return $this->picture;
        }

 
        public function setPicture($picture)
        {
            $this->picture = $picture;
        }
    
      public function getHousehold()
        {
            return $this->household;
        }

 
        public function setHousehold($household)
        {
            $this->household = $household;
        }
    
      public function getArea()
        {
            return $this->area;
        }

 
        public function setArea($area)
        {
            $this->area = $area;
        }
    
      public function getAdmin()
        {
            return $this->admin;
        }

 
        public function setAdmin($admin)
        {
            $this->admin = $admin;
        }

    function __construct($db){
    

    	$this->db = $db;
    }
    
    

        // CHECK IF USER CAN LOGIN
	private function permissionLogin($username){

		try {
              
      
			$statement = $this->db->prepare('SELECT password, username, usersID FROM users WHERE username = :username');
			$statement->execute(array('username' => $username));

			return $statement->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
    
  

	public function login($username,$password){

		$row = $this->permissionLogin($username);

		if(password_verify($password,$row['password']) == 1){

		    $_SESSION['loggedin'] = true;
		    $_SESSION['username'] = $row['username'];
		    $_SESSION['usersID'] = $row['usersID'];
            
            $check = $this->isAdmin();            
            if ($check) {
                     $_SESSION ['admin'] = 'admin';  
            }
            
                
		    return true;
            
            
		}
        
      
        
	}

	public function logout(){
		session_destroy();
	}

	public function isLoggedIn(){
        
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}
    

    
    public function isAdmin () {
  $conn = Db::getInstance();
      
            $usersid = $_SESSION['usersID'];
        $statement = $conn->prepare("SELECT type FROM users WHERE usersid = :usersid");
               $statement->bindValue(":usersid", $usersid);

        $statement->execute();

        $result = $statement->fetchAll();
        if ($result[0][type] != 'Roommate' ) {
            return true;
        }
        
        else {
            
            return false;
        }
    }
    
    
        public function getUsers()
    {
$conn = Db::getInstance();
      
            $usersid = $_SESSION['usersID'];
        $statement = $conn->prepare("SELECT * FROM users WHERE usersid != :usersid");
               $statement->bindValue(":usersid", $usersid);

        $statement->execute();

        $result = $statement->fetchAll();
        return $result;
    }
    
    
        public function getAdmins()
    {
$conn = Db::getInstance();
      
            $usersid = $_SESSION['usersID'];
        $statement = $conn->prepare("SELECT * FROM users WHERE beheerder = :beheerder");
               $statement->bindValue(":beheerder", 1);

        $statement->execute();

        $result = $statement->fetchAll();
        return $result;
    }
    
           public function getSingleUser($usersid)
    {
$conn = Db::getInstance();
      
        
        $statement = $conn->prepare("SELECT * FROM users WHERE usersID = :usersID");
               $statement->bindValue(":usersID", $usersid);

        $statement->execute();

        $result = $statement->fetchAll();
        return $result;
    }
    
    // GET TOTAL WORKTIME
         public function getHours(){
    
   $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT SUM(worktime) AS totalwork FROM tasks WHERE owner = :usersid;");
                 $statement -> bindValue(":usersid", $_GET['id']);
        $statement->execute();

        $result = $statement->fetchAll();
        $sumhours = $result[0]['totalwork'];
        return $sumhours;
}
        

    
    
     public function editProfile()
    {
        $conn = Db::getInstance();
         
$usersid = $_SESSION['usersID'];
   
        $statement = $conn->prepare("UPDATE users SET username = :username, email = :email WHERE usersid = :usersid");
        $statement->bindValue(":username", $this->getUsername());
        $statement->bindValue(":email", $this->getEmail());
        $statement->bindValue(":usersid", $usersid);
        $statement->execute();
    
       $updatename = $this->getUsername();
    $_SESSION['username'] = $updatename;
        
    }
    
    
    
         public function editHousehold()
    {
        $conn = Db::getInstance();
         
$usersid = $_SESSION['usersID'];
   
        $statement = $conn->prepare("UPDATE users SET gezin = :gezin, oppervlakte = :oppervlakte, beheerder = :beheerder WHERE usersid = :usersid");
        $statement->bindValue(":gezin", $this->getHousehold());
        $statement->bindValue(":oppervlakte", $this->getArea());
        $statement->bindValue(":beheerder", $this->getAdmin());      
        $statement->bindValue(":usersid", $usersid);
        $statement->execute();
    
 
        
    }
    
    
    
    public function uploadPicture(){ 
	
        $pic = $_FILES['picture'];
        
        	if(!empty($pic)){
				$pic_name = $pic['name'];
				$temp_name = $pic['tmp_name'];
				$img_type = $pic['type'];
				$extension = $this->getExtension($img_type);
				$target_path = "assets/img/uploads/".$pic_name;

				if(move_uploaded_file($temp_name, $target_path)){
                // IF UPLOAD SUCCES => SET PICTURE  
			        $conn = Db::getInstance();
         
$usersid = $_SESSION['usersID'];
        $statement = $conn->prepare("UPDATE users SET picture = :picture WHERE usersid = :usersid");
        $statement->bindValue(":picture", $this->getPicture());
        $statement->bindValue(":usersid", $usersid);
        $statement->execute();
                    
				}
			}
        
		}

		public function getExtension($img_type){
			if(empty($imagetype)){
				return false;
			}else{
				switch($imagetype){
					case 'image/bmp': return '.bmp';
					case 'image/gif': return '.gif';
					case 'image/jpeg': return '.jpg';
					case 'image/png': return '.png';
					default: return false;
				}
			}
		}
    
    public function getProfilePicture() {
        
        $conn = Db::getInstance();
      
        $usersid = $_SESSION['usersID'];
        $statement = $conn->prepare("SELECT picture FROM users WHERE usersID = :usersID");
        $statement->bindValue(":usersID", $usersid);

        $statement->execute();

        $result = $statement->fetchAll();
        return $result;
    }
    
    // CHECK FOR USER PERMISSIONS
      public function checkType($userid){
    
   
      $conn = Db::getInstance();
      

        $statement = $conn->prepare("SELECT type FROM users WHERE usersID = :userid;");
        $statement -> bindValue(":userid", $userid);
        $statement->execute();

        $result = $statement->fetchAll();
            $currenttype = $result[0]['type'];
     return  $currenttype;
}
    
    
          public function makeAdmin($userid){
              
             $conn = Db::getInstance();;
            
            $type = "Admin";
               $statement = $conn->prepare("UPDATE users SET type = :type WHERE usersID = :userid");
               $statement -> bindValue(":type", $type );
            $statement -> bindValue(":userid", $userid);
              $statement->execute();
            
        }
        
          public function makeStudent($userid){
             $conn = Db::getInstance();;
            
            $type = "Roommate";
               $statement = $conn->prepare("UPDATE users SET type = :type WHERE usersID = :userid");
               $statement -> bindValue(":type", $type );
            $statement -> bindValue(":userid", $userid);
              $statement->execute();
            
        }
    
    

}






?>