<?php
    // step 1 list all the database info 
    $host = 'devkinsta_db';
    $database_name='TODO_list';
    $database_user='root';
    $database_password='f9Rry0z7a1HO6o38';

    //step 2 connect the databse to php
    $database = new PDO(
        "mysql:host=$host;dbname=$database_name",
        $database_user,
        $database_password
    );
    

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
    header("Location: index.php");
    exit;
?>