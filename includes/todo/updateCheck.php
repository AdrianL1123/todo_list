<?php

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
    header("Location: /");
    exit;
?>