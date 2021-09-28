<?php

  session_start();
  require_once './common/database.php';
  require_once './common/auth.php';

  if(!isLogin()) {
    header('Location: top.php');
    exit;
  }

  // セッションの内容が含まれているか判定
  if(!isset($_SESSION['thread_confirm'])) {
  // セッションの内容が正しくなければ、新規スレッド作成画面へ遷移
  header('Location: thread_regist.php');
  exit;
  }

  // POSTされたデータを変数に代入
  $title = $_SESSION['thread_confirm']['title'];
  $content = $_SESSION['thread_confirm']['content'];

  // ログインしているユーザーのIdを取得
  $member_id = getUserId();

  // 「スレッドを作成する」ボタンを押すと以下のクエリ文が発行
    if(!empty($_POST)) {
        //DB接続
        $database_handler = getDatabaseConnection();
        
        try {
            if($statement = $database_handler->prepare("INSERT INTO threads (member_id, title, content) VALUES(:member_id, :title, :content)")) {

                // bindParamでそれぞれのカラムに、取得した値をバインドする。
                $statement->bindParam(':member_id', $member_id);
                $statement->bindParam(':title', htmlspecialchars($title));
                $statement->bindParam(':content', htmlspecialchars($content));
                $statement->execute();

                // セッションデータを削除
                unset($_SESSION['thread_confirm']);

                header('Location: thread.php');
                exit;
            }

        } catch(Throwable $e) {
            echo $e->getMessage();
            exit;
        }
    }

?>