<?php
// start session
session_start();
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
    //step 3 load the data from the database 
        //3.1 load the data u need to prepare  (SQL COMMAND)
        $sql = "SELECT * FROM todos";
        //3.2 prepare your database 
        $query = $database->prepare ($sql);
        //3.3 execute
        $query->execute();
        //3.4 fetch all
        $todos = $query->fetchAll();
?>


<!DOCTYPE html>
<html>
  <head>
    <title>TODO App</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    <style type="text/css">
      body {
        background: #f1f1f1;
      }
    </style>
  </head>
  <body>
    <div
      class="card rounded shadow-sm"
      style="max-width: 500px; margin: 60px auto;"
    >
      <div class="card-body">
        <h3 class="card-title mb-3">My Todo List</h3>
        <?php if ( isset( $_SESSION["user"] ) ) : ?>
          <a href="logout.php" id="login">Logout</a>
        <?php else: ?>
        <div class="d-flex gap-2">
        <a href="login.php">Login<a>
        <a href="signup.php">Sign Up<a>
        </div>
         <?php endif; ?>
        <ul class="list-group">
        <!-- render the stuff out  -->
        <?php if ( isset( $_SESSION["user"] ) ) : ?>
        <?php foreach($todos as $todo): ?>
            <ul class="list-group">
          <li
            class="list-group-item d-flex justify-content-between align-items-center"
          >
            <div>
            <form method="POST" action="updateCheck.php">
              <!-- updateCheck todos -->
              <input 
              type="hidden" 
              name="checkCompleted" 
              value ="<?= $todo["completed"]; ?>" />
              <input 
              type="hidden" 
              name="todo_id" 
              value= "<?= $todo["id"]; ?>" />
              <div class="d-flex align-items-center">
               <!-- check box -->
                <?php if ($todo["completed"] == 0): ?>
                <button class="btn btn-sm btn-light">
                <i class="bi bi-square"></i>  
                </button> 
                <span class="ms-2 "> <?= $todo["label"]; ?> </span>
                <?php else: ?>
                <button class="btn btn-sm btn-success">
                <i class="bi bi-check-square"></i>
                </button>
                <span class="ms-2 text-decoration-line-through">
                <?= $todo["label"]; ?>
                 </span>
                <?php endif; ?> 
                <!-- check box -->
              </div>
            </div>
          </form>
    
            <!-- updateCheck todos -->

            <!-- delete -->
            <form method="POST" action="delete_todo.php">
            <input 
            type="hidden" 
            name="todo_id" 
            value= "<?= $todo["id"]; ?>" />
              <button class="btn btn-sm btn-danger">
                <i class="bi bi-trash"></i>
              </button>
            </form>
          </li>
           <!-- delete -->
           
        <?php endforeach ?>
        
        <!-- render the stuff out  -->

        <div class="mt-4">
          <form class="d-flex justify-content-between align-items-center" method="POST" action="Add_todo.php" >
            <input
              type="text"
              class="form-control"
              placeholder="Add new item..."
              name="todo_label"
              required
            />
            <button class="btn btn-primary btn-sm rounded ms-2">Add</button>
          </form>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
