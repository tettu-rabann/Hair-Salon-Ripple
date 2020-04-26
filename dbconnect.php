<?php
try {
  $db = new PDO('mysql:dbname=mini_bbs;
  host = 192.168.0.14;
  charset = utf-8', 'root' ,'tettu0302');

} catch (PDOException $e) {
  echo 'DB接続エラー： ' . $e->getMessage();
}
?>
