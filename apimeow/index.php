<?php
// 1. เชื่อมต่อฐานข้อมูลที่ต้นไฟล์เลย
$conn = mysqli_connect("localhost", "it67040233137", "D1G2W8A3", "it67040233137");
mysqli_set_charset($conn, "utf8mb4");

// 2. จัดการเรื่องการค้นหา
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$query = "SELECT * FROM CatBreeds WHERE is_visible = 1";
if ($search !== '') {
    $query .= " AND (name_th LIKE '%$search%' OR name_en LIKE '%$search%')";
}
$query .= " ORDER BY id ASC LIMIT 10"; // ดึงมา 10 อย่างตามที่ต้องการ
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10 สายพันธุ์แมวยอดนิยม 🐈✨</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { 
            font-family: 'Kanit', sans-serif; 
            background: #f8f9fa;
            min-height: 100vh;
        }
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
            margin-bottom: 50px;
            border-radius: 0 0 50px 50px;
        }
        .cat-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: transform 0.3s;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }
        .cat-card:hover { transform: translateY(-10px); }
        .card-img-top { height: 250px; object-fit: cover; }
        .btn-admin { position: fixed; bottom: 20px; right: 20px; z-index: 1000; }
    </style>
</head>
<body>

<a href="admin.php" class="btn btn-dark btn-lg rounded-pill btn-admin shadow-lg">
    <i class="fa-solid fa-user-shield"></i> ระบบ Admin
</a>

<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3"><i class="fa-solid fa-cat"></i> 10 สายพันธุ์แมวยอดนิยม</h1>
        <p class="lead mb-4">รวบรวมข้อมูลแมวที่น่ารักที่สุดไว้ที่นี่</p>
        
        <form method="GET" class="d-flex justify-content-center">
            <input type="text" name="search" class="form-control w-50 rounded-pill px-4" 
                   placeholder="ค้นหาชื่อแมว..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-warning rounded-pill ms-2 px-4 fw-bold">ค้นหา</button>
        </form>
    </div>
</div>

<div class="container pb-5">
    <div class="row g-4">
        <?php 
        if(mysqli_num_rows($result) > 0) {
            while($cat = mysqli_fetch_assoc($result)) { 
        ?>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 cat-card">
                    <img src="<?php echo $cat['image_url']; ?>" class="card-img-top" alt="รูปแมว">
                    <div class="card-body text-center">
                        <h3 class="fw-bold text-dark"><?php echo $cat['name_th']; ?></h3>
                        <h5 class="text-primary"><?php echo $cat['name_en']; ?></h5>
                        <p class="text-muted mt-3"><?php echo mb_substr($cat['description'], 0, 100).'...'; ?></p>
                        <button class="btn btn-outline-primary rounded-pill mt-2" 
                                onclick="showDetail(<?php echo htmlspecialchars(json_encode($cat)); ?>)">
                            ดูรายละเอียด
                        </button>
                    </div>
                </div>
            </div>
        <?php 
            }
        } else {
            echo "<div class='col-12 text-center'><h3>ไม่พบข้อมูลน้องแมว 😿</h3></div>";
        }
        ?>
    </div>
</div>

<div class="modal fade" id="catModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4">
            <div class="modal-header bg-primary text-white border-0 py-4">
                <h4 class="modal-title fw-bold" id="mName"></h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <img id="mImg" src="" class="img-fluid rounded-4 mb-4 w-100 shadow-sm" style="max-height: 400px; object-fit: cover;">
                <h5 class="fw-bold text-primary"><i class="fa-solid fa-info-circle me-2"></i>รายละเอียด</h5>
                <p id="mDesc" class="fs-5 text-secondary mb-4"></p>
                
                <h5 class="fw-bold text-success"><i class="fa-solid fa-paw me-2"></i>นิสัยทั่วไป</h5>
                <p id="mChar" class="fs-5 text-secondary mb-4"></p>
                
                <div class="p-3 bg-light rounded-3">
                    <h5 class="fw-bold text-warning-emphasis"><i class="fa-solid fa-heart-pulse me-2"></i>การเลี้ยงดู</h5>
                    <p id="mCare" class="mb-0 text-secondary"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const modal = new bootstrap.Modal(document.getElementById('catModal'));
    
    function showDetail(cat) {
        document.getElementById('mName').innerText = cat.name_th + " (" + cat.name_en + ")";
        document.getElementById('mImg').src = cat.image_url;
        document.getElementById('mDesc').innerText = cat.description;
        document.getElementById('mChar').innerText = cat.characteristics;
        document.getElementById('mCare').innerText = cat.care_instructions;
        modal.show();
    }
</script>
</body>
</html>