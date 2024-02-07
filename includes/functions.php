<?php

// connect to database
function connectToDB() {
   // Step 1: list out all the database info
    $host = 'mysql';
    $database_name = 'TODO_list';
    $database_user = 'root';
    $database_password = 'f9Rry0z7a1HO6o38';
 
    // Step 2: connect to the database
    $database = new PDO(
     "mysql:host=$host;dbname=$database_name",
     $database_user,
     $database_password
   );
   
   return $database;
}

// set error message
function setError( $error_message, $redirect_page ) {
   $_SESSION["error"] = $error_message;
   // redirect back to login page
   header("Location: " . $redirect_page );
   exit;
}

function setSuccess($success_message, $redirect_page) {
   $_SESSION["success"] = $success_message;
   // redirect appropriately
   header("Location: " . $redirect_page);
   exit;
 }