<?php
try {
  // データベース接続
  $dsn = 'mysql:host=localhost;dbname=pizzashop;charset=utf8';
  $user = 'pizzataro';
  $pass = 'T_CUeSTYs!Zm!]YH';
  $option = [
    // エラーの出力方法
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // データの取得方法(連想配列)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ];

  // PDOオブジェクトの作成
  $db = new PDO($dsn, $user, $pass, $option);
} catch (PDOException $e) {
  echo $e->getMessage();
}
