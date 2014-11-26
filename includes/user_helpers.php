<?php

function add_new_user_to_database($username, $password) {
  $new_users_row = ['username' => $username, 'password' => password_hash($password, PASSWORD_DEFAULT )];
  $sql = "INSERT INTO users (username, password, created_at) VALUES (:username, :password, NOW())";
  Database::prepare_and_execute($sql, $new_users_row);
}

function find_users_in_database($username) {
  $user_data = ['username' => $username];
  $sql = "SELECT * FROM users WHERE username = :username";
  $users = Database::prepare_and_execute($sql, $user_data);
  return $users->fetchAll();
}

function user_login_successful($username, $password) {
  $users = find_users_in_database($username, $password);
  if (count($users) == 1) {
    return password_verify($password, $users[0]['password']);
  } else {
    return false;
  }
}

?>
