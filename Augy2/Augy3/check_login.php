<?php
session_start();

if (!isset($_SESSION["username"])) {
    echo "กรุณาเข้าสู่ระบบ";
    // อาจจะเพิ่มลิงก์กลับไปหน้า login: echo "<a href='login.php'>Login</a>";
} else {
    echo "ยินดีต้อนรับ " . $_SESSION["username"];
}
?>