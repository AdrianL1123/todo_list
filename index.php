<?php

  // start session
  session_start();

  // require the functions.php file
  require "includes/functions.php";
  require "includes/todo-auth.php";
  require "includes/todo-class.php";

  // get the current path the user is on
  $path = $_SERVER["REQUEST_URI"];
  // trim out the beginning slash
  $path = trim( $path, '/' );

  // init classes
  $auth = new Authentication();
  $todo = new Todo();

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
    case 'todo/Add':
      $todo->add();
      break;
    case 'todo/updateCheck':
      $todo->update();
      break;
    case 'todo/delete':
      $todo->delete();
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