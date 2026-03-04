<?php
// ==========================================
// 1. ตั้งค่าและเชื่อมต่อฐานข้อมูลด้วย PDO
// ==========================================
$host = "localhost";
$dbname = "it67040233137"; // ชื่อฐานข้อมูลที่เราสร้างไว้
$username = "it67040233137";   // XAMPP ปกติใช้ root
$password = "D1G2W8A3";       // XAMPP ปกติรหัสผ่านว่างเปล่า

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // เปิดโหมดแจ้งเตือน Error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $e->getMessage());
}

// ==========================================
// 2. จัดการคำสั่ง เพิ่ม, แก้ไข, ลบ (CRUD Logic)
// ==========================================
$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ---- กรณีเพิ่มข้อมูล (Create) ----
    if ($action == 'add') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        
        $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $stmt->execute(['name' => $name, 'email' => $email]);
        
        // ส่งกลับมาหน้าเดิมอัตโนมัติ (แก้ Not Found)
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } 
    // ---- กรณีแก้ไขข้อมูล (Update) ----
    elseif ($action == 'update') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        
        $stmt = $conn->prepare("UPDATE users SET name=:name, email=:email WHERE id=:id");
        $stmt->execute(['name' => $name, 'email' => $email, 'id' => $id]);
        
        // ส่งกลับมาหน้าเดิมอัตโนมัติ (แก้ Not Found)
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// ---- กรณีลบข้อมูล (Delete) ----
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM users WHERE id=:id");
    $stmt->execute(['id' => $id]);
    
    // ส่งกลับมาหน้าเดิมอัตโนมัติ (แก้ Not Found)
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// ==========================================
// 3. ดึงข้อมูลทั้งหมดมาแสดงในตาราง (Read)
// ==========================================
$stmt = $conn->query("SELECT * FROM users ORDER BY id DESC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ==========================================
// 4. ดึงข้อมูลผู้ใช้เฉพาะคน กรณีที่กดปุ่ม "แก้ไข"
// ==========================================
$edit_user = null;
if (isset($_GET['edit'])) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id' => $_GET['edit']]);
    $edit_user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 07: CRUD ด้วย PDO</title>
    <style>
        /* ตกแต่ง UI ให้ดูสะอาดตาและใช้งานง่าย */
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f3f4f6; color: #333; padding: 20px; }
        .container { max-width: 900px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h2 { color: #2563eb; text-align: center; margin-bottom: 20px; }
        
        /* ฟอร์มกรอกข้อมูล */
        .form-box { background: #eff6ff; padding: 20px; border-radius: 8px; margin-bottom: 30px; border: 1px solid #bfdbfe; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input[type="text"], input[type="email"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        
        /* ปุ่มต่างๆ */
        button { padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; color: white; }
        .btn-submit { background-color: #10b981; }
        .btn-submit:hover { background-color: #059669; }
        .btn-edit { background-color: #f59e0b; padding: 6px 12px; text-decoration: none; border-radius: 4px; color: white; }
        .btn-delete { background-color: #ef4444; padding: 6px 12px; text-decoration: none; border-radius: 4px; color: white; }
        .btn-cancel { background-color: #6b7280; padding: 10px 20px; text-decoration: none; border-radius: 5px; color: white; display: inline-block;}
        
        /* ตารางแสดงข้อมูล */
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #e5e7eb; }
        th { background-color: #2563eb; color: white; }
        tr:hover { background-color: #f9fafb; }
        .empty-row { text-align: center; color: #6b7280; font-style: italic; }
    </style>
</head>
<body>

<div class="container">
    <h2>🛠️ ระบบจัดการผู้ใช้งาน (PDO CRUD)</h2>

    <div class="form-box">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?action=<?php echo $edit_user ? 'update' : 'add'; ?>">
            
            <?php if($edit_user): ?>
                <input type="hidden" name="id" value="<?php echo $edit_user['id']; ?>">
                <h3 style="margin-top:0; color:#b45309;">✏️ แก้ไขข้อมูลผู้ใช้: <?php echo $edit_user['name']; ?></h3>
            <?php else: ?>
                <h3 style="margin-top:0; color:#1d4ed8;">➕ เพิ่มผู้ใช้งานใหม่</h3>
            <?php endif; ?>

            <div class="form-group">
                <label>ชื่อ - นามสกุล:</label>
                <input type="text" name="name" required placeholder="กรอกชื่อ-นามสกุล" 
                       value="<?php echo $edit_user ? htmlspecialchars($edit_user['name']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label>อีเมล:</label>
                <input type="email" name="email" required placeholder="กรอกอีเมล" 
                       value="<?php echo $edit_user ? htmlspecialchars($edit_user['email']) : ''; ?>">
            </div>
            
            <button type="submit" class="btn-submit">
                <?php echo $edit_user ? '💾 บันทึกการแก้ไข' : '✅ บันทึกข้อมูล'; ?>
            </button>
            
            <?php if($edit_user): ?>
                <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="btn-cancel">❌ ยกเลิก</a>
            <?php endif; ?>
        </form>
    </div>

    <h3>📋 รายชื่อผู้ใช้งานทั้งหมด</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ชื่อ-นามสกุล</th>
                <th>อีเมล</th>
                <th style="width: 150px; text-align:center;">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($users) > 0): ?>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td style="text-align:center;">
                            <a href="?edit=<?php echo $user['id']; ?>" class="btn-edit">แก้ไข</a>
                            <a href="?delete=<?php echo $user['id']; ?>" class="btn-delete" 
                               onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลของ <?php echo $user['name']; ?>?');">ลบ</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="empty-row">ยังไม่มีข้อมูลในระบบ</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>