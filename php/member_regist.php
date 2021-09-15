<?php
  error_reporting(E_ALL & ~E_NOTICE);
  require './partials/prefectures.php';
  require './models/register.php';

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../public/css/default.css" />
  <link rel="stylesheet" type="text/css" href="../public/css/common.css" />
  <title>会員情報登録フォーム</title>
</head>
<body>
  <div id="container">
    <div class="content">

      <form class="form" action="" method="post">
        <h1>会員情報登録フォーム</h1>

        <div class="form__name">
          <span>氏名</span>
          <label for="name_sei">姓</label>
          <input class="form__input" type="text" name="name_sei" value="<?php echo $_POST['name_sei']; ?>" id="name_sei"/>
          <label for="name_mei">名</label>
          <input class="form__input" type="text" name="name_mei" value="<?php echo $_POST['name_mei']; ?>" id="name_mei"/>
          <?php
            if(isset($_SESSION['name_errors'])) {
              foreach($_SESSION['name_errors'] as $error) {
                echo "<p class='error'> {$error} </p>";
              }
            }
          ?>
        </div>

        <div class="form__gender">
          <span class="gender">性別</span>
          <input type="radio" name="gender" value="1" <?php if (isset($_POST['gender']) && $_POST['gender'] === "1") echo 'checked'; ?> id="male">
          <label for="male">男性</label>
          <input type="radio" name="gender" value="2" <?php if (isset($_POST['gender']) && $_POST['gender'] === "2") echo 'checked'; ?> id="female">
          <label for="female">女性</label>
          <?php
            if(isset($_SESSION['gender_errors'])) {
              foreach($_SESSION['gender_errors'] as $error) {
                echo "<p class='error'> {$error} </p>";
              }
            }
          ?>
        </div>

        <div class="form__address input">
          <span class="address">住所</span>
          <div class="address-input">
            <div class="prefecture">
              <span>都道府県</span>
              <select name="pref_name">
                <?php foreach($prefectures as $pref): ?>
                  <option value="<?php echo $pref; ?>" <?php if (isset($_POST['pref_name']) && $_POST['pref_name'] == $pref) echo 'selected' ?>><?php echo $pref; ?></option>
                <?php endforeach ?>
              </select>
              <?php
                if(isset($_SESSION['pref_name_errors'])) {
                  foreach($_SESSION['pref_name_errors'] as $error) {
                    echo "<p class='error'> {$error} </p>";
                  }
                }
              ?>
            </div>
            <div class="other-input">
              <label for="address">それ以降の住所</label>
              <input type="text" name="address" value="<?php echo $_POST['address'] ?>" id="address">
              <?php
                if(isset($_SESSION['address_errors'])) {
                  foreach($_SESSION['address_errors'] as $error) {
                    echo "<p class='error'> {$error} </p>";
                  }
                }
              ?>
            </div>
          </div>
        </div>

        <div class="form__password">
          <label for="password">パスワード</label>
          <input type="password" name="password" value="<?php echo $_POST['password']; ?>" id="password">
        </div>

        <div class="form__password-confirmation">
          <label for="password_confirmation">パスワード確認</label>
          <input type="password" name="password_confirmation" value="<?php echo $_POST['password_confirmation']; ?>" id="password_confirmation">
        </div>
        <?php
            if(isset($_SESSION['password_errors'])) {
              foreach($_SESSION['password_errors'] as $error) {
                echo "<p class='error'> {$error} </p>";
              }
            }
            
        ?>

        <div class="form__email">
          <label for="email">メールアドレス</label>
          <input type="email" name="email" value="<?php echo $_POST['email']; ?>" id="email">
        </div>
        <?php
            if(isset($_SESSION['email_errors'])) {
              foreach($_SESSION['email_errors'] as $error) {
                echo "<p class='error'> {$error} </p>";
              }
            }
        ?>
        <button type="submit" class="form__btn">
                確認画面へ
        </button>
      </form>

    </div>
  </div>
</body>
</html>