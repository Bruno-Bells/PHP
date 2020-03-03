<?php

// throw error pages with error messages

function throwError($errMsg) {

   $page = <<<HTML

   <head>
      <link rel="stylesheet" href="../assets/css/bootstrap.css">
      <link rel="stylesheet" href="../assets/css/fontawesome.css">
   </head>

   <main class="container my-5 py-5 col-5 mx-auto">
      <div class="alert alert-danger my-5">
         <span class="fa fa-warning px-2"></span>
         $errMsg
      </div>
   <main>

HTML;

   die($page);


}

function throwErrorHTML($errMsg) {

   $page = <<<HTML

   <head>
      <link rel="stylesheet" href="assets/css/bootstrap.css">
      <link rel="stylesheet" href="assets/css/fontawesome.css">
   </head>

   <main class="container my-5 py-5 col-5 mx-auto">
      <div class="alert alert-danger my-5">
         <span class="fa fa-warning px-2"></span>
         $errMsg
      </div>
   <main>

HTML;

   die($page);


}

?>