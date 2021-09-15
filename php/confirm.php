<?php 
  error_reporting(E_ALL & ~E_NOTICE);
  require './models/confirm.php';

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../public/css/default.css" />
  <link rel="stylesheet" type="text/css" href="../public/css/common.css" />
  <title>会員情報確認画面</title>
</head>
<body>
<div id="container">
    <div class="content">
        <h1>会員情報確認画面</h1>
        <form class="form" action="" method="post">
          <input type="hidden" name="action" value="submit" />
          <table>
            <tr class="form__name">
              <td>氏名</td>
              <td> <?php echo $name; ?> </td>
            </tr>
    
            <tr class="form__gender">
              <td class="gender">性別</td>
              <td> 
                <?php
                if($gender === "1") {
                  echo '男性';
                } elseif($gender === "2") {
                  echo '女性';
                }
                ?>
              </td>
            </tr>
    
            <tr class="form__address">
              <td class="address">住所</td>
              <td> <?php echo $pref_name . $address; ?> </td>
            </tr>
    
            <tr class="form__password">
              <td>パスワード</td>
              <td>セキュリティのため非表示</td>
            </tr>
    
            <tr class="form__email">
              <td>メールアドレス</td>
              <td> <?php echo $email; ?> </td>
            </tr>
          </table>
    
            <form action="./models/confirm.php" method="post">
              <button type="submit" class="form__btn">
                      登録完了
              </button>
            </form>
  
            <a href="member_regist.php?action=rewrite">
              <button type="submit" class="form__btn return">
                      前に戻る
              </button>
            </a>
        </form>
      </div>
</div>
</body>
</html>