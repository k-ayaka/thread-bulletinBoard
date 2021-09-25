<?php 
  require './common/auth.php';
  $name = getUserName();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../public/css/default.css" />
  <link rel="stylesheet" type="text/css" href="../public/css/common.css" />
  <title>トップページ</title>
</head>
<body>
  <div id="container">
      <header>
        <nav class="header__nav">
          <ul class="header__ul">
            <?php if(isLogin()): ?>
              <div class="header__logout">
                <p>ようこそ<?php echo $name ?>様</p>
                <form action="./models/logout.php" method="post">
                  <button class="logout__btn"><li class="header__li">ログアウト</li></button>
                </form>
              </div>
            <?php else: ?>
              <div class="header__login">
                <a href="member_regist.php"><li class="header__li">新規会員登録</li></a>
                <a href="login.php"><li class="header__li">ログイン</li></a>
              </div>
            <?php endif; ?>
          </ul>
        </nav>
      </header>
      <div class="content">
      </div>
  </div>
</body>
</html>