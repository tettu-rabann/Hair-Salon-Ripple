<?php
require('../dbconnect.php');
session_start();

if(isset($_SESSION['user_id']) && $_SESSION['time'] + 3600 > time()){ /*ログイン状態を確認*/
  $_SESSION['time'] = time();

}else{
  header('Location: ../index.php');
  exit();
}



?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>編集</title>
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
        <h1>CRUD確認画面</h1>
        <?php if($_SESSION['CRUD'] == 'C'): ?>
          <p>新規投稿に成功しました</p>
        <?php
        $_SESSION['CRUD'] = '';
        endif; ?>
        <?php if($_SESSION['CRUD'] == 'D'): ?>
          <p>投稿を削除しました</p>
        <?php
        $_SESSION['CRUD'] = '';
        endif; ?>
        <?php if($_SESSION['CRUD'] == 'U'): ?>
          <p>投稿を変更しました</p>
          <?php
          $_SESSION['CRUD'] = '';
        endif; ?>
         <a href="index.php">戻る</a>
      </div>
    </div>

    <script src="javascript/script.js"></script>
  </body>
</html>
