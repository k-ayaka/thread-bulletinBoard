<?php  
  require './common/database.php';
  session_start();

  // セッションの内容が含まれているか判定
  if(!isset($_SESSION['confirm'])) {
    // セッションの内容が正しくなければ、入力画面へ遷移
    header('Location: member_regist.php');
    exit;
  }


  // POSTされたデータを変数に代入
  $name_sei = $_SESSION['confirm']['name_sei'];
  $name_mei = $_SESSION['confirm']['name_mei'];
  $gender = $_SESSION['confirm']['gender'];
  $pref_name = $_SESSION['confirm']['pref_name'];
  $address = $_SESSION['confirm']['address'];
  $email = $_SESSION['confirm']['email'];
  $password = $_SESSION['confirm']['password'];

  // 取得した値を整形
  $name = $name_sei . '　' . $name_mei;


  // 「登録」ボタンを押すと以下のクエリ文が発行
  if(!empty($_POST)) {
    //DB接続
    $database_handler = getDatabaseConnection();
  
    try {
      if($statement = $database_handler
        ->prepare(
          'INSERT INTO members(name_sei, name_mei, gender, pref_name, address, password, email)
          VALUES (:name_sei, :name_mei, :gender, :pref_name, :address, :password, :email)
          '))
          {
            // パスワードのハッシュ値を設定
            $user_password = password_hash($password, PASSWORD_DEFAULT);
            // 性別の番号を数値に変換
            $gender = intval($gender);

            // bindParamでそれぞれのカラムに、取得した値をバインドする。
            $statement->bindParam(':name_sei', htmlspecialchars($name_sei));
            $statement->bindParam(':name_mei', htmlspecialchars($name_mei));
            $statement->bindParam(':gender', $gender);
            $statement->bindParam(':pref_name', $pref_name);
            $statement->bindParam(':address', htmlspecialchars($address));
            $statement->bindParam(':password', $user_password);
            $statement->bindParam(':email', $email);
            $statement->execute();

            // セッションデータを削除
            unset($_SESSION['confirm']);

            // 登録完了画面へ遷移
            header('Location: complete.php');
            exit;
          }

    } catch(Throwable $e) {
      echo $e->getMessage();
      exit;
    }
  }

?>