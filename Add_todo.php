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
    // var_dump( $database ); check if the code is working 

    // step 3 grab the name from the $_POST
    $todo_label = $_POST["todo_label"];
    // var_dump("hello"); check if its connected

    //step 4 add the name into the databse 
        //4.1 sql command
        $sql = 'INSERT INTO todos (`label`) VALUES  (:label)';
        //4.2 prepare
        $query = $database->prepare($sql);
        //4.3 execute
        $query->execute (['label' => $todo_label]);

    //step 5 redirect the user back to index.php
    header("location: index.php");
    exit;
?>
