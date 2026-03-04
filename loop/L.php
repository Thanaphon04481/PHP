<?php
// ==========================================
// ส่วนที่ 1: กำหนดค่าตัวแปรข้อมูลส่วนตัว
// ==========================================
$university = "มหาวิทยาลัยราชภัฏอุดรธานี";
$faculty = "คณะวิทยาศาสตร์";
$major = "สาขาเทคโนโลยีสารสนเทศ";
$student_name = "นายธนพนธ์ เกษเกสร"; 
$introduction = "สวัสดีครับ ผมมีความสนใจในการเขียนโปรแกรมและพัฒนาเว็บไซต์ (Web Development) และกำลังฝึกฝนพื้นฐานด้าน Logic ผ่านการเขียน Loop ในภาษา PHP ครับ";
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การบ้าน PHP: Profile & Loops</title>
    <style>
        /* จัดรูปแบบให้สวยงาม */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            color: #333;
            margin: 0;
            padding: 30px;
        }
        .container {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }
        h1, h2 {
            color: #0284c7;
            border-bottom: 2px solid #e0f2fe;
            padding-bottom: 10px;
            margin-top: 40px;
        }
        
        /* สไตล์ของการ์ดโปรไฟล์ */
        .profile-card {
            background: #f0f9ff;
            padding: 20px 25px;
            border-radius: 8px;
            border-left: 5px solid #0ea5e9;
            margin-bottom: 30px;
        }
        .profile-card p { margin: 8px 0; font-size: 16px; }
        .profile-card span { font-weight: bold; color: #0369a1; display: inline-block; width: 120px; }

        /* สไตล์ของบล็อก Loop */
        .pattern-section {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
        }
        .pattern-title {
            font-size: 1.1em;
            font-weight: bold;
            color: #334155;
            margin-bottom: 15px;
        }
        .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }
        .loop-box {
            background: #1e293b;
            color: #10b981;
            padding: 15px;
            border-radius: 8px;
        }
        .loop-box h3 {
            color: #cbd5e1;
            font-size: 14px;
            margin: 0 0 10px 0;
            padding-bottom: 8px;
            border-bottom: 1px solid #334155;
        }
        pre {
            font-family: 'Courier New', monospace;
            font-size: 16px;
            margin: 0;
            line-height: 1.2;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>📝 ส่วนที่ 1: ข้อมูลแนะนำตัว</h1>
    <div class="profile-card">
        <p><span>มหาวิทยาลัย:</span> <?php echo $university; ?></p>
        <p><span>คณะ:</span> <?php echo $faculty; ?></p>
        <p><span>สาขา:</span> <?php echo $major; ?></p>
        <p><span>ชื่อ-นามสกุล:</span> <?php echo $student_name; ?></p>
        <p><span>แนะนำตัว:</span> <?php echo $introduction; ?></p>
    </div>

    <h1>🔄 ส่วนที่ 2: สร้างรูปด้วย Loops</h1>

    <div class="pattern-section">
        <div class="pattern-title">รูปแบบที่ 1: สามเหลี่ยมชิดขวา (4 แถว)</div>
        <div class="grid-3">
            <div class="loop-box">
                <h3>📌 Loop For</h3>
                <pre><?php
                    for($i=1; $i<=4; $i++) {
                        for($s=1; $s<=4-$i; $s++) echo " ";
                        for($j=1; $j<=$i; $j++) echo "*";
                        echo "\n";
                    }
                ?></pre>
            </div>
            <div class="loop-box">
                <h3>📌 Loop While</h3>
                <pre><?php
                    $i=1;
                    while($i<=4) {
                        $s=1; while($s<=4-$i) { echo " "; $s++; }
                        $j=1; while($j<=$i) { echo "*"; $j++; }
                        echo "\n"; $i++;
                    }
                ?></pre>
            </div>
            <div class="loop-box">
                <h3>📌 Loop Do-While</h3>
                <pre><?php
                    $i=1;
                    do {
                        $s=1; if(4-$i>=1) { do { echo " "; $s++; } while($s<=4-$i); }
                        $j=1; do { echo "*"; $j++; } while($j<=$i);
                        echo "\n"; $i++;
                    } while($i<=4);
                ?></pre>
            </div>
        </div>
    </div>

    <div class="pattern-section">
        <div class="pattern-title">รูปแบบที่ 2: ตารางตัวเลข 3 แถว 4 คอลัมน์</div>
        <div class="grid-3">
            <div class="loop-box">
                <h3>📌 Loop For</h3>
                <pre><?php
                    for($i=1; $i<=3; $i++) {
                        for($j=1; $j<=4; $j++) echo $i . " ";
                        echo "\n";
                    }
                ?></pre>
            </div>
            <div class="loop-box">
                <h3>📌 Loop While</h3>
                <pre><?php
                    $i=1;
                    while($i<=3) {
                        $j=1; while($j<=4) { echo $i . " "; $j++; }
                        echo "\n"; $i++;
                    }
                ?></pre>
            </div>
            <div class="loop-box">
                <h3>📌 Loop Do-While</h3>
                <pre><?php
                    $i=1;
                    do {
                        $j=1; do { echo $i . " "; $j++; } while($j<=4);
                        echo "\n"; $i++;
                    } while($i<=3);
                ?></pre>
            </div>
        </div>
    </div>

    <div class="pattern-section">
        <div class="pattern-title">รูปแบบที่ 3: สามเหลี่ยมตัวเลขชิดซ้าย</div>
        <div class="grid-3">
            <div class="loop-box">
                <h3>📌 Loop For</h3>
                <pre><?php
                    for($i=1; $i<=3; $i++) {
                        for($j=1; $j<=$i; $j++) echo $i . " ";
                        echo "\n";
                    }
                ?></pre>
            </div>
            <div class="loop-box">
                <h3>📌 Loop While</h3>
                <pre><?php
                    $i=1;
                    while($i<=3) {
                        $j=1; while($j<=$i) { echo $i . " "; $j++; }
                        echo "\n"; $i++;
                    }
                ?></pre>
            </div>
            <div class="loop-box">
                <h3>📌 Loop Do-While</h3>
                <pre><?php
                    $i=1;
                    do {
                        $j=1; do { echo $i . " "; $j++; } while($j<=$i);
                        echo "\n"; $i++;
                    } while($i<=3);
                ?></pre>
            </div>
        </div>
    </div>

    <div class="pattern-section">
        <div class="pattern-title">รูปแบบที่ 4: กล่องกรอบดาวข้างในเป็นตัวเลข</div>
        <div class="grid-3">
            <div class="loop-box">
                <h3>📌 Loop For</h3>
                <pre><?php
                    for($i=0; $i<=4; $i++) {
                        for($j=1; $j<=6; $j++) {
                            if($i==0 || $i==4 || $j==1 || $j==6) echo "* ";
                            else echo $i . " ";
                        }
                        echo "\n";
                    }
                ?></pre>
            </div>
            <div class="loop-box">
                <h3>📌 Loop While</h3>
                <pre><?php
                    $i=0;
                    while($i<=4) {
                        $j=1;
                        while($j<=6) {
                            if($i==0 || $i==4 || $j==1 || $j==6) echo "* ";
                            else echo $i . " ";
                            $j++;
                        }
                        echo "\n"; $i++;
                    }
                ?></pre>
            </div>
            <div class="loop-box">
                <h3>📌 Loop Do-While</h3>
                <pre><?php
                    $i=0;
                    do {
                        $j=1;
                        do {
                            if($i==0 || $i==4 || $j==1 || $j==6) echo "* ";
                            else echo $i . " ";
                            $j++;
                        } while($j<=6);
                        echo "\n"; $i++;
                    } while($i<=4);
                ?></pre>
            </div>
        </div>
    </div>

    <div class="pattern-section">
        <div class="pattern-title">รูปแบบที่ 5: สามเหลี่ยมตัวเลขกลับหัว</div>
        <div class="grid-3">
            <div class="loop-box">
                <h3>📌 Loop For</h3>
                <pre><?php
                    for($i=3; $i>=1; $i--) {
                        for($j=1; $j<=$i; $j++) echo $i . " ";
                        echo "\n";
                    }
                ?></pre>
            </div>
            <div class="loop-box">
                <h3>📌 Loop While</h3>
                <pre><?php
                    $i=3;
                    while($i>=1) {
                        $j=1; while($j<=$i) { echo $i . " "; $j++; }
                        echo "\n"; $i--;
                    }
                ?></pre>
            </div>
            <div class="loop-box">
                <h3>📌 Loop Do-While</h3>
                <pre><?php
                    $i=3;
                    do {
                        $j=1; do { echo $i . " "; $j++; } while($j<=$i);
                        echo "\n"; $i--;
                    } while($i>=1);
                ?></pre>
            </div>
        </div>
    </div>

</div>

</body>
</html>