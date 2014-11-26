<?php

function add_new_user_to_database($username, $password) {
  $new_users_row = ['username' => $username, 'password' => password_hash($password, PASSWORD_DEFAULT )];
  $sql = "INSERT INTO users (username, password, created_at) VALUES (:username, :password, NOW())";
  Database::prepare_and_execute($sql, $new_users_row);
}

function find_user_in_database($username) {
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
  $user = find_user_in_database($username, $password);
  if ($user) {
    return password_verify($password, $user['password']);
  } else {
    return false;
  }
}

?>
