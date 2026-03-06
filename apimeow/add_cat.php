<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มสายพันธุ์ใหม่</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Kanit', sans-serif; background-color: #f4f7f6; }</style>
</head>
<body>
<?php
$conn = mysqli_connect("localhost", "it67040233137", "D1G2W8A3", "it67040233137");
if(isset($_POST['submit'])){
    $th = $_POST['name_th']; $en = $_POST['name_en']; $desc = $_POST['description'];
    $char = $_POST['characteristics']; $care = $_POST['care_instructions']; 
    $img = $_POST['image_url']; $vis = $_POST['is_visible'];
    
    $sql = "INSERT INTO CatBreeds (name_th, name_en, description, characteristics, care_instructions, image_url, is_visible) 
            VALUES ('$th', '$en', '$desc', '$char', '$care', '$img', '$vis')";
    mysqli_query($conn, $sql);
    echo "<script>alert('เพิ่มข้อมูลสำเร็จ!'); window.location='admin.php';</script>";
}
?>
<div class="container mt-5 pb-5" style="max-width: 700px;">
    <div class="card p-5 shadow-lg border-0 rounded-4">
        <h3 class="mb-4 text-center fw-bold text-success">เพิ่มข้อมูลสายพันธุ์แมวใหม่</h3>
        <form method="POST">
            <input type="text" name="name_th" class="form-control mb-3 p-3 rounded-3" placeholder="ชื่อภาษาไทย" required>
            <input type="text" name="name_en" class="form-control mb-3 p-3 rounded-3" placeholder="ชื่อภาษาอังกฤษ" required>
            <textarea name="description" class="form-control mb-3 p-3 rounded-3" placeholder="คำอธิบายเบื้องต้น" rows="3" required></textarea>
            <textarea name="characteristics" class="form-control mb-3 p-3 rounded-3" placeholder="ลักษณะทั่วไปและนิสัย" rows="3"></textarea>
            <textarea name="care_instructions" class="form-control mb-3 p-3 rounded-3" placeholder="คำแนะนำการเลี้ยงดู" rows="3"></textarea>
            <input type="text" name="image_url" class="form-control mb-3 p-3 rounded-3" placeholder="URL รูปภาพ (ลิงก์รูปจากอินเทอร์เน็ต)">
            <select name="is_visible" class="form-select mb-4 p-3 rounded-3">
                <option value="1">แสดงผลหน้าเว็บ</option>
                <option value="0">ซ่อนไว้ก่อน</option>
            </select>
            <button type="submit" name="submit" class="btn btn-success w-100 p-3 fw-bold rounded-pill fs-5">บันทึกข้อมูล</button>
            <a href="admin.php" class="btn btn-outline-secondary w-100 mt-3 p-2 rounded-pill fw-bold">กลับไปหน้าแอดมิน</a>
        </form>
    </div>
</div>
</body>
</html>