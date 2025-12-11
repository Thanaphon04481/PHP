<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Built-in Function ฟังก์ชันที่มีพร้อมใช้ใน PHP</title>
</head>

<body>
    <h1>PHP Built-in Function ฟังก์ชันที่มีพร้อมใช้ใน PHP</h1>

    <h2>ทดสอบใช้ function date()</h2>
    <?php
    echo "วันนี้วันที่: " . date("Y-m-d") . "<br>";
    echo "เวลาปัจจุบัน: " . date("H:i:s") . "<br>";
    echo "วันนี้เป็นวัน: " . date("l") . "<br>";
    ?>

    <h2>ทดสอบการใช้ function date_diff()</h2>
    <?php
    $date1 = date_create("2005-12-26");
    $date2 = date_create("2025-12-11");

    $diff = date_diff($date1, $date2);

    echo "จำนวนวันทั้งหมด: " . $diff->days . " วัน<br>";
    echo "ต่างกัน: " . $diff->y . " ปี ";
    echo $diff->m . " เดือน ";
    echo $diff->d . " วัน<br>";
    ?>

    <h2>ทดสอบการใช้ Math function</h2>
    <?php
    $number = 10.7;
    $num2 = 15.3;
    $pi = 3.14159;

    echo "ค่าปัดขึ้นของ $number คือ: " . ceil($number) . "<br>";
    echo "ค่าปัดลงของ $number คือ: " . floor($number) . "<br>";

    echo "ค่าของ pi ปัดเป็นทศนิยม 2 ตำแหน่ง คือ: " . round($pi, 2) . "<br>";

    echo "ค่าของ PI คือ: " . pi() . "<br>";
    echo "ค่าของ 5 ยกกำลัง 3 คือ: " . pow(5, 3) . "<br>";

    echo "ค่ารากที่สองของ $num2 คือ: " . sqrt($num2) . "<br>";

    echo "ค่าสุ่มระหว่าง 1 ถึง 100 คือ: " . rand(1, 100) . "<br>";
    echo "ค่าสุ่มระหว่าง 50 ถึง 150 คือ: " . rand(50, 150) . "<br>";
    echo "ค่าสุ่ม (ค่าใดก็ได้) คือ: " . rand() . "<br>";

    echo "ค่าสูงสุดใน Array (7, 2, 9, 4) คือ: " . max(7, 2, 9, 4) . "<br>";
    echo "ค่าต่ำสุดใน Array (7, 2, 9, 4) คือ: " . min(7, 2, 9, 4) . "<br>";
    ?>

    <h2>ทดสอบการใช้ String Function</h2>
    <?php
    $str = "Hello PHP Function";

    echo "ความยาวของสตริง '$str' คือ " . strlen($str) . " ตัวอักษร<br>";
    echo "สตริง '$str' เมื่อแปลงเป็นตัวพิมพ์ใหญ่ทั้งหมด คือ " . strtoupper($str) . "<br>";
    echo "สตริง '$str' เมื่อแปลงเป็นตัวพิมพ์เล็กทั้งหมด คือ " . strtolower($str) . "<br>";
    echo "สตริง '$str' เมื่อแปลงเป็นตัวพิมพ์ใหญ่ตัวแรก คือ " . ucfirst($str) . "<br>";
    echo "สตริง '$str' เมื่อแปลงเป็นตัวพิมพ์ใหญ่ทุกคำ คือ " . ucwords($str) . "<br>";

    $substr = "PHP";
    echo "ตำแหน่งของคำว่า '$substr' ในสตริง '$str' คือ " . strpos($str, $substr) . "<br>";

    $replace = str_replace("Function", "ฟังก์ชัน", $str);
    echo "เมื่อแทนที่คำว่า 'Function' ด้วย 'ฟังก์ชัน' จะได้สตริงใหม่คือ '$replace' <br>";

    $str2 = " PHP Function with Spaces ";
    echo "สตริงก่อนลบช่องว่างด้านหน้าและหลัง: *" . $str2 . "*<br>";
    echo "สตริงหลังลบช่องว่างด้านหน้าและหลัง: *" . trim($str2) . "*<br>";
    ?>

    <?php myFooter("pirat"); ?>

</body>

</html>

<?php
function myFooter($myname)
{
    echo "<center><footer><hr>";
    echo "<p>PHP Built-in Function Example &copy; 2024</p>";
    echo "<p>สร้างโดย: $myname</p>";
    echo "</footer></center>";
}
?>
