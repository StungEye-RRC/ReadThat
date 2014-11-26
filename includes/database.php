<?php

class Database {
  const HOST = 'localhost';
  const DBNAME = 'readthat';
  const DBUSER = 'serveruser';
  const DBPASSWORD = 'gorgonzola7!';

  private $connection;

  public static function get_instance() {
    static $instance = null;
    if (null === $instance) {
      $instance = new static();
    }
    return $instance;
  }

  private function __construct() {
    try {
      $this->connection = new PDO("mysql:host=".self::HOST.";dbname=".self::DBNAME, self::DBUSER, self::DBPASSWORD);
      //Sets the error handling mode to display exceptions
      $this->connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch(PDOException $e) {
      echo $e->getMessage();
    }
  }

  public static function prepare_and_execute($sql, $data) {
      $connection = self::get_instance()->connection;
      $prepared = $connection->prepare($sql);
      $prepared->execute($data);
      return $prepared;
  }

}

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
