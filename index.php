<?php

  session_start();

  // require the functions.php file
  require "includes/functions.php";
  require "includes/class/auth.php";
  require "includes/class-task.php";
  require "includes/class-db.php";

  // get the current path the user is on
  $path = $_SERVER["REQUEST_URI"];
  // trim out the beginning slash
  $path = trim( $path, '/' );

  // init classes
  $auth = new Authentication();
  $task = new Task();

  // simple router system - deciding what page to load based on the url
  // Routes
  switch ( $path ) {
    // action ruotes
    case 'auth/login':
      $auth->login();
      break;
    case 'auth/signup':
      $auth->signup();
      break;
    case 'task/add':
      $task->add();
      break;
    case 'task/update':
      $task->update();
      break;
    case 'task/delete':
      $task->delete();
      break;

    // page routes
    case 'login':
      $page_title = "Login";
      require 'pages/login.php';
      break;
    case 'signup':
      $page_title = "Sign Up";
      require 'pages/signup.php';
      break;
    case 'logout':
      $auth->logout();
      break;
    default:
      $page_title = "Home Page";
      require 'pages/home.php';
      break;
  }