<?php

include 'scripts/error.php';

session_start();

if (isset($_SESSION['loggedIn']) && $_SESSION["loggedIn"] == true) {
   // get the username
   $user = $_SESSION['username'];
} else {
   throwErrorHTML("restricted Access. <a class='text-danger' href='index.html'>Login</a>");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Bruno Chat</title>

   <link rel="stylesheet" href="assets/css/bootstrap.css">
   <link rel="stylesheet" href="assets/css/fontawesome.css">

</head>
<body>

   <main class="my-5 p-5 container ">
      <div class="my-5 bg-light border rounded text-dark p-5">
         <span class="display-4">Dear <?php echo strtoupper($user) ?>,</span>
         <br>
         <span class="h1 font-weight-light">Welcome to Bruno Chat!</span>
      </div>
   </main>

</body>
</html>