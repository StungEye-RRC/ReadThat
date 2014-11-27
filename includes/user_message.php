<?php

class UserMessage {
  
  private $messages;

  public static function get_instance() {
    static $instance = null;
    if (null === $instance) {
      $instance = new static();
    }
    return $instance;
  }

  private function __construct() {
    if (isset($_SESSION['user_messages'])) {
      $this->messages = $_SESSION['user_messages'];
      unset($_SESSION['user_messages']);
    }
  }
  
  public static function set_message($key, $message) {
    self::get_instance()->messages[$key] = $message;
  }

  public static function persist_message($key, $message) {
    $_SESSION['user_messages'][$key] = $message;
  }

  public static function get_message($key) {
     $instance = self::get_instance();

     if (isset($instance->messages[$key])) {
       return $instance->messages[$key];
     } else {
       return false;
     }
  }

}

?>