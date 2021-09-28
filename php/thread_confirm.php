<?php 
  error_reporting(E_ALL & ~E_NOTICE);
  require_once './common/auth.php';
  require_once './models/thread_confirm.php';

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
  <title>スレッド作成確認</title>
</head>
<body>
  <div id="container">
      <div class="content">
          <h1>スレッド作成確認画面</h1>
          <form class="form" action="" method="post">
            <input type="hidden" name="action" value="submit" />
            <table>
              <tr class="form__title">
                <td><label for="title">スレッドタイトル</label></td>
                <td class="title_input"><?php echo $title; ?></td>
              </tr>
              <tr class="form__content">
                <td><label for="content">コメント</label></td>
                <td ><?php echo nl2br($content); ?></td>
              </tr>
            </table>

            <form action="./models/thread_confirm.php" method="post">
              <button type="submit" class="form__btn">
                スレッドを作成する
              </button>
            </form>
          </form>

          <a href="thread_regist.php?action=rewrite">
            <button type="submit" class="form__btn return">
                    前に戻る
            </button>
          </a>
        </div>
  </div>
</body>
</html>