<?php 
  require_once './models/thread.php';
  require './common/auth.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../public/css/default.css" />
  <link rel="stylesheet" type="text/css" href="../public/css/common.css" />
  <title>スレッド一覧</title>
</head>
<body>
  <div id="container">
      <header>
        <nav class="header__nav">
          <ul class="header__ul">
          <?php if(isLogin()): ?>
              <div class="header__right">
                <a href="thread_regist.php"><li class="header__li">新規スレッド作成</li></a>
              </div>
          <?php endif; ?>
          </ul>
        </nav>
      </header>
      <div class="content">
      <form class="form" action="thread.php" method="get">
          <div class="form__search">
            <input class="search_input" type="text" name="search" value="">
            <button type="submit" class="search__btn">
              スレッド検索
            </button>
          </div>
          <table>
              <?php foreach($results as $result): ?>
                  <tr class='search'>
                    <th>ID: <?php echo $result['id']; ?></th>
                    <th><a href="thread_detail.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></th>
                    <th><?php echo date('Y.m.d H:i', strtotime($result['created_at'])); ?></th>
                  </tr>
              <?php endforeach; ?>
          </table>
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