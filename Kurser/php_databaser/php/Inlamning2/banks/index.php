<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'dbconnection.php';
        $sql = "CALL account('Sohail')";
        $result = $conn->query($sql);
        
        
        
     
        class Bank{
            public $username;
            public $accname;
            public $lastname;
            public $balance;
            public function __construct($username,$lastname,$accname,$balance) {
                $this->username = $username;
                $this->lastname = $lastname;
                $this->accname = $accname;
                $this->balance = $balance;
            }
        }
       $row = $result->fetch(PDO::FETCH_OBJ);
        $sohail = new Bank($row->accountFname, $row->accountLname, $row->accountName ,$row->accountBalance);
        echo $sohail->username. " " . $sohail->lastname. " has: ".$sohail->accname. " account with ". $sohail->balance; 
  
     ?>
    </body>
</html>