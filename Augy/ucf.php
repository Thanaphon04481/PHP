<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Define Function</title>
</head>

<body>
    <h1>ทดสอบการใช้ User-define Function</h1>

    <?php
    
    function sum($num1, $num2)
    {
        return $num1 + $num2;
    }

    function add_five($num)
    {
        $result = $num + 5;
        echo "ค่าภายในฟังก์ชัน add_five คือ: $result<br>";
        return $result;
    }

    function sumListNumber(...$x)
    {
        $n = 0;
        foreach ($x as $item) {
            $n += $item;
        }
        return $n;
    }

    function myFamily($lastname, ...$firstname)
    {
        $txt = "";
        $len = count($firstname);
        for ($i = 0; $i < $len; $i++) {
            $txt .= "Hi, {$firstname[$i]} $lastname.<br>";
        }
        return $txt;
    }



    echo "ผลลัพธ์ของฟังก์ชัน sum(10, 20) คือ: " . sum(10, 20) . "<br>";

    echo "ผลลัพธ์ของฟังก์ชัน add_five(15) คือ: " . add_five(15) . "<br>";

    $a = 30;
    $b = 45;
    echo "ผลลัพธ์ของฟังก์ชัน sum($a, $b) คือ: " . sum($a, $b) . "<br>";

    echo "<hr>";

    $num = 50;
    echo "ค่าของ num ก่อนเรียกฟังก์ชัน add_five คือ: $num<br>";
    $new_num = add_five($num);
    echo "ค่าของ num หลังเรียกฟังก์ชัน add_five คือ: $num (ค่าตัวแปรเดิม)<br>";
    echo "ค่าที่ถูก return จาก add_five คือ: $new_num<br>";

    ?>

    <h2>ตัวอย่าง function ที่มีพารามิเตอร์หลายตัว</h2>

    <?php
    echo myFamily("Doe", "Jane", "John", "Joey");

    echo "ผลลัพธ์ของฟังก์ชัน sumListNumber(10, 20, 30, 40, 50) คือ: " . 
         sumListNumber(10, 20, 30, 40, 50) . "<br>";

    echo "ผลลัพธ์ของฟังก์ชัน sumListNumber(1~10) คือ: " .
         sumListNumber(1,2,3,4,5,6,7,8,9,10) . "<br>";
    ?>
<h2>ตัวอย่าง function</h2>
<?php
function thai_date($strDate = "now"){
    date_default_timezone_set("Asia/Bangkok");
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai พ.ศ $strYear";
}   
echo"เวลาปัจจุบัน thai". thai_date(2025-12-11) . "<br>";
echo thai_date(2025-12-11) . "<br>";
?>
</body>

</html>