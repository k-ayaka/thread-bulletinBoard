<?php

  session_start();
  require_once './common/validation.php';

  // パラメータを取得
  $title = $_POST['title'];
  $content = $_POST['content'];

  // 各項目のエラー分を格納する
  $_SESSION['title_errors'] = [];
  $_SESSION['content_errors'] = [];


  if(!empty($_POST)) {

      // 空文字チェック
      emptyCheck($_SESSION['title_errors'], $title, "※タイトルは必須入力です");
      emptyCheck($_SESSION['content_errors'], $content, "※コメントは必須入力です");

      // 上記のバリデーションでエラーが出なかった場合、下記の入力チェックを行う
      if(!$_SESSION['title_errors'] && !$_SESSION['content_errors']) {
          // 最大文字数チェック 100文字
          maxSizeCheck_100($_SESSION['title_errors'], $title, "※タイトルは100文字以内で入力してください");
          // 最大文字数チェック 500文字
          maxSizeCheck_500($_SESSION['content_errors'], $content, "※コメントは500文字以内で入力してください");
      }

      // 入力項目にエラーがない場合、次の画面へ遷移できる
      if(!$_SESSION['title_errors'] && !$_SESSION['content_errors']) {

          // セッションにPOSTの内容を代入（次の画面に入力内容を持っていける）
          $_SESSION['thread_confirm'] = $_POST;
          header('Location: thread_confirm.php');
          exit;

      }

  }

  // 「前に戻る」ボタンで戻った場合、POSTにセッション情報を代入
  if($_REQUEST['action'] == 'rewrite') {
    $_POST = $_SESSION['thread_confirm'];
  }

?>