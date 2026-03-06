<?php
ob_start(); // เริ่มการดักจับข้อมูลที่จะส่งออก
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = mysqli_connect("localhost", "it67040233137", "D1G2W8A3", "it67040233137");
mysqli_set_charset($conn, "utf8mb4"); // บังคับภาษาไทยให้ถูกต้อง

if (!$conn) {
    ob_clean(); // ล้างขยะถ้าเชื่อมต่อไม่ติด
    echo json_encode(["status" => "error", "message" => "Connection failed"]);
    exit;
}

// ... ส่วนคิวรี่ข้อมูลเหมือนเดิม ...

$result = mysqli_query($conn, $query);
$cats = array();
while ($row = mysqli_fetch_assoc($result)) {
    $cats[] = $row;
}

ob_clean(); // *** สำคัญมาก: ล้างขยะทุกอย่างที่อาจจะหลุดออกมาก่อนหน้าเครื่องหมาย {
echo json_encode([
    "status" => "success",
    "data" => $cats
]);