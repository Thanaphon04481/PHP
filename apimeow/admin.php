<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ระบบจัดการหลังบ้าน (Admin)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Kanit', sans-serif; background-color: #f4f7f6; }</style>
</head>
<body>

<?php
$conn = mysqli_connect("localhost", "it67040233137", "D1G2W8A3", "it67040233137");
if(isset($_GET['delete'])){
    $id = (int)$_GET['delete'];
    mysqli_query($conn, "DELETE FROM CatBreeds WHERE id=$id");
    echo "<script>alert('ลบข้อมูลสำเร็จ!'); window.location='admin.php';</script>";
}
?>

<div class="container mt-5 pb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">🐈 ระบบจัดการสายพันธุ์แมว</h2>
        <div>
            <a href="index.php" class="btn btn-outline-primary me-2">ดูหน้าเว็บไซต์</a>
            <a href="add_cat.php" class="btn btn-success fw-bold">+ เพิ่มสายพันธุ์ใหม่</a>
        </div>
    </div>

    <div class="card p-4 shadow-sm border-0 rounded-4 bg-white">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>รูปภาพ</th>
                    <th>ชื่อสายพันธุ์</th>
                    <th>สถานะ</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM CatBreeds ORDER BY id DESC");
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><img src="<?php echo $row['image_url']; ?>" width="70" height="70" style="object-fit:cover; border-radius:15px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);"></td>
                    <td><h5 class="mb-0 text-dark fw-bold"><?php echo $row['name_th']; ?></h5><small class="text-muted"><?php echo $row['name_en']; ?></small></td>
                    <td><?php echo $row['is_visible'] == 1 ? '<span class="badge bg-success rounded-pill px-3 py-2">ออนไลน์</span>' : '<span class="badge bg-secondary rounded-pill px-3 py-2">ซ่อนไว้</span>'; ?></td>
                    <td>
                        <a href="edit_cat.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning text-dark fw-bold px-3">แก้ไข</a>
                        <a href="admin.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger fw-bold px-3" onclick="return confirm('ยืนยันการลบใช่หรือไม่?');">ลบ</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>