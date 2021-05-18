<?php
   
   
    $url='localhost';
    $username='root';
    $password='';
    $conn=mysqli_connect($url,$username,$password,"cscamp");
    if(!$conn){
         echo mysqli_connect_errno().": ".mysqli_connect_error() ;
        die('Could not Connect to the Database');
    }

   $dbSelect = @mysqli_select_db($conn, "cscamp");
   if (!$dbSelect) {
     die("<p>The database is unavailable.</p>");

     echo "<p>The database connection was successful.</p>";
   }
   
?>
