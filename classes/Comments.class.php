<?php
	class Comments {
        
        private $commentid;
        private $user;
        private $message;
          private $state;
        private $task;
    
       

        
         public function getCommentId()
        {
            return $this->commentid;
        }

 
        public function setCommentId($commentid)
        {
            $this->commentid = $commentid;
        }
        
		
       public function getUser()
        {
            return $this->user;
        }

 
        public function setUser($user)
        {
            $this->user = $user;
        }
        
        public function getMessage()
        {
            return $this->message;
        }

 
        public function setMessage($message)
        {
            $this->message = $message;
        }
        
        public function getState()
        {
            return $this->state;
        }

 
        public function setState($state)
        {
            $this->state = $state;
        }
        
        public function getTask()
        {
            return $this->task;
        }

 
        public function setTask($task)
        {
            $this->task = $task;
        }
        
        
          
          
       
        
       



        
		public function addComment(){
            

$conn = Db::getInstance();

        $statement = $conn->prepare("INSERT INTO task_comments (user, message, state, task) VALUES (:uid, :message, :state, :task)");
        $statement -> bindValue(":uid", $this->getUser());
        $statement -> bindValue(":message", $this->getMessage());
              $statement -> bindValue(":state", $this->getState());
              $statement -> bindValue(":task", $this->getTask());


        $statement->execute();
            
		}
        
        
         public function getAllComments($task)
    {
$conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM task_comments WHERE task = :task");

            $statement->bindValue(":task", $task);
        $statement->execute();

        $result = $statement->fetchAll();
     return $result;
      
    }
        
        

    public function getAttends($event)
    {
$conn = Db::getInstance();
  $usersid = $_SESSION['usersID'];
        $statement = $conn->prepare("SELECT * FROM event_attends WHERE user = :usersid and event = :event");
         $statement->bindValue(":usersid", $usersid);
            $statement->bindValue(":event", $event);
        $statement->execute();

        $result = $statement->fetchAll();
      if (!empty($result[0]['id'])) {
        return true;
            } else {
            return false;
        }
    }
        
        
        
                 public function countAttends($event)
    {
$conn = Db::getInstance();

        $statement = $conn->prepare("SELECT COUNT(user) AS attendees FROM event_attends WHERE event = :event");

            $statement->bindValue(":event", $event);
        $statement->execute();

        $result = $statement->fetchAll();
     return $result;
      
    }
        
        
         public function deleteAttend($event)
    {
        $conn = Db::getInstance();
             
               $usersid = $_SESSION['usersID'];
        $statement = $conn->prepare("DELETE FROM event_attends WHERE user = :user and event = :event");
        $statement->bindValue(':user', $usersid);
        $statement->bindValue(':event', $event);
       $statement->execute();
    }  
        
        
           public function getPercentage($poll)
    {
$conn = Db::getInstance();

        $statement = $conn->prepare("SELECT voting_choices.name, 
        COUNT(voting_answers.answerid) * 100 / 
        (SELECT COUNT(*)
        FROM voting_answers 
        WHERE voting_answers.poll = :poll) AS percentage,
        COUNT(voting_answers.answerid) AS count
        FROM voting_choices 
        LEFT JOIN voting_answers 
        ON voting_choices.choiceid = voting_answers.choice
        WHERE voting_choices.poll = :poll
        GROUP BY voting_choices.choiceid
        ");

            $statement->bindValue(":poll", $poll);
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