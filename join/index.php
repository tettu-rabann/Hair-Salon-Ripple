<?php
session_start();

if (!empty($_POST)) {
  if ($_POST['name'] == '') {
    $error['name'] = 'blank';
  }
  if ($_POST['user_id'] == '') {
    $error['user_id'] = 'blank';
  }
  if ($_POST['password'] == '') {
    $error['password'] = 'blank';
  }
  if (strlen($_POST['password']) < 4) {
    $error['password'] = 'length';
  }


  if (empty($error)) {
    $_SESSION['join'] = $_POST;
    header('Location: check.php');
    exit();
  }

}


if ($_REQUEST['action'] == 'rewrite') {
  $_POST = $_SESSION['join'];
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
        <form class="" action="" method="post">
          <p>管理者名 <span>必須</span> </p>
          <input type="text" name="name" size="35" maxlength="255" value="<?php echo htmlspecialchars($_POST['name'] , ENT_QUOTES); ?>">
          <?php if($error['name'] == 'blank'): ?>
            <p class = "error">*管理者名を入力してください</p>
          <?php endif; ?>
          <p>ユーザID <span>*必須</span> </p>
          <input type="text" name="user_id" size="35" maxlength="255" value="<?php htmlspecialchars($_POST['user_id'] , ENT_QUOTES); ?>">
          <?php if($error['user_id'] == 'blank'): ?>
            <p class="error">*ユーザIDを入力してください</p>
          <?php endif; ?>
          <p>パスワード <span>必須</span> </p>
          <input type="password" name="password" size="10" maxlength="20" value="<?php echo htmlspecialchars($_POST['password'] , ENT_QUOTES); ?>">
          <?php  if($error['password'] == 'blank'):?>
            <p class="error">*パスワードを入力してください</p>
          <?php endif;
                if($error['password'] == 'length'):?>
            <p class="error">*パスワードは4文字以上で入力してください</p>
          <?php endif; ?>
          <p></p>
          <input type="submit" value="確認画面に移動する" />
          <a href="../mypage/index.php">戻る</a>
        </form>
      </div>

    </div>
  </body>
</html>
