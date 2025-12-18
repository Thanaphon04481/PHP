<?php
session_start();

if (isset($_POST["submit"])) { // เปลี่ยนจาก $_SESSION เป็น $_POST
    $_SESSION["username"] = $_POST["username"];
    header("Location: home.php");
    exit(); // ต้องใส่ทุกครั้งหลัง header
}
?>
<h1>ทดสอบการใช้งาน Session</h1>
<form action="" method="post">
    ชื่อผู้ใช้: <input type="text" name="username" required>
    <input type="submit" name="submit" value="Login">
</form>