<?php 
  require_once 'database.php';
  
  // バリデーションの共通関数を定義

  /**
   * @空文字チェック
   * @param $errors
   * @param $check_value
   * @param $message
   */
  function emptyCheck(&$errors, $check_value, $message) {
    if(empty(trim($check_value))) {
      array_push($errors, $message);
    }
  }

  /**
   * @「パスワード」と「パスワード確認」の入力が一致しているか
   * @param $password
   * @param $password_confirmation
   * @param $message
   */
  function matchPassword(&$errors, $password, $password_confirmation, $message) {
    if($password!=$password_confirmation){
      array_push($errors, $message);
    }
  }


  /**
   * @最小文字数チェック
   * @param $errors
   * @param $check_value
   * @param $message
   */
  function minSizeCheck(&$errors, $check_value, $message) {
    if(mb_strlen($check_value) < 8 ) {
      array_push($errors, $message);
    }
  }


  /**
   * @最大文字数チェック
   * @20文字以内
   * @param $errors
   * @param $check_value
   * @param $message
   */
  function maxSizeCheck_20(&$errors, $check_value, $message) {
    if(strlen($check_value) > 20 ) {
      array_push($errors, $message);
    }
  }


  /**
   * @最大文字数チェック
   * @100文字以内
   * @param $errors
   * @param $check_value
   * @param $message
   */
  function maxSizeCheck_100(&$errors, $check_value, $message) {
    if(mb_strlen($check_value) > 100 ) {
      array_push($errors, $message);
    }
  }


  /**
   * @最大文字数チェック
   * @200文字以内
   * @param $errors
   * @param $check_value
   * @param $message
   */
  function maxSizeCheck_200(&$errors, $check_value, $message) {
    if(mb_strlen($check_value) > 100 ) {
      array_push($errors, $message);
    }
  }


  /**
   * @メールアドレス形式チェック
   * @param $errors
   * @param $check_value
   * @param $message
   */
  function emailAddressCheck(&$errors, $check_value, $message) {
    if(filter_var($check_value, FILTER_VALIDATE_EMAIL) == false) {
      array_push($errors, $message);
    }
  }


  /**
   * @メールアドレス重複チェック
   * @param $errors
   * @param $check_value
   * @param $message
   */
  function emailAddressDuplicateCheck(&$errors, $check_value, $message) {
    $database_handler = getDatabaseConnection();
    // メールアドレスが重複しているかチェック
    if($statement = $database_handler->prepare("SELECT id FROM members WHERE email = :email")) {
      $statement->bindParam("email", $check_value);
      $statement->execute();
    }

    // SQL実行後の結果を取得
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    if($result) {
      array_push($errors, $message);
    }
  }


  /**
   * @半角英数字チェック
   * @param $errors
   * @param $check_value
   * @param $message
   */
  function halfAlphanumericCheck(&$errors, $check_value, $message) {
    if(preg_match("/^[a-zA-Z0-9]+$/", $check_value) == false) {
      array_push($errors, $message);
    }
  }


?>