<?php
	class Tasks {
        
        private $tasksid;
        private $taskname;
        private $deadline;
        private $message;
        private $owner;
        private $type;

        
         public function getTasksID()
        {
            return $this->tasksid;
        }

 
        public function setTasksID($tasksid)
        {
            $this->tasksid = $tasksid;
        }
        
		
       public function getTaskName()
        {
            return $this->taskname;
        }

 
        public function setTaskName($taskname)
        {
            $this->taskname = $taskname;
        }
        
        
        public function getDeadline()
        {
            return $this->deadline;
        }

 
        public function setDeadline($deadline)
        {
            $this->deadline = $deadline;
        }
        
        
            public function getMessage()
        {
            return $this->message;
        }

 
        public function setMessage($message)
        {
            $this->message = $message;
        }
          
        public function getType()
        {
            return $this->type;
        }

 
        public function setType($type)
        {
            $this->type = $type;
        }
        
       
           public function getOwner()
        {
            return $this->owner;
        }

 
        public function setOwner($owner)
        {
            $this->owner = $owner;
        }
        
      



        
		public function addTask(){
            

$conn = Db::getInstance();
	       
  
        $statement = $conn->prepare("INSERT INTO tasks (taskname, deadline, message, owner, type) VALUES (:taskname, :deadline, :message, :owner, :type);");
            
        $statement -> bindValue(":taskname", $this->getTaskName());
        $statement -> bindValue(":deadline", $this->getDeadline());
        $statement -> bindValue(":message", $this->getMessage());
              $statement -> bindValue(":owner", $this->getOwner());
        $statement -> bindValue(":type", $this->getType());


        $statement->execute();
            
		}
        
        
        	public function updateTask(){
            

$conn = Db::getInstance();
	       
  
        $statement = $conn->prepare("UPDATE tasks SET taskname = :taskname, deadline = :deadline, message = :message, owner = :owner, type = :type WHERE tasksID = :tasksID");
           $statement -> bindValue(":tasksID", $_GET['id']);   
        $statement -> bindValue(":taskname", $this->getTaskName());
        $statement -> bindValue(":deadline", $this->getDeadline());
        $statement -> bindValue(":message", $this->getMessage());
              $statement -> bindValue(":owner", $this->getOwner());
        $statement -> bindValue(":type", $this->getType());


        $statement->execute();
            
		}

    public function getTasks()
    {
$conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM tasks ORDER BY deadline asc");

        $statement->execute();

        $result = $statement->fetchAll();
        return $result;
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