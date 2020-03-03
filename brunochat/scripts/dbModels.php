<?php

// add the user to the database and return status
function addUserToDB($conn, $username, $password) {
   
   $query = "INSERT INTO users_tbl (username,password) VALUES ('$username', '$password') ";

   $result = mysqli_query($conn, $query);

   if ($result === TRUE) {
      return true;
   } else {
      error_log(mysqli_error($conn),null,'errorlog.txt');
      return false;
   }

}

// check if user exists and return number of user
function checkUserExists($conn,$username) {
   $query = "SELECT * FROM users_tbl WHERE username = '$username'";
   $result = mysqli_query($conn, $query);
   return mysqli_num_rows($result);
}

// get user info from the database
function getUserInfo($conn, $username) {
   $query = "SELECT * FROM users_tbl WHERE username = '$username'";
   $result = mysqli_query($conn, $query);
   
   if (mysqli_num_rows($result) > 0) {
      return mysqli_fetch_assoc($result);
   } else {
      return false;
   }

}

?>