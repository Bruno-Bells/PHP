<?php
	//start a session
	session_start();

	//create a key for hash_hmac function
	if (empty($_SESSION['key']))
		$_SESSION['key'] = bin2hex(random_bytes(32));

	//create CSRF token
	$csrf = hash_hmac('sha256', 'this is some string: index.php', $_SESSION['key']);

	//validate token
	if (isset($_POST['submit'])) {
		if (hash_equals($csrf, $_POST['csrf'])) {
			echo "Your name is: " . $_POST['username'];
		} else
			echo 'CSRF Token Failed!';
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

   <main class="container my-3 py-5">
      <section class="col-5 mx-auto my-5 p-5 border rounded bg-light">
         
         <h1 class="font-weight-light text-center">Login</h1>
         <hr>

         <form action="scripts/login.php" method="post" class="mx-auto">

         <input type="hidden" name="csrf" value="<?php  $csrf ?>">
            
            <label for="username" class="font-weight-bold">Username</label>
            <input type="text" name="username" id="username" value="" class="form-control">

            <br>

            <label for="password" class="font-weight-bold">Password</label>
            <input type="password" name="password" id="password" value="" class="form-control">
            <input type="checkbox" onclick="myFunction()">Show Password

            <input type="submit" name="login" value="Login" class="mt-4 btn btn-block btn-dark">
            <span class="text-center">
               <a href="register.html" class="text-muted d-block">Register</a>
            </span>
            
         </form>

      </section>
   </main>


<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>
   
</body>
</html>