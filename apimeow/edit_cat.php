<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Kanit', sans-serif; background-color: #f4f7f6; }</style>
</head>
<body>
<?php
$conn = mysqli_connect("localhost", "it67040233137", "D1G2W8A3", "it67040233137");
$id = (int)$_GET['id'];

if(isset($_POST['submit'])){
    $th = $_POST['name_th']; $en = $_POST['name_en']; $desc = $_POST['description'];
    $char = $_POST['characteristics']; $care = $_POST['care_instructions']; 
    $img = $_POST['image_url']; $vis = $_POST['is_visible'];
    
    $sql = "UPDATE CatBreeds SET name_th='$th', name_en='$en', description='$desc', 
            characteristics='$char', care_instructions='$care', image_url='$img', is_visible='$vis' WHERE id=$id";
    mysqli_query($conn, $sql);
    echo "<script>alert('อัปเดตข้อมูลสำเร็จ!'); window.location='admin.php';</script>";
}

$result = mysqli_query($conn, "SELECT * FROM CatBreeds WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>
<div class="container mt-5 pb-5" style="max-width: 700px;">
    <div class="card p-5 shadow-lg border-0 rounded-4">
        <h3 class="mb-4 text-center fw-bold text-warning">แก้ไขข้อมูลสายพันธุ์</h3>
        <form method="POST">
            <label class="fw-bold mb-1">ชื่อภาษาไทย</label>
            <input type="text" name="name_th" class="form-control mb-3 p-3 rounded-3" value="<?php echo $row['name_th']; ?>" required>
            <label class="fw-bold mb-1">ชื่อภาษาอังกฤษ</label>
            <input type="text" name="name_en" class="form-control mb-3 p-3 rounded-3" value="<?php echo $row['name_en']; ?>" required>
            <label class="fw-bold mb-1">คำอธิบาย</label>
            <textarea name="description" class="form-control mb-3 p-3 rounded-3" rows="3" required><?php echo $row['description']; ?></textarea>
            <label class="fw-bold mb-1">ลักษณะทั่วไป</label>
            <textarea name="characteristics" class="form-control mb-3 p-3 rounded-3" rows="3"><?php echo $row['characteristics']; ?></textarea>
            <label class="fw-bold mb-1">คำแนะนำการเลี้ยงดู</label>
            <textarea name="care_instructions" class="form-control mb-3 p-3 rounded-3" rows="3"><?php echo $row['care_instructions']; ?></textarea>
            <label class="fw-bold mb-1">URL รูปภาพ</label>
            <input type="text" name="image_url" class="form-control mb-3 p-3 rounded-3" value="<?php echo $row['image_url']; ?>">
            <label class="fw-bold mb-1">สถานะการแสดงผล</label>
            <select name="is_visible" class="form-select mb-4 p-3 rounded-3">
                <option value="1" <?php if($row['is_visible'] == 1) echo 'selected'; ?>>แสดงผลหน้าเว็บ</option>
                <option value="0" <?php if($row['is_visible'] == 0) echo 'selected'; ?>>ซ่อนไว้</option>
            </select>
            <button type="submit" name="submit" class="btn btn-warning w-100 p-3 fw-bold rounded-pill fs-5 text-dark">อัปเดตข้อมูล</button>
            <a href="admin.php" class="btn btn-outline-secondary w-100 mt-3 p-2 rounded-pill fw-bold">ยกเลิก</a>
        </form>
    </div>
</div>
</body>
</html>