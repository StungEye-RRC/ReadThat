<?php

class UserMessage
{
  private $messages;

  public static function get_instance()
  {
    static $instance = null;
    if (null === $instance) {
      $instance = new static();
    }
    return $instance;
  }

  public function set_message($key, $message) {
    self::get_instance()->messages[$key] = $message;
  }

  public function get_message($key) {
     $instance = self::get_instance();

     if (isset($instance->messages[$key])) {
       return $instance->messages[$key];
     } else {
       return false;
     }
  }

}
