<?php
include __DIR__ . '/parts/connect_db.php';

$pageName = 'mb_delete';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

$sql = "DELETE FROM `member` WHERE member_sid = {$sid}";

$pdo->query($sql);

$come_from = '05-mb_list.php';

// 要詢問確認刪除
if (!empty($_SERVER['HTTP_REFERER'])) {
    $come_from = $_SERVER['HTTP_REFERER'];
}
header("Location: {$come_from}");
