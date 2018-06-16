<?php
	class Bills {
        
        private $billid;
        private $name;
        private $date;
        private $deadline;
        private $price;
        private $type;
          private $owner;
          private $site;
          private $document;
        

        
         public function getBillId()
        {
            return $this->billid;
        }

 
        public function setBillId($billid)
        {
            $this->billid = $billid;
        }
        
		
       public function getName()
        {
            return $this->name;
        }

 
        public function setName($name)
        {
            $this->name = $name;
        }
        
         public function getDate()
        {
            return $this->date;
        }

 
        public function setDate($date)
        {
            $this->date = $date;
        }
        public function getDeadline()
        {
            return $this->deadline;
        }

 
        public function setDeadline($deadline)
        {
            $this->deadline = $deadline;
        }
        
        
            public function getPrice()
        {
            return $this->price;
        }

 
        public function setPrice($price)
        {
            $this->price = $price;
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
        
         
           public function getSite()
        {
            return $this->site;
        }

 
        public function setSite($site)
        {
            $this->site = $site;
        }
        
         
           public function getDoc()
        {
            return $this->document;
        }

 
        public function setDoc($document)
        {
            $this->document = $document;
        }
        
      



        
		public function addBill(){
            

$conn = Db::getInstance();
	       
  
        $statement = $conn->prepare("INSERT INTO bills (name, date, deadline, price, type, owner, site, document) VALUES (:name, :date, :deadline, :price, :type, :owner, :site, :document)");
            
        $statement -> bindValue(":name", $this->getName());
        $statement -> bindValue(":date", $this->getDate());
        $statement -> bindValue(":deadline", $this->getDeadline());
                    $statement -> bindValue(":price", $this->getPrice());
                    $statement -> bindValue(":type", $this->getType());
              $statement -> bindValue(":owner", $this->getOwner());
        $statement -> bindValue(":site", $this->getSite());
                    $statement -> bindValue(":document", $this->getDoc());
      


        $statement->execute();
            
		}
        
        
		public function updateBill(){
            

$conn = Db::getInstance();
	       
  
        $statement = $conn->prepare("UPDATE bills SET name = :name, date = :date, deadline = :deadline, price = :price, type = :type, owner = :owner, site =:site, document = :document WHERE billid = :billid");
            $statement -> bindValue(":billid", $_GET['id']);  
        $statement -> bindValue(":name", $this->getName());
        $statement -> bindValue(":date", $this->getDate());
        $statement -> bindValue(":deadline", $this->getDeadline());
                    $statement -> bindValue(":price", $this->getPrice());
                    $statement -> bindValue(":type", $this->getType());
              $statement -> bindValue(":owner", $this->getOwner());
        $statement -> bindValue(":site", $this->getSite());
                    $statement -> bindValue(":document", $this->getDoc());
      


        $statement->execute();
            
		}
        
               public function removeBill($billsid){
              
$conn = Db::getInstance();
        $statement = $conn->prepare("DELETE FROM bills WHERE billid = :billid");
        $statement->bindValue(':billid', $billsid);
       $statement->execute();
    }
        
        
          public function getAllBills()
    {
$conn = Db::getInstance();
  $usersid = $_SESSION['usersID'];
        $statement = $conn->prepare("SELECT * FROM bills LEFT JOIN bills_users ON bills.billid = bills_users.bill WHERE billid = :billid and user = :usersid and user ORDER BY deadline asc");
          $statement->bindValue(":billid", $bill);
          $statement->bindValue(":tasksID", $usersid);

        $statement->execute();
        
        $result = $statement->fetchAll();
        return $result;
    }
        
        
        

    public function getBills()
    {
$conn = Db::getInstance();
  $usersid = $_SESSION['usersID'];
        $statement = $conn->prepare("SELECT * FROM bills LEFT JOIN bills_users ON bills.billid = bills_users.bill WHERE user = :usersid ORDER BY deadline asc");
 
          $statement->bindValue(":usersid", $usersid);

        $statement->execute();
        
        $result = $statement->fetchAll();
        return $result;
    }
        
        public function getSingleBill()
    {
$conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM bills WHERE billid = :billid");
 
          $statement->bindValue(":billid", $_GET['id']);

        $statement->execute();
        
        $result = $statement->fetchAll();
        return $result;
    }
        
            public function manageBills()
    {
$conn = Db::getInstance();
  $usersid = $_SESSION['usersID'];
        $statement = $conn->prepare("SELECT * FROM bills WHERE owner = :usersid ORDER BY deadline asc");
 
          $statement->bindValue(":usersid", $usersid);

        $statement->execute();
        
        $result = $statement->fetchAll();
        return $result;
    }
        
        
            public function getKey($bill)
    {
$conn = Db::getInstance();
 
        $statement = $conn->prepare("SELECT * FROM bills_types WHERE id = :billid");
 
          $statement->bindValue(":billid", $bill);

        $statement->execute();
        
        $result = $statement->fetchAll();
        return $result;
    }
    
        
        
        public function calcLinear($bill, $user)
    {
$conn = Db::getInstance();
 
        $statement = $conn->prepare("SELECT bills_users.user,
        bills.price / (SELECT COUNT(*) FROM bills_users WHERE bills_users.bill = :billid) AS calcPrice FROM bills LEFT JOIN bills_users ON bills.billid = bills_users.bill WHERE bill = :billid and user = :user");
 $statement->bindValue(":user", $user);
          $statement->bindValue(":billid", $bill);

        $statement->execute();
        
        $result = $statement->fetchAll();
        return $result;
    }
        
           public function calcCapita($bill, $user)
    {
$conn = Db::getInstance();
 
        $statement = $conn->prepare("SELECT bills_users.user,
        bills.price * ((SELECT SUM(users.gezin) FROM users WHERE usersID = :user) / (SELECT SUM(users.gezin) FROM users)) AS calcPrice FROM (bills INNER JOIN bills_users ON bills.billid = bills_users.bill) INNER JOIN users ON users.usersID = bills_users.user WHERE billid = :billid AND USER = :user");
 $statement->bindValue(":user", $user);
          $statement->bindValue(":billid", $bill);

        $statement->execute();
        
        $result = $statement->fetchAll();
        return $result;
    }
        
        
          public function calcArea($bill, $user)
    {
$conn = Db::getInstance();
 
        $statement = $conn->prepare("SELECT bills_users.user,
        bills.price * ((SELECT SUM(users.oppervlakte) FROM users WHERE usersID = :user) / (SELECT SUM(users.oppervlakte) FROM users)) AS calcPrice FROM (bills INNER JOIN bills_users ON bills.billid = bills_users.bill) INNER JOIN users ON users.usersID = bills_users.user WHERE billid = :billid AND USER = :user");
 $statement->bindValue(":user", $user);
          $statement->bindValue(":billid", $bill);

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