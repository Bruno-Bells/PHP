<?php

// connect the database
function dbConn() {
   $username = "root";
   $password = "";
   $dbname = "bruno_db";
   $host = "localhost";

   ini_set("display_error",0);
   $dbconn = mysqli_connect($host,$username,$password,$dbname);
   if (mysqli_connect_error()) {
      throwError(mysqli_connect_errno() . ": " . mysqli_connect_error());
   } else {
      return $dbconn;
   }
   

   
}

?>