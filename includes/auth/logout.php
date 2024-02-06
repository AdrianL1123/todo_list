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

?>