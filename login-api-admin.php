<?php
require __DIR__ . '/parts/connect_db.php';
header('Content-Type: application/json');

$output = [
    'success' => false,
    'error' => '',
    'code' => 0,
];


if (empty($_POST['account']) or empty($_POST['password'])) {
    $output['error'] = '請輸入帳號或密碼！';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$sql = "SELECT * FROM admins WHERE admins_account =? ";
//要去資料庫建admins資料表

$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['account']]);
$row = $stmt->fetch();

//找找看有沒有這個帳號
if (empty($row)) {
    $output['error'] = '帳號或密碼錯誤！';
    $output['code'] = 401;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
//驗證密碼
if (password_verify($_POST['password'], $row['admins_password_hash'])) {
    $output['success'] = true;
    $_SESSION['admin'] = [
        'sid' => $row['admins_sid'],
        'account' => $row['admins_account'],
    ];
} else {
    $output['error'] = '帳號或密碼錯誤！';
    $output['code'] = 431;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
