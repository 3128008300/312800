<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'config.php';

// 简单的密码验证
$password = $_POST['password'] ?? '';
$new_content = $_POST['content'] ?? '';

if ($password !== 'admin123') {
    echo json_encode(['success' => false, 'message' => '密码错误']);
    exit;
}

if (empty($new_content)) {
    echo json_encode(['success' => false, 'message' => '内容不能为空']);
    exit;
}

// 防止SQL注入
$new_content = $conn->real_escape_string($new_content);

$sql = "UPDATE website_content SET content = '$new_content' WHERE id = 1";
if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'message' => '内容更新成功']);
} else {
    echo json_encode(['success' => false, 'message' => '更新失败: ' . $conn->error]);
}

$conn->close();
?>