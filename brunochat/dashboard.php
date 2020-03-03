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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="dashboard.php"><?php echo strtoupper("blueorigin") ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li> <a class="nav-link" href="scripts/logout.php">Logout</a> </li>
   
    </ul>
    
  </div>
</nav>

   <main class="my-5 p-5 container ">
      <div class="my-5 bg-light border rounded text-dark p-5">
         <span class="display-4">Dear <?php echo strtoupper($user) ?>,</span>
         <br>
         <span class="h1 font-weight-light">Welcome to Chat Board!</span>
      </div>
   </main>

<footer>
   <div class="bg-success font-weight-bold text-center fixed-bottom">
   <p>&copy; All rights reserved| Bruno</p>
   </div>
</footer>

</body>
</html>