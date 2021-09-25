<?php
  error_reporting(E_ALL & ~E_NOTICE);
  require './common/auth.php';
  require './models/login.php';

  session_start();

  if(isLogin()) {
    header('Location: top.php');
    exit;
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
  <title>ログインフォーム</title>
</head>
<body>
  <div id="container">
      <div class="content">
          <h1>ログイン</h1>
          <form class="form" action="" method="post">
            <table>
              <tr class="form__email">
                <td><label for="user_email">メールアドレス(ID)</label></td>
                <td><input type="email" name="user_email" value="<?php echo htmlspecialchars($_POST['user_email']); ?>" id="user_email" autocomplete=></td>
              </tr>
              <tr class="form__password">
                <td><label for="user_password">パスワード</label></td>
                <td><input type="password" name="user_password" value="<?php echo htmlspecialchars($_POST['user_password']); ?>" id="user_password"></td>
              </tr>
            </table>
            <?php
              if(isset($_SESSION['user_error'])) {
                foreach($_SESSION['user_error'] as $error) {
                  echo "<p class='error login'> {$error} </p>";
                }
                unset($_SESSION['user_error']);
              }
            ?>

            <form action="./models/login.php" method="post">
              <button type="submit" class="form__btn">
                ログイン
              </button>
            </form>
          </form>

          <a href="top.php">
            <button type="submit" class="form__btn return">
                    トップに戻る
            </button>
          </a>
        </div>
  </div>
</body>
</html>