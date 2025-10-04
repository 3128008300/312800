<?php
$host = 'localhost';
$username = 'your_username';  // 替换为您的数据库用户名
$password = 'your_password';  // 替换为您的数据库密码
$database = 'simple_website';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
}

// 设置字符集
$conn->set_charset("utf8mb4");
?>