<?php
  require_once '../env.php';

  /**
   * @PDOを使用してDBに接続
   * @return PDO
   * 
   */
    function getDatabaseConnection() {
      $host     = DB_HOST;
      $dbName   = DB_NAME;
      $userName = DB_USER;
      $password = DB_PASSWORD;

      $dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

      try {
        $database_handler = new PDO($dsn , $userName, $password);
        $database_handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch(PDOException $e) {
        echo "DB接続に失敗しました。<br />";
        echo $e->getMessage();
        exit;
      }
      return $database_handler;
    }
?>