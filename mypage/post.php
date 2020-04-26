<?php session_start();

require('../dbconnect.php');

if(isset($_SESSION['user_id']) && $_SESSION['time'] + 3600 > time()){ /*ログイン状態を確認*/
  $_SESSION['time'] = time();

  $members = $db->prepare('SELECT * FROM members WHERE user_id = ?');
  $members->execute(array($_SESSION['user_id']));
  $member = $members->fetch();

}else{
  header('Location: ../login.php');
  exit();
}

if(!empty($_POST)){
  if($_POST['message'] != '' && $_POST['title']){
    $message = $db->prepare('INSERT INTO posts SET member_id = ? ,message = ? ,title = ?, created = NOW(), modified = NOW()');
    $message->execute(array(
    $member['user_id'],
    $_POST['message'],
    $_POST['title']
  ));
  $_SESSION['CRUD'] = 'C';
  header('Location: thanks.php');
}else{
  print('送信に失敗しました');
}
}

 ?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <title>投稿ページ</title>
    <meta http-equiv="content-type" content = "text/html" >
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "css/styles.css">
    <link rel = "stylesheet" href = "css/responsive.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>

    <div class="post-wrapper">
      <div class="container">
        <h1>お店の情報を投稿できます</h1>
        <p>以下のフォームにお店の情報を記入してください。</p>
        <form action="" method="post">
          <textarea name="title" rows="1" cols="40"></textarea><br>
          <textarea name="message" rows="30" cols="80"></textarea> <br>
          <input type="submit" value="投稿する">
        </form>
        <a href="index.php">戻る</a>

      </div>

    </div>

  </body>
</html>
