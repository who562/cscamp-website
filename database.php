<?php
   
   
   $url='localhost';
    $username='hroy';
    $password='?g/H3t@!1e';
    $conn=mysqli_connect($url,$username,$password,"cscamp");
    if(!$conn){
        die('Could not Connect My Sql:' .mysql_error());
    }
?>
