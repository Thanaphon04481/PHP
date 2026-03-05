<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Cat Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Kanit', sans-serif; background-color: #f4f7f6; }
        .navbar-brand { font-weight: 700; letter-spacing: 1px; }
        .dashboard-container { margin-top: -50px; }
        .card-custom { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .table-hover tbody tr:hover { background-color: #f8f9fa; transform: scale(1.01); transition: 0.2s; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border-radius: 10px; }
        .cat-avatar { width: 60px; height: 60px; object-fit: cover; border-radius: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .action-btn { border-radius: 10px; padding: 6px 15px; font-weight: 500; }
        .bg-header { background: linear-gradient(135deg, #2b5876 0%, #4e4376 100%); padding-bottom: 100px; }
    </style>
</head>
<body>

<?php
$conn = mysqli_connect("localhost", "it67040233137", "D1G2W8A3", "it67040233137");
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM CatBreeds WHERE id=$id");
    echo "<script>alert('ลบข้อมูลสำเร็จ!'); window.location='admin.php';</script>";
}
?>

<div class="bg-header pt-4 pb-5">
    <div class="container text-white">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold"><i class="fa-solid fa-user-shield me-2"></i> ระบบจัดการหลังบ้าน</h2>
            <a href="index.php" class="btn btn-outline-light rounded-pill"><i class="fa-solid fa-eye me-2"></i>ดูหน้าเว็บไซต์</a>
        </div>
    </div>
</div>

<div class="container dashboard-container pb-5">
    <div class="card card-custom p-4 bg-white">
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
            <h4 class="text-secondary fw-bold mb-0"><i class="fa-solid fa-list me-2"></i> รายการสายพันธุ์แมวทั้งหมด</h4>
            <a href="add_cat.php" class="btn btn-success rounded-pill shadow-sm fw-bold px-4">
                <i class="fa-solid fa-plus me-2"></i>เพิ่มสายพันธุ์ใหม่
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-borderless table-hover align-middle">
                <thead class="bg-light text-secondary rounded-top">
                    <tr>
                        <th class="ps-3 rounded-start">รูปภาพ</th>
                        <th>ข้อมูลสายพันธุ์</th>
                        <th>สถานะการแสดงผล</th>
                        <th class="text-end pe-4 rounded-end">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM CatBreeds ORDER BY id DESC");
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr class="border-bottom">
                        <td class="ps-3 pt-3 pb-3">
                            <img src="<?php echo $row['image_url']; ?>" class="cat-avatar" alt="Cat">
                        </td>
                        <td>
                            <h6 class="mb-0 fw-bold text-dark"><?php echo $row['name_th']; ?></h6>
                            <small class="text-muted"><i class="fa-solid fa-earth-americas me-1"></i><?php echo $row['name_en']; ?></small>
                        </td>
                        <td>
                            <?php if($row['is_visible'] == 1): ?>
                                <span class="badge bg-success rounded-pill px-3 py-2"><i class="fa-solid fa-check-circle me-1"></i> ออนไลน์</span>
                            <?php else: ?>
                                <span class="badge bg-secondary rounded-pill px-3 py-2"><i class="fa-solid fa-eye-slash me-1"></i> ซ่อนไว้</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-end pe-4">
                            <a href="edit_cat.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm action-btn text-dark me-2">
                                <i class="fa-solid fa-pen-to-square me-1"></i> แก้ไข
                            </a>
                            <a href="admin.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm action-btn" onclick="return confirm('ยืนยันการลบข้อมูลนี้ใช่หรือไม่?');">
                                <i class="fa-solid fa-trash me-1"></i> ลบ
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>