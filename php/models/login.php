<?php
  session_start();
  require './common/validation.php';


  // 入力されたパラメーターを取得
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];

  $_SESSION['user_error'] = [];


  
  if(!empty($_POST)) {
    
    // 空文字チェック
    loginEmptyCheck($_SESSION['user_error'], $user_email, $user_password, "※IDもしくはパスワードが間違っています");


    // 入力に問題がない場合
    if(!$_SESSION['user_error']) {

        // DB接続
        $database_handler = getDatabaseConnection();
    
        try {
          if($statement = $database_handler->prepare('SELECT id, name_sei, password FROM members WHERE email = :user_email')) {
            $statement->bindParam(':user_email', $user_email);
            $statement->execute();
      
            // 取得した値を変数に格納
            $user = $statement->fetch(PDO::FETCH_ASSOC);
      
            // $userに値がない = 値が間違えている または 登録されていない
            if(!$user) {
              $_SESSION['user_error'] = [
                "※IDもしくはパスワードが間違っています"
              ];
              header('Location: login.php');
              exit;
            }
    
            // $userに値がある場合、取得したidと氏名を変数に格納する
            $id = $user['id'];
            $name = $user['name_sei'];
            $password = $user['password'];

            // 入力されたパスワードの判定
            if(password_verify($user_password, $password)) {
              // セッションに取得した値を格納
              $_SESSION['user'] = [
                'id' => $id,
                'name_sei' => $name,
              ];
              header('Location: top.php');
              exit;
            } else {
              $_SESSION['user_error'] = [
                "※IDもしくはパスワードが間違っています"
              ];
            }
          }
        } catch(Throwable $e) {
          echo $e->getMessage();
          exit;
        }
    }

  }

?>