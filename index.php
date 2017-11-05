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
        } 
    catch (PDOException $e) {
    //1. If not connected print	
	echo 'Connection failed: ' . $e->getMessage() . '<br>';
      }
     }
   }
?>
