<?php
     // Step 2: connect to the database
     $database = connectToDB();
    // var_dump( $database ); check if the code is working 
    //step 3 load the data from the database 
        //3.1 load the data u need to prepare  (SQL COMMAND)
        $sql = "SELECT * FROM todos WHERE user_id = :user_id";
        //3.2 prepare your database 
        $query = $database->prepare ($sql);
        //3.3 execute
        $query->execute([
          'user_id' => isset( $_SESSION["user"]['id'] ) ? $_SESSION["user"]['id'] : ''
        ]);
        //3.4 fetch all
        $todos = $query->fetchAll();

    require "parts/header.php"; ?>

    <div
      class="card rounded shadow-sm"
      style="max-width: 500px; margin: 60px auto;"
    >
      <div class="card-body">
        <h3 class="card-title mb-3">My Todo List</h3>
        <?php if ( isset( $_SESSION["user"] ) ) : ?>
          <a href="/logout" id="login">Logout</a>
        <?php else: ?>
        <div class="d-flex gap-2">
        <a href="/login">Login<a>
        <a href="/signup">Sign Up<a>
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
            <form method="POST" action="/todo/updateCheck">
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
            <form method="POST" action="/todo/delete">
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
          <form class="d-flex justify-content-between align-items-center" method="POST" action="/todo/Add" >
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
   <?php require "parts/footer.php"; ?>
