<?php require('../dbconnect.php');
session_start();

if(!isset($_SESSION['join'])){
  header('Location: index.php');
  exit();
}

if (!empty($_POST)) {
  $statement = $db->prepare('INSERT INTO members SET name = ? ,user_id = ?, password = ? ,created = NOW()');
  echo $ret = $statement->execute(array(
    $_SESSION['join']['name'],
    $_SESSION['join']['user_id'],
    sha1($_SESSION['join']['password'])
));

unset($_SESSION['join']);

header('Location: thanks.php');
exit();
}
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>会員情報登録</title>
    <meta http-equiv="content-type" content = "text/html" >
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "../css/styles.css">
    <link rel = "stylesheet" href = "css/responsive.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="registration-wrapper">
      <div class="container">
        <p>管理者登録をします。下記に必要事項を記入してください。</p>
        <form action="" method="post">
          <input type="hidden" name="action" value="submit" />
          <p>ニックネーム</p>
          <?php echo htmlspecialchars($_SESSION['join']['name'] , ENT_QUOTES); ?>
          <p>ユーザID</p>
          <?php echo htmlspecialchars($_SESSION['join']['user_id'],ENT_QUOTES); ?>
          <p>パスワード[セキュリティにつき表示できません]</p>
          <div>
            <a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a>｜
          <input type="submit" name="" value=送信する>
        </div>
        </form>
      </div>

    </div>
  </body>
</html>
