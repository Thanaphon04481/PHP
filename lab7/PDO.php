<?php
// 1. การเชื่อมต่อฐานข้อมูล
try {
    $conn_pdo = new PDO("mysql:host=localhost;dbname=lab07_db;charset=utf8", "root", "");
    $conn_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("เชื่อมต่อล้มเหลว: " . $e->getMessage());
}

// 2. การเพิ่มข้อมูล (INSERT)
$name = "สมหญิง น่ารัก";
$email = "somying@example.com";
$stmt = $conn_pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
// สามารถส่ง Array เข้าไปใน execute() ได้เลย สะดวกมาก!
$stmt->execute(['name' => $name, 'email' => $email]);
echo "เพิ่มข้อมูลสำเร็จ (PDO)<br>";

// 3. การแก้ไขข้อมูล (UPDATE)
$new_email = "somying_new@example.com";
$user_id = 2;
$stmt = $conn_pdo->prepare("UPDATE users SET email=:email WHERE id=:id");
$stmt->execute(['email' => $new_email, 'id' => $user_id]);
echo "แก้ไขข้อมูลสำเร็จ (PDO)<br>";

// 4. การลบข้อมูล (DELETE)
$delete_id = 2;
$stmt = $conn_pdo->prepare("DELETE FROM users WHERE id=:id");
$stmt->execute(['id' => $delete_id]);
echo "ลบข้อมูลสำเร็จ (PDO)<br>";

$conn_pdo = null; // ปิดการเชื่อมต่อ
?>