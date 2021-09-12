<?php 
  error_reporting(E_ALL & ~E_NOTICE);
  session_start();

  // セッションの内容が含まれているか判定
  if(!isset($_SESSION['confirm'])) {
    // セッションの内容が正しくなければ、入力画面へ遷移
    header('Location: member_regist.php');
    exit;
  }

  // POSTされたデータを変数に代入
  $name_sei = htmlspecialchars($_SESSION['confirm']['name_sei'], ENT_QUOTES);
  $name_mei = htmlspecialchars($_SESSION['confirm']['name_mei'], ENT_QUOTES);
  $gender = $_SESSION['confirm']['gender'];
  $pref_name = $_SESSION['confirm']['pref_name'];
  $address = $_SESSION['confirm']['address'];
  $email = htmlspecialchars($_SESSION['confirm']['email'], ENT_QUOTES);


  // 取得した値を整形
  $name = $name_sei . '　' . $name_mei;

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
          <table>
            <tr class="form__name">
              <td>氏名</td>
              <td> <?php echo $name; ?> </td>
            </tr>
    
            <tr class="form__gender">
              <td class="gender">性別</td>
              <td> <?php echo $gender; ?> </td>
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
    
            <form action="complete.php" method="post">
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