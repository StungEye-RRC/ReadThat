<?php

try {
  $host = 'localhost';
  $dbname = 'readthat';
  $user = 'serveruser';
  $password = 'gorgonzola7!';
  //Creates a new connection to the database
  $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

  //Sets the error handling mode to display exceptions
  $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

} catch(PDOException $e) {

  //echos out the error message
  echo $e->getMessage();

}

function add_new_user_to_database($db, $username, $password) {
  $new_users_row = ['username' => $username, 'password' => password_hash($password, PASSWORD_DEFAULT )];
  $sql = "INSERT INTO users (username, password, created_at) VALUES (:username, :password, NOW())";
  $pdo_statement = $db->prepare($sql);
  $pdo_statement->execute($new_users_row);
}

function find_users_in_database($db, $username) {
  $user_data = ['username' => $username];
  $sql = "SELECT * FROM users WHERE username = :username";
  $pdo_statement = $db->prepare($sql);
  $pdo_statement->execute($user_data);
  $users = $pdo_statement->fetchAll();
  return $users;
}

function user_login_successful($db, $username, $password) {
  $users = find_users_in_database($db, $username, $password);
  if (count($users) == 1) {
    return password_verify($password, $users[0]['password']);
  } else {
    return false;
  }
}

?>
