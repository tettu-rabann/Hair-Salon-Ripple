<?php
//MySQLに接続する処理
try {
  $db = new PDO('mysql:dbname=mini_bbs;
  host = 192.168.0.14;
  charset = utf-8', 'root' ,'０００００');　//パスワードは伏せています

} catch (PDOException $e) {//エラー処理
  echo 'DB接続エラー： ' . $e->getMessage();
}
?>
