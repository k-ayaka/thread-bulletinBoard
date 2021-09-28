<?php

  session_start();
  require_once './common/database.php';


  if(isset($_GET['search'])) {
    $search_value = htmlspecialchars($_GET['search']);
  } else {
    $search_value = '';
  }

  //DB接続
  $database_handler = getDatabaseConnection();
  
  $results = [];
  try {
      if($statement = $database_handler
        ->prepare(
          "SELECT id, title, created_at FROM threads
          WHERE title LIKE '%$search_value%'
          OR content LIKE '%$search_value%'
          ORDER BY created_at DESC"
          )){
          $statement->execute();

        // 検索結果を配列$resultに格納
        while($value = $statement->fetch(PDO::FETCH_ASSOC)) {
          array_push($results, $value);
        };
      }

  } catch(Throwable $e) {
      echo $e->getMessage();
      exit;
  }

?>