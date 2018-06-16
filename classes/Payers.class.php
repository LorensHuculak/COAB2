<?php
	class Payers {
        
        private $id;
        private $user;
        private $paid;
        private $bill;
        private $calcprice;

        
         public function getId()
        {
            return $this->id;
        }

 
        public function setId($id)
        {
            $this->id = $id;
        }
        
		
       public function getUser()
        {
            return $this->user;
        }

 
        public function setUser($user)
        {
            $this->user = $user;
        }
        
        
        public function getPaid()
        {
            return $this->paid;
        }

 
        public function setPaid($paid)
        {
            $this->paid = $paid;
        }
        
        
            public function getBill()
        {
            return $this->bill;
        }

 
        public function setBill($bill)
        {
            $this->bill = $bill;
        }
          
     
        
       
       

        
		public function addPayer(){
            

$conn = Db::getInstance();
  
        $statement = $conn->prepare("INSERT INTO bills_users (user, bill, paid) VALUES (:user, :bill, :paid)");
            
        $statement -> bindValue(":user", $this->getUser());
        $statement -> bindValue(":bill", $this->getBill());
         $statement -> bindValue(":paid", $this->GetPaid());
            
       

        $statement->execute();
            
		}
        
        
          public function removePayer($payersid){
              
$conn = Db::getInstance();
        $statement = $conn->prepare("DELETE FROM bills_users WHERE id = :id");
        $statement->bindValue(':id', $payersid);
       $statement->execute();
    }

    public function getPayers($bill)
    {
$conn = Db::getInstance();

        $statement = $conn->prepare("SELECT DISTINCT id, user, bill, paid FROM bills_users where bill = :billid");
   $statement -> bindValue(":billid",  $bill);
      
        $statement->execute();

        $result = $statement->fetchAll();
        return $result;
    }
        
        
         public function updatePayment($payerid)
    {
  $conn = Db::getInstance();;
   
        $statement = $conn->prepare("UPDATE bills_users SET paid = :paid WHERE id = :payerid and user = :user");
                   $statement -> bindValue(":payerid", $payerid);
     $statement -> bindValue(":paid", $this->getPaid());
                $statement -> bindValue(":user", $this->getUser());
      

        $statement->execute();
    
    }
        
        
        
        public function getSingleTask()
    {
$conn = Db::getInstance();
      
        
        $statement = $conn->prepare("SELECT * FROM tasks WHERE tasksID = :tasksID");
               $statement->bindValue(":tasksID", $_GET['id']);

        $statement->execute();

        $result = $statement->fetchAll();
        return $result;
    }
        

       // LISTS FILTER 
    public function getListTasks()
    {
$conn = Db::getInstance();
  $usersid = $_SESSION['usersID'];
        $statement = $conn->prepare("SELECT * FROM tasks WHERE owner = :usersid and parentlist = :parentlist ORDER BY deadline asc");
        $statement -> bindValue(":usersid",  $usersid);
          $statement -> bindValue(":parentlist",  $_GET['name']);
        $statement->execute();

        $result = $statement->fetchAll();
        return $result;
    }
        
        // FOLLOW FILTER
         public function getForeignTasks()
    {
$conn = Db::getInstance();
        $statement = $conn->prepare("SELECT * FROM tasks WHERE parentlist = :parentlist ORDER BY deadline asc");
          $statement -> bindValue(":parentlist",  $_GET['name']);
        $statement->execute();

        $result = $statement->fetchAll();
        return $result;
    }
        
        
        // PERMISSION TASK MANIPULATION
             public function getOwnership()
    {
$conn = Db::getInstance();
             
        $usersid = $_SESSION['usersID'];
        $taskid = $_GET['id'];
        $statement = $conn->prepare("SELECT tasksID FROM tasks WHERE tasksID = :tasksID and owner = :owner");
        $statement->bindValue(':tasksID', $taskid);  
        $statement->bindValue(':owner', $usersid);  
        $statement->execute();

        $result = $statement->fetchAll();
    
     
        if (!empty($result[0]['tasksID'])) {
        return $result[0]['tasksID'];
            } else {
            return false;
        }
    }
        
              // COURSE FILTER 
    public function getCourseTasks()
    {
$conn = Db::getInstance();
  $usersid = $_SESSION['usersID'];
        $statement = $conn->prepare("SELECT * FROM tasks WHERE usersid = :usersid and course = :course ORDER BY deadline asc");
        $statement -> bindValue(":usersid",  $usersid);
          $statement -> bindValue(":course",  $_GET['name']);
        $statement->execute();

        $result = $statement->fetchAll();
        return $result;
    }
		
		
      public function deleteTask($tasksid)
    {
        $conn = Db::getInstance();;
        $statement = $conn->prepare("DELETE FROM tasks WHERE tasksID = :tasksID");
        $statement->bindValue(':tasksID', $tasksid);
       $statement->execute();
    }  
	     
    public function deleteTasks($parentlist)
    {
        $conn = Db::getInstance();;
        $statement = $conn->prepare("DELETE FROM tasks WHERE parentlist = :parentlist");
        $statement->bindValue(':parentlist', $parentlist);
       $statement->execute();
    }
        
          public function updateTask()
    {
  $conn = Db::getInstance();;
   
        $statement = $conn->prepare("UPDATE tasks SET taskname = :taskname, course = :course, deadline = :deadline, worktime = :worktime, owner = :owner, parentlist = :parentlist WHERE tasksID = :tasksid");
                   $statement -> bindValue(":tasksid", $_GET['id']);
     $statement -> bindValue(":taskname", $this->getTaskName());
        $statement -> bindValue(":course", $this->getCourse());
        $statement -> bindValue(":deadline", $this->getDeadline());
        $statement->bindValue(":worktime", $this->getWorkTime());
              $statement -> bindValue(":owner", $this->getOwner());
        $statement -> bindValue(":parentlist", $this->getParentList());

        $statement->execute();
    
    }
        
          // CHECKBOX - DEADLINE STATE
        
        public function setDone($taskid){
             $conn = Db::getInstance();;
            
            $state = "1";
               $statement = $conn->prepare("UPDATE tasks SET state = :state WHERE tasksID = :tasksid");
               $statement -> bindValue(":state", $state );
            $statement -> bindValue(":tasksid", $taskid);
              $statement->execute();
            
        }
        
          public function setUndone($taskid){
             $conn = Db::getInstance();;
            
            $state = "0";
               $statement = $conn->prepare("UPDATE tasks SET state = :state WHERE tasksID = :tasksid");
               $statement -> bindValue(":state", $state );
            $statement -> bindValue(":tasksid", $taskid);
              $statement->execute();
            
        }
        
          //  GET TOTAL WORKTIME
        public function getHours(){
    
   
      $conn = Db::getInstance();
      

        $statement = $conn->prepare("SELECT SUM(worktime) AS totalwork FROM tasks WHERE owner = :usersid;");
                 $statement -> bindValue(":usersid", $this->getUsersID);
        $statement->execute();

        $result = $statement->fetchAll();
        $sumhours = $result[0]['totalwork'];
        return $sumhours;
}
        
// CHECK IF DONE
           public function checkState($taskid){
    
   
      $conn = Db::getInstance();
      

        $statement = $conn->prepare("SELECT state FROM tasks WHERE tasksID = :taskid;");
        $statement -> bindValue(":taskid", $taskid);
        $statement->execute();

        $result = $statement->fetchAll();
            $currentstate = $result[0]['state'];
     return $currentstate;
}
        
      
        
        
  
        
        
    }






?>