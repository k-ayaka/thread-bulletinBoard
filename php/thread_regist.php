<?php 
  error_reporting(E_ALL & ~E_NOTICE);
  require_once './common/auth.php';
  require_once './models/thread_regist.php';

  if(!isLogin()) {
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
  <title>新規スレッド作成</title>
</head>
<body>
  <div id="container">
      <div class="content">
          <h1>スレッド作成フォーム</h1>
          <form class="form" action="" method="post">
            <table>
              <tr class="form__title">
                <td><label for="title">スレッドタイトル</label></td>
                <td><input class="title_input" type="text" name="title" value="<?php echo htmlspecialchars($_POST['title']); ?>" id="title"></td>
              </tr>
              <tr class="form__content">
                <td><label for="content">コメント</label></td>
                <td><textarea class="content_text" type="textarea" name="content" id="content"><?php echo htmlspecialchars($_POST['content']); ?></textarea></td>
              </tr>
            </table>
            <?php
              if(isset($_SESSION['title_errors'])) {
                foreach($_SESSION['title_errors'] as $error) {
                  echo "<p class='error thread'> {$error} </p>";
                }
                unset($_SESSION['title_errors']);
              }
            ?>
            <?php
              if(isset($_SESSION['content_errors'])) {
                foreach($_SESSION['content_errors'] as $error) {
                  echo "<p class='error thread'> {$error} </p>";
                }
                unset($_SESSION['content_errors']);
              }
            ?>
            <button type="submit" class="form__btn">
              確認画面へ
            </button>
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