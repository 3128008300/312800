<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'config.php';

$sql = "SELECT content FROM website_content ORDER BY updated_at DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(['success' => true, 'content' => $row['content']]);
} else {
    echo json_encode(['success' => false, 'content' => '暂无内容']);
}

$conn->close();
?>