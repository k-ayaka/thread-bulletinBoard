<?php
  require './partials/prefectures.php';
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
          <span>姓</span>
          <input class="form__input" type="text" name="last_name" autocomplete="off" maxlength="20" required />
          <span>名</span>
          <input class="form__input" type="text" name="first_name" autocomplete="off" maxlength="20" required />
        </div>

        <div class="form__gender">
          <span class="gender">性別</span>
          <input type="radio" name="gender" value="male" required>
          <span>男性</span>
          <input type="radio" name="gender" value="female" required>
          <span>女性</span>
        </div>

        <div class="form__address">
          <span class="address">住所</span>
          <div class="address-input">
            <div class="prefecture">
              <span>都道府県</span>
              <select name="prefecture" id="">
                <?php foreach($prefecture as $key => $value): ?>
                  <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="other-input">
              <span>それ以降の住所</span>
              <input type="text" name="address" maxlength="100">
            </div>
          </div>
        </div>

        <div class="form__password">
          <span>パスワード</span>
          <input type="password" name="password" required>
        </div>

        <div class="form__password-confirmation">
          <span>パスワード確認</span>
          <input type="password" name="password_confirmation" required>
        </div>

        <div class="form__email">
          <span>メールアドレス</span>
          <input type="email" name="email" required>
        </div>
        <div class="form__btn">
            <a class="btn" href="#">
                確認画面へ
            </a>
        </div>
      </form>

    </div>
  </div>
</body>
</html>