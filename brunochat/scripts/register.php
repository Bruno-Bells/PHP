<?php

// include all required scripts
include 'error.php';
include 'dbconnection.php';
include 'dbModels.php';

// check if the user made this request from the login form, else throw error
if (isset($_REQUEST['register'])) {

   // get username and password
   $username = trim($_REQUEST['username']);
   $password = trim($_REQUEST['password']);
   $cpassword = trim($_REQUEST['cpassword']);

   // validate the data

   // check if username and password is not an empty string, else throw error
   if ($username == "" || $password == "" || $cpassword == "") {
      throwError("Please complete registration details.");
   }

   // check if the password and conform password are the same, else throw error
   if ($password != $cpassword) {
      throwError("Password and Confirm Password must be the same.");
   }

   // check if the username is not longer than 50, else throw error
   if (strlen($username) > 50 ) {
      throwError("Username must be less than or equal to 50 character length.");
   }
   
   // encrypt password
   $password = encrpytPassword($password);

   // connect to database
   $dbconn = dbConn();

   // check if user already exists in the database, then throw error
   if (checkUserExists($dbconn, $username) > 0) {
      throwError("User already exists, try a different username!");
   }

   // send data into the database
   $result = addUserToDB($dbconn, $username, $password);

   // if data is stored, redirect to login, else throw error
   if ($result == true) {
      header("location: ../index.html");
   } else {
      throwError("Registration failed, try again...<br>$result");
   }

} else {
   throwError("Wrong Request.");
}

// encrypt password
function encrpytPassword($password) {

   $options = [
      'cost' => 10,
      'salt' => random_bytes(22),
   ];

   $password =  password_hash($password, PASSWORD_BCRYPT, $options);
   return $password;

}

?>