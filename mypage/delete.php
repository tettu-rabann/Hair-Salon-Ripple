<?php
require('../dbconnect.php');
session_start();

if(isset($_SESSION['user_id']) && $_SESSION['time'] + 3600 > time()){ /*ログイン状態を確認*/
  $_SESSION['time'] = time();

}else{
  header('Location: ../index.php');
  exit();
}
if(!empty($_POST['delete'])){
  $memos = $db->prepare('DELETE FROM posts WHERE id = ?');
  $memos->execute(array($_REQUEST['id']));
  $_SESSION['CRUD'] = 'D';
  header('Location: thanks.php');
}

?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>確認画面</title>
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
        <h1>投稿を削除</h1>
        <?php
        $lists = $db->prepare('SELECT * FROM posts');
        $lists->execute();
        $list = $lists->fetch();
          ?>
          <p>
            <?php
              print($list['title']);
            ?>
          </p>
          <p>
            <?php
            print($list['message']);
             ?>
          </p>
          <p>本当に削除しますか？</p>
          <form action="" method="post">
            <input name="delete" type="submit" value="削除する">
          </form>
          <a href="index.php">戻る</a>
      </div>
    </div>

    <script src="javascript/script.js"></script>
  </body>
</html>
