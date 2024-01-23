<?php 
  // start session
  session_start();
  
  // removeuser session
  unset($_SESSION['user']);
  
  // redirect the user back to index.php
  header("Location: index.php");
  exit;

