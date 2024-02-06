<?php

   // Step 2: connect to the database
   $database = connectToDB();
    // var_dump( $database ); check if the code is working 

    // step 3 grab the name from the $_POST
    $todo_label = $_POST["todo_label"];
    // var_dump("hello"); check if its connected

    //step 4 add the name into the databse 
        //4.1 sql command
        $sql = 'INSERT INTO todos (`label`,`user_id`) VALUES (:label,:user_id)';
        //4.2 prepare
        $query = $database->prepare($sql);
        //4.3 execute
        $query->execute ([
            'label' => $todo_label,
            'user_id' => $_SESSION["user"]['id']
        ]);

    //step 5 redirect the user back to index.php
    header("location: /");
    exit;
?>
