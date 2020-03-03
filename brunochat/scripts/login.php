<?php

// include all required scripts
include 'error.php';
include 'dbconnection.php';
include 'dbModels.php';

// check if the user made this request from the login form, else throw error
if (isset($_REQUEST['login'])) {

   // get username and password
   $username = trim($_REQUEST['username']);
   $password = trim($_REQUEST['password']);

   // validate the data

   // check if username and password is not an empty string, else throw error
   if ($username == "" || $password == "") {
      throwError("Invalid Username / Password");
   }

   // check if the username is not longer than 50, else throw error
   if (strlen($username) > 50 ) {
      throwError("Invalid Username / Password");
   }

   // connect to database
   $dbconn = dbConn();

   // get the user info from the database
   $user = getUserInfo($dbconn, $username);

   // if user info is not gotten, throw error
   if ($user == false) {
      throwError("Invalid Username / Password");
   } else {
      // collect the username and password
      $username = $user['username'];
      $dbpassword = $user['password'];

      // check if password is correct, else throw error
      if (password_verify($password, $dbpassword) == true) {
         // set cookies / sessions

         // start session, this is very important, else error would be thrown
         session_start();
         // store details in session
         $_SESSION["loggedIn"] = true;
         $_SESSION["username"] = $username;

         // redirect to dashboard
         header("location: ../dashboard.php");
      } else {
         throwError("Invalid Username / Password");
      }
   }

} else {
   throwError("Wrong Request.");
}

?>