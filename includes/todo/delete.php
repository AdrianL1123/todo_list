<?php

   // Step 2: connect to the database
   $database = connectToDB();

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
    header("Location: /");
    exit;
  ?>