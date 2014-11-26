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

?>
