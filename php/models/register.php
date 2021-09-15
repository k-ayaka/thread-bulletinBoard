<?php

  session_start();
  require './common/validation.php';


  // パラメータを取得
  $name_sei = $_POST['name_sei'];
  $name_mei = $_POST['name_mei'];
  $gender = $_POST['gender'];
  $pref_name = $_POST['pref_name'];
  $address = $_POST['address'];
  $password = $_POST['password'];
  $password_confirmation = $_POST['password_confirmation'];
  $email = $_POST['email'];


  // 各項目のエラー分を格納する
  $_SESSION['name_errors'] = [];
  $_SESSION['gender_errors'] = [];
  $_SESSION['pref_name_errors'] = [];
  $_SESSION['password_errors'] = [];
  $_SESSION['address_errors'] = [];
  $_SESSION['email_errors'] = [];



if(!empty($_POST)) {

    // 空文字チェック
    emptyCheck($_SESSION['name_errors'], $name_sei, "※氏名(姓)は必須入力です");
    emptyCheck($_SESSION['name_errors'], $name_mei, "※氏名(名)は必須入力です");
    emptyCheck($_SESSION['gender_errors'], $gender, "※性別は必須入力です");
    emptyCheck($_SESSION['pref_name_errors'], $pref_name, "※都道府県は必須入力です");
    emptyCheck($_SESSION['password_errors'], $password, "※パスワードは必須入力です");
    emptyCheck($_SESSION['password_errors'], $password_confirmation, "※パスワード確認は必須入力です");
    emptyCheck($_SESSION['email_errors'], $email, "※メールアドレスは必須入力です");

    // パスワードが一致しているか
    matchPassword($_SESSION['password_errors'], $password, $password_confirmation, "※入力されたパスワードが一致しません");


    // 上記のバリデーションでエラーが出なかった場合、下記の入力チェックを行う
    if(
      !$_SESSION['name_errors'] &&
      !$_SESSION['gender_errors'] &&
      !$_SESSION['pref_name_errors'] &&
      !$_SESSION['password_errors'] &&
      !$_SESSION['email_errors']
      ){
        // 最小文字チェック
        minSizeCheck($_SESSION['password_errors'], $password, "※パスワードは8文字以上で入力してください");
        minSizeCheck($_SESSION['password_errors'], $password_confirmation, "※パスワード確認は8文字以上で入力してください");

        // 最大文字数チェック 20文字
        maxSizeCheck_20($_SESSION['name_errors'], $name_sei, "※氏名(姓)は20文字以内で入力してください");
        maxSizeCheck_20($_SESSION['name_errors'], $name_mei, "※氏名(名)は20文字以内で入力してください");
        maxSizeCheck_20($_SESSION['password_errors'], $password, "※パスワードは20文字以内で入力してください");
        maxSizeCheck_20($_SESSION['password_errors'], $password_confirmation, "※パスワード確認は20文字以内で入力してください");

        // 最大文字数チェック 100文字
        maxSizeCheck_100($_SESSION['address_errors'], $address, "※住所は100文字以内で入力してください");

        // 最大文字数チェック　 200文字
        maxSizeCheck_200($_SESSION['email_errors'], $email, "※メールアドレスは200文字以内で入力してください");
        
        // 半角英数字チェック
        halfAlphanumericCheck($_SESSION['password_errors'], $password, "※パスワードは半角英数で入力してください");
        halfAlphanumericCheck($_SESSION['password_errors'], $password_confirmation, "※パスワード確認は半角英数で入力してください");

        // メールアドレス形式チェック
        emailAddressCheck($_SESSION['email_errors'], $email, "※正しいメールアドレスを入力してください");

        // メールアドレス重複チェック
        emailAddressDuplicateCheck($_SESSION['email_errors'], $email, "※すでに登録されているメールアドレスです");

      }

      // 入力項目にエラーがない場合、次の画面へ遷移できる
      if(
        !$_SESSION['name_errors'] &&
        !$_SESSION['gender_errors'] &&
        !$_SESSION['pref_name_errors'] &&
        !$_SESSION['address_errors'] &&
        !$_SESSION['password_errors'] &&
        !$_SESSION['email_errors']
        ){
        // セッションにPOSTの内容を代入（次の画面に入力内容を持っていける）
        $_SESSION['confirm'] = $_POST;
        header('Location: confirm.php');
        exit;
      }
}

  // 「前に戻る」ボタンで戻った場合、POSTにセッション情報を代入
  if($_REQUEST['action'] == 'rewrite') {
    $_POST = $_SESSION['confirm'];
  }

?>