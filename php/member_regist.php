<?php
  error_reporting(E_ALL & ~E_NOTICE);
  require './partials/prefectures.php';

  session_start();

  // 必須の入力項目が空でないか判定
  if(!empty($_POST)) {
      if($_POST['name_sei'] == '') {
        $error['name_sei'] = 'blank';
      }
      if($_POST['name_mei'] == '') {
        $error['name_mei'] = 'blank';
      }
      if($_POST['gender'] == '') {
        $error['gender'] = 'blank';
      }
      if($_POST['pref_name'] == '') {
        $error['pref_name'] = 'blank';
      }
      if($_POST['password'] == '') {
        $error['password'] = 'blank';
      }
      if($_POST['password_confirmation'] == '') {
        $error['password_confirmation'] = 'blank';
      }
      if($_POST['email'] == '') {
        $error['email'] = 'blank';
      }

      // 入力項目にエラーがない場合、次の画面へ遷移できる
      if(empty($error)) {
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
          <input class="form__input" type="text" name="name_sei" value="<?php echo htmlspecialchars($_POST['name_sei'], ENT_QUOTES); ?>" id="name_sei" maxlength="20" required />
          <label for="name_mei">名</label>
          <input class="form__input" type="text" name="name_mei" value="<?php echo htmlspecialchars($_POST['name_mei'], ENT_QUOTES); ?>" id="name_mei" maxlength="20" required />
        </div>

        <div class="form__gender">
          <span class="gender">性別</span>
          <input type="radio" name="gender" value="男性" <?php if (isset($_POST['gender']) && $_POST['gender'] == "男性") echo 'checked'; ?> id="male" required>
          <label for="male">男性</label>
          <input type="radio" name="gender" value="女性" <?php if (isset($_POST['gender']) && $_POST['gender'] == "女性") echo 'checked'; ?> id="female" required>
          <label for="female">女性</label>
        </div>

        <div class="form__address input">
          <span class="address">住所</span>
          <div class="address-input">
            <div class="prefecture">
              <span>都道府県</span>
              <select name="pref_name" required>
                <?php foreach($prefectures as $pref): ?>
                  <option value="<?php echo $pref; ?>" <?php if (isset($_POST['pref_name']) && $_POST['pref_name'] == $pref) echo 'selected' ?>><?php echo $pref; ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="other-input">
              <label for="address">それ以降の住所</label>
              <input type="text" name="address" value="<?php echo htmlspecialchars($_POST['address'], ENT_QUOTES) ?>" id="address" maxlength="100">
            </div>
          </div>
        </div>

        <div class="form__password">
          <label for="password">パスワード</label>
          <input type="password" name="password" id="password" required>
        </div>

        <div class="form__password-confirmation">
          <label for="password_confirmation">パスワード確認</label>
          <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>

        <div class="form__email">
          <label for="email">メールアドレス</label>
          <input type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'], ENT_QUOTES) ?>" id="email" required>
        </div>
        <button type="submit" class="form__btn">
                確認画面へ
        </button>
      </form>

    </div>
  </div>
</body>
</html>