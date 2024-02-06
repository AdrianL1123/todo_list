<?php

class Todo
{
    function add()
    {
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
    }

    function update()
    {
    // Step 2: connect to the database
    $database = connectToDB();


    //step 3 get the id and updated stuff from post
    $checkCompleted = $_POST["checkCompleted"];
    $todo_id = $_POST["todo_id"];

    //step 4 update check box 
    //4.1 sql command
    if ($checkCompleted == 0 ) {
    $sql = "UPDATE todos SET completed = 1 WHERE id =:id";
    } else if ($checkCompleted == 1) {
    $sql = "UPDATE todos SET completed = 0 WHERE id =:id";
    }
    //4.2 prepare 
    $query = $database->prepare( $sql );
    //4.3 execute
    $query->execute([
    // 'completed' => $checkCompleted
    'id' => $todo_id
    ]);


    // Step 5: redirect back to index.php
    header("Location: /")   ;
    exit;
    }

    function delete()
    {
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
    }
    
}