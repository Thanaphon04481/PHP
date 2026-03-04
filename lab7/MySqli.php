<?php
// 1. การเชื่อมต่อฐานข้อมูล
$conn_mysqli = new mysqli("localhost", "root", "", "lab07_db");
if ($conn_mysqli->connect_error) {
    die("เชื่อมต่อล้มเหลว: " . $conn_mysqli->connect_error);
}

// 2. การเพิ่มข้อมูล (INSERT)
$name = "สมชาย ใจดี";
$email = "somchai@example.com";
$stmt = $conn_mysqli->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $email); // ss หมายถึง String 2 ตัว
$stmt->execute();
echo "เพิ่มข้อมูลสำเร็จ (MySQLi)<br>";

// 3. การแก้ไขข้อมูล (UPDATE)
$new_name = "สมชาย แก้ไขแล้ว";
$user_id = 1;
$stmt = $conn_mysqli->prepare("UPDATE users SET name=? WHERE id=?");
$stmt->bind_param("si", $new_name, $user_id); // s = string, i = integer
$stmt->execute();
echo "แก้ไขข้อมูลสำเร็จ (MySQLi)<br>";

// 4. การลบข้อมูล (DELETE)
$delete_id = 1;
$stmt = $conn_mysqli->prepare("DELETE FROM users WHERE id=?");
$stmt->bind_param("i", $delete_id);
$stmt->execute();
echo "ลบข้อมูลสำเร็จ (MySQLi)<br>";

$conn_mysqli->close();
?>