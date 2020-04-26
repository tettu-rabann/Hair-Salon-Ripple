<?php
require('../dbconnect.php');
session_start();

if(isset($_SESSION['user_id']) && $_SESSION['time'] + 3600 > time()){ /*ログイン状態を確認*/
  $_SESSION['time'] = time();

  $members = $db->prepare('SELECT * FROM members WHERE user_id = ?');
  $members->execute(array($_SESSION['user_id']));
  $member = $members->fetch();

}else{
  header('Location: ../index.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>マイページ</title>
    <meta http-equiv="content-type" content = "text/html" >
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "css/styles.css">
    <link rel = "stylesheet" href = "css/responsive.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>


    <div class="mypage-wrapper">
      <div class="container">
        <h1>マイページ</h1>
        <p><?php echo htmlspecialchars($member['name'],ENT_QUOTES); ?>さん ようこそ！</p>
        ｜<a href="post.php">投稿を追加</a>｜
        <a href="list_of_posts.php">投稿を編集</a>｜
        <a href="../join/index.php">管理者追加画面へ</a>｜
        <a href="reservationーbrowse">予約管理画面へ</a>｜
        <a href="logout.php">ログアウト</a>｜

      </div>
    </div>

    <script src="javascript/script.js"></script>
  </body>
</html>
