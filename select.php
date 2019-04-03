<?php
const ROOT = "";
require __DIR__.ROOT."/vendor/autoload.php";

// DB를 초기화 합니다.
const DBINFO = "./conf/dbconf.php";
$db = \Jiny\Database\db_init(DBINFO);

$table = "board5";
if ($rows = $db->table($table)->select(['regdate','title'])) {
    var_dump($rows);
}