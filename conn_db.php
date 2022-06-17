<?php


//本機連線
$pdo = new PDO('mysql:host=localhost;dbname=health2; charset=utf8', 'web', '1234');


//遠端主機連線 使用byehost註冊個人虛擬主機
//$pdo = new PDO('mysql:host=xxxxxx.byethost7.com;dbname=xxxxxxxxxxxxxxxx; charset=utf8', 'xxxxxxx', 'xxxxxxxxxx');
