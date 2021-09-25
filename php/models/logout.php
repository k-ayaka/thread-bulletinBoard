<?php
  // ログアウト処理

  session_start();
  $_SESSION = [];
  session_destroy();

  header('Location: ../top.php');
  exit;
?>