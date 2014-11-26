<?php
session_start();

function get_the_current_user() {
  if (isset($_SESSION['logged_in_user'])) {
    return find_user_by_name($_SESSION['logged_in_user']);
  } else {
    return false;
  }
}

function log_out_user() {
  session_destroy();
  header('Location: index.php');
  exit;
}

function login_in_user($username) {
  $_SESSION['logged_in_user'] = $username;
  header('Location: index.php');
  exit;
}

function add_new_user_to_database($username, $password) {
  $new_users_row = ['username' => $username, 'password' => password_hash($password, PASSWORD_DEFAULT )];
  $sql = "INSERT INTO users (username, password, created_at) VALUES (:username, :password, NOW())";
  Database::prepare_and_execute($sql, $new_users_row);
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
  if ($user) {
    return password_verify($password, $user['password']);
  } else {
    return false;
  }
}

?>
