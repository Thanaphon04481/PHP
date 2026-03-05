<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10 สายพันธุ์แมวยอดนิยม 🐈✨</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Kanit', sans-serif; 
            background-color: #f0f2f5; 
            overflow-x: hidden;
        }
        /* Hero Section สุดอลังการ */
        .hero-section { 
            position: relative;
            background: url('https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover fixed; 
            color: white; 
            padding: 120px 0 80px 0; 
            text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
        }
        .hero-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, rgba(102,126,234,0.8) 0%, rgba(118,75,162,0.8) 100%);
            z-index: 1;
        }
        .hero-content { position: relative; z-index: 2; }
        
        /* สไตล์ช่องค้นหาแบบเรืองแสง */
        .search-box {
            border-radius: 50px;
            padding: 15px 30px;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }
        .search-box:focus { box-shadow: 0 0 20px rgba(255,255,255,0.8); outline: none; }
        .search-btn {
            border-radius: 50px;
            padding: 15px 40px;
            font-weight: bold;
            letter-spacing: 1px;
            transition: transform 0.3s;
        }
        .search-btn:hover { transform: scale(1.05); }

        /* การ์ดแบบ Glassmorphism & 3D Hover */
        .cat-card { 
            border: none; 
            border-radius: 20px; 
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .cat-card:hover { 
            transform: translateY(-15px) scale(1.02); 
            box-shadow: 0 20px 40px rgba(0,0,0,0.15); 
        }
        .card-img-top {
            height: 280px; 
            object-fit: cover; 
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            transition: transform 0.5s;
        }
        .cat-card:hover .card-img-top { transform: scale(1.05); }
        .img-wrapper { overflow: hidden; border-radius: 20px 20px 0 0; }
        
        /* ตกแต่ง Modal */
        .modal-content { border-radius: 25px; border: none; box-shadow: 0 25px 50px rgba(0,0,0,0.3); }
        .modal-header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 25px 25px 0 0; border: none;}
        .btn-close { filter: invert(1); }
    </style>
</head>
<body>

<div class="hero-section text-center mb-5">
    <div class="hero-overlay"></div>
    <div class="container hero-content" data-aos="zoom-in" data-aos-duration="1000">
        <h1 class="display-3 fw-bold mb-3"><i class="fa-solid fa-cat"></i> สายพันธุ์แมวยอดนิยม</h1>
        <p class="lead fs-4 mb-5">ค้นพบความน่ารักและเอกลักษณ์ของเจ้าเหมียวที่คุณชื่นชอบ</p>
        <form method="POST" class="d-flex justify-content-center">
            <input type="text" name="search" class="form-control search-box w-50 me-3 fs-5" placeholder="🔍 พิมพ์ชื่อสายพันธุ์แมวที่นี่...">
            <button type="submit" class="btn btn-warning search-btn fs-5"><i class="fa-solid fa-magnifying-glass"></i> ค้นหาเลย</button>
        </form>
    </div>
</div>

<div class="container pb-5">
    <div class="row g-4">
        <?php
        $conn = mysqli_connect("localhost", "it67040233137", "D1G2W8A3", "it67040233137");
        $search = isset($_POST['search']) ? $_POST['search'] : '';
        $query = "SELECT * FROM CatBreeds WHERE is_visible = 1 AND (name_th LIKE '%$search%' OR name_en LIKE '%$search%') ORDER BY id ASC";
        $result = mysqli_query($conn, $query);
        $delay = 100;

        while($cat = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
            <div class="card h-100 cat-card">
                <div class="img-wrapper">
                    <img src="<?php echo $cat['image_url']; ?>" class="card-img-top" alt="แมว">
                </div>
                <div class="card-body p-4 text-center">
                    <h4 class="card-title fw-bold text-primary mb-1"><?php echo $cat['name_th']; ?></h4>
                    <h6 class="card-subtitle mb-3 text-muted fst-italic"><?php echo $cat['name_en']; ?></h6>
                    <p class="card-text text-muted mb-4" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                        <?php echo $cat['description']; ?>
                    </p>
                    <button class="btn btn-outline-primary rounded-pill px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#modal<?php echo $cat['id']; ?>">
                        <i class="fa-solid fa-book-open me-2"></i>อ่านเพิ่มเติม
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal<?php echo $cat['id']; ?>" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header p-4">
                        <h4 class="modal-title fw-bold"><i class="fa-solid fa-paw me-2"></i><?php echo $cat['name_th']; ?> (<?php echo $cat['name_en']; ?>)</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4">
                        <img src="<?php echo $cat['image_url']; ?>" class="img-fluid rounded-4 mb-4 shadow-sm w-100" style="max-height: 400px; object-fit: cover;">
                        <h5 class="text-primary fw-bold"><i class="fa-solid fa-circle-info me-2"></i>รายละเอียด</h5>
                        <p class="mb-4 text-secondary"><?php echo $cat['description']; ?></p>
                        
                        <h5 class="text-success fw-bold"><i class="fa-solid fa-heart me-2"></i>ลักษณะทั่วไปและพฤติกรรม</h5>
                        <p class="mb-4 text-secondary"><?php echo $cat['characteristics']; ?></p>
                        
                        <div class="alert alert-warning border-0 shadow-sm rounded-4 p-4">
                            <h5 class="alert-heading fw-bold"><i class="fa-solid fa-hand-holding-heart me-2"></i>คำแนะนำการเลี้ยงดู</h5>
                            <hr>
                            <p class="mb-0 text-dark"><?php echo $cat['care_instructions']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $delay += 100; } ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ once: true }); // เรียกใช้ Animation
</script>
</body>
</html>