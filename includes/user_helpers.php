<?php

function redirect_to($path) {
  header('Location: ' . $path);
  exit;
}

function get_the_current_user() {
  if (isset($_SESSION['logged_in_user_id'])) {
    return find_user_by_id($_SESSION['logged_in_user_id']);
  } else {
    return false;
  }
}

function log_out_user() {
  unset($_SESSION['logged_in_user_id']);
  redirect_to('index.php');
}

function login_in_user($user) {
  $_SESSION['logged_in_user_id'] = $user['id'];
  redirect_to('index.php');
}

function add_new_user_to_database($username, $password) {
  $new_users_row = ['username' => $username, 'password' => password_hash($password, PASSWORD_DEFAULT )];
  $sql = "INSERT INTO users (username, password, created_at) VALUES (:username, :password, NOW())";
  Database::prepare_and_execute($sql, $new_users_row);
}

function find_user_by_id($id) {
  $user_data = ['id' => $id];
  $sql = "SELECT * FROM users WHERE id = :id";
  $users = Database::prepare_and_execute($sql, $user_data)->fetchAll();
  if (count($users) == 1) {
    return $users[0];
  } else {
    return false;
  }
}

function find_user_by_name($username) {
  $user_data = ['username' => $username];
  $sql = "SELECT * FROM users WHERE username = :username";
  $users = Database::prepare_and_execute($sql, $user_data)->fetchAll();
  if (count($users) == 1) {
    return $users[0];
  } else {
    return false;
  }
}

function user_login_successful($username, $password) {
  $user = find_user_by_name($username, $password);
  if ($user && password_verify($password, $user['password'])) {
    return $user;
  } else {
    return false;
  }
}

?>
