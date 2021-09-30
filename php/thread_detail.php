<?php
  error_reporting(E_ALL & ~E_NOTICE);
  require_once './models/thread_detail.php';
  require './common/auth.php';

  $thread_title = $_SESSION['thread_detail']['title'];
  $thread_content = $_SESSION['thread_detail']['content'];
  $thread_create = $_SESSION['thread_detail']['created_at'];
  $thread_name_sei = $_SESSION['thread_detail']['name_sei'];
  $thread_name_mei = $_SESSION['thread_detail']['name_mei'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../public/css/default.css" />
  <link rel="stylesheet" type="text/css" href="../public/css/common.css" />
  <title>スレッド詳細</title>
</head>
<body>
  <div id="container">
      <header>
        <nav class="header__nav">
          <ul class="header__ul">
              <div class="header__right">
                <a href="thread.php"><li class="header__li">スレッド一覧に戻る</li></a>
              </div>
          </ul>
        </nav>
      </header>
        <div class="thread">
          <div class="thread__title">
            <h1><?php echo $thread_title; ?></h1>
            <div><?php echo date('n/d/y H:i', strtotime($thread_create)); ?></div>
          </div>
          <main>
            <section class="thread__content">
              <div class="content__inner">
                <div class="content-top">
                  投稿者： <?php echo $thread_name_sei; ?>　<?php echo $thread_name_mei; ?>　<?php echo date('Y.n.d H:i', strtotime($thread_create)); ?>
                </div>
                <p class="content-text"><?php echo $thread_content; ?></p>
              </div>
            </section>
            <?php if(isLogin()): ?>
              <section class="thread__comment">
                <form action="">
                  <textarea class="comment__input" name=""></textarea>
                  <button type="submit" class="comment__btn">
                    コメントする
                  </button>
                </form>
              </section>
            <?php endif; ?>
          </main>
        </div>
  </div>
</body>
</html>