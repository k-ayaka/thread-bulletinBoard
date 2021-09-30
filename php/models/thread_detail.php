<?php

  session_start();
  require_once './common/database.php';

  $id = $_GET['id'];

  //DB接続
  $database_handler = getDatabaseConnection();
  try {
      if($statement = $database_handler->prepare("SELECT * FROM threads INNER JOIN members ON threads.member_id = members.id WHERE threads.id = :id")){
          $statement->bindParam(':id', $id);
          $statement->execute();

          $thread = $statement->fetch(PDO::FETCH_ASSOC);

          $_SESSION['thread_detail'] = [
            'member_id'  => $thread['member_id'],
            'title'      => $thread['title'],
            'content'    => $thread['content'],
            'created_at' => $thread['created_at'],
            'name_sei'   => $thread['name_sei'],
            'name_mei'   => $thread['name_mei'],
          ];
      }

  } catch(Throwable $e) {
      echo $e->getMessage();
      exit;
  }

?>