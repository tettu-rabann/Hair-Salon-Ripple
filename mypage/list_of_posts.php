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
    <title>投稿リスト一覧</title>
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
        <h1>投稿リスト一覧</h1>
        <?php
        $lists = $db->prepare('SELECT * FROM posts');
        $lists->execute();
        while ($list = $lists->fetch()) :
          ?>
          <p>
            <?php
              print(mb_substr($list['title'] , 0 , 50));
              print(mb_strlen($list['title']) > 50 ? '...':'');
            ?>
          </p>
          <p>
            <?php
            print(mb_substr($list['message'] , 0 , 50));
            print(mb_strlen($list['message']) > 50 ? '...':'');
             ?>
          </p>
          <a href="edit.php?id=<?php print($list['id']) ?>">編集する</a>
          <a href="delete.php?id=<?php print($list['id']); ?>">削除する</a>

       <?php endwhile; ?>
       <br>
         <a href="index.php">戻る</a>
      </div>
    </div>

    <script src="javascript/script.js"></script>
  </body>
</html>
