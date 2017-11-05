<?php
//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);
//instantiate program object
$obj=new main();

  class main
  {
    public function __construct()
    {
    //using PDO to connect to MySQL Database	
    $dsn = 'mysql:dbname=mr669;host=sql1.njit.edu';
    $user = 'mr669';
    $password = 'abHYFGPw';
    try {
        global $dbconn;
	    $dbconn = new PDO($dsn, $user, $password);
	    $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //1. If connected print
	    echo 'Connected successfully <br>';
	    $this::testConn($dbconn);
        } 
    catch (PDOException $e)
        {
        //1. If not connected print	
	echo 'Connection failed: ' . $e->getMessage() . '<br>';
        }
     }
     //function to perform selection and display
     public static function testConn($dbconn) 
     {
     try {
     	  //2. Perform selection to search from accounts
	      $stmt = $dbconn->prepare("SELECT * FROM accounts where id<6");
	      $stmt->execute();
	      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	      $result = $stmt->fetchAll();
	      $count = $stmt->rowCount();
	     }
	catch (PDOException $e) 
	     {
	     echo $sql . "<br>" . $e->getMessage();
         }
     //3.Count records and Display table
 	 if(count($result) > 0)
         {
          echo "<table border=\"1\"><tr><th>ID</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Pass</th></tr>";
     $i=0;
           foreach ($result as $label) 
            {
     		if($label["id"]<6){
                       $i=$i+1;
                 //Display
                echo"<tr><td>".$label["id"]."</td><td>".$label["email"]."</td><td>".$label["fname"]."</td><td>".$label["lname"]."</td><td>".$label["phone"]."</td><td>".$label["birthday"]."</td><td>".$label["gender"]."</td><td>".$label["password"]."</td></tr>";
                              }
            }
    //3.Count records        
    echo "The number of records in the result is: $i";
    echo '</br>';
    
         }
     else{
     echo "0 results";
         }
      }
}
?>
