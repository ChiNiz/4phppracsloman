<?php
class ConnectionDB {
         public static $instance;
   
      private function __construct() {
          //
      }
         public static function getInstance() {
          if (!isset(self::$instance)) {
              self::$instance = new mysqli("my-sql", "user", "password", "appDB");
           }
          return self::$instance;
      }
   
  }
?>