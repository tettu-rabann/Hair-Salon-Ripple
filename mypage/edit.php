<?php
require('../dbconnect.php');
session_start();

if(isset($_SESSION['user_id']) && $_SESSION['time'] + 3600 > time()){ /*ログイン状態を確認*/
  $_SESSION['time'] = time();

}else{
  header('Location: ../index.php');
  exit();
}

$memos = $db->prepare('SELECT * FROM posts WHERE id = ?');
$memos->execute(array($_REQUEST['id']));
$memo = $memos->fetch();

if(!empty($_POST)){
  $update = $db->prepare('UPDATE posts SET title = ?,message = ? WHERE id = ?');
  $update->execute(array($_POST['title'],$_POST['message'],$memo['id']));
  $_SESSION['CRUD'] ='U';
  header('Location: thanks.php');
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
        <h1>投稿編集画面</h1>
        <form action="edit.php?id=<?php print($memo['id']) ?>" method="post">
          <textarea name="title" rows="1" cols="40"> <?php print($memo['title']); ?></textarea><br>
          <textarea name="message" rows="30" cols="80"> <?php print($memo['message']); ?></textarea> <br>
          <input type="submit" value="編集する">
        </form>

         <a href="list_of_posts.php">戻る</a>
      </div>
    </div>

    <script src="javascript/script.js"></script>
  </body>
</html>
