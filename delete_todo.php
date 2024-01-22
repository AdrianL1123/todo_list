<?php

   // step 1: list out all the database info
   $host = 'devkinsta_db';
   $database_name = 'TODO_list';
   $database_user = 'root';
   $database_password = 'f9Rry0z7a1HO6o38';

   // Step 2: connect to the database
   $database = new PDO(
    "mysql:host=$host;dbname=$database_name",
    $database_user,
    $database_password
  );

  // Step 3: get todo id from the post 
  $todo_id = $_POST["todo_id"];

  // Step 4: delete the todo from the database using todo ID
    //4.1 sql command
    $sql = "DELETE FROM todos WHERE id = :id";
    //4.2 prepare
    $query = $database->prepare($sql);
    //4.3 execute 
    $query->execute([ 'id' => $todo_id ]);

 // Step 5 redirect back to page 
    header("Location: index.php");
    exit;
  ?>