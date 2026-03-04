    <!DOCTYPE html>
    <html lang="th">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise Product Dashboard</title>

    <style>
    /* กำหนดตัวแปรสีใหม่ โทน Emerald สบายตา */
    :root {
    --primary: #10b981; 
    --primary-hover: #059669;
    --bg-color-1: #d1fae5;
    --bg-color-2: #6ee7b7;
    --card: rgba(255, 255, 255, 0.7);
    --text: #1f2937;
    --danger: #ef4444;
    --danger-hover: #dc2626;
    --glass-border: rgba(255, 255, 255, 0.5);
    }

    /* โหมดกลางคืน (Dark Mode) */
    .dark {
    --primary: #34d399;
    --primary-hover: #10b981;
    --bg-color-1: #0f172a;
    --bg-color-2: #064e3b;
    --card: rgba(30, 41, 59, 0.7);
    --text: #f8fafc;
    --glass-border: rgba(255, 255, 255, 0.1);
    }

    * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }

    body {
    margin: 0;
    background: linear-gradient(135deg, var(--bg-color-1), var(--bg-color-2));
    background-size: 400% 400%;
    animation: bgmove 15s ease infinite;
    color: var(--text);
    transition: background 0.5s ease, color 0.5s ease;
    }

    @keyframes bgmove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
    }

    .app {
    display: flex;
    min-height: 100vh;
    }

    .sidebar {
    width: 240px;
    backdrop-filter: blur(20px);
    background: rgba(0, 0, 0, 0.15);
    border-right: 1px solid var(--glass-border);
    color: var(--text);
    padding: 25px 20px;
    transition: 0.3s;
    }

    .sidebar h2 { margin-top: 0; margin-bottom: 25px; font-weight: 800; }

    .sidebar button {
    width: 100%;
    margin-bottom: 12px;
    background: var(--card);
    color: var(--text);
    border: 1px solid var(--glass-border);
    padding: 12px;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.2s ease;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    }

    .sidebar button:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .main {
    flex: 1;
    padding: 30px;
    overflow-y: auto;
    }

    .glass {
    backdrop-filter: blur(20px);
    background: var(--card);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 25px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    margin-bottom: 20px;
    transition: 0.3s;
    }

    .topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
    border-bottom: 2px solid var(--glass-border);
    padding-bottom: 15px;
    margin-bottom: 20px;
    }

    .topbar h2 { margin: 0; }

    input {
    padding: 10px 15px;
    border-radius: 10px;
    border: 1px solid rgba(0,0,0,0.1);
    outline: none;
    background: rgba(255,255,255,0.8);
    color: #111;
    transition: 0.2s;
    }
    input:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2); }

    .dark input { background: rgba(15, 23, 42, 0.8); color: #fff; border-color: rgba(255,255,255,0.2); }

    button {
    padding: 10px 18px;
    border: none;
    border-radius: 10px;
    background: var(--primary);
    color: white;
    cursor: pointer;
    font-weight: bold;
    transition: 0.2s;
    }

    button:hover { background: var(--primary-hover); transform: translateY(-1px); }

    .delete-btn { background: var(--danger); }
    .delete-btn:hover { background: var(--danger-hover); }

    table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin-top: 15px;
    }
    th, td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid var(--glass-border);
    }
    th {
    cursor: pointer;
    background: var(--primary);
    color: white;
    transition: 0.2s;
    }
    th:first-child { border-top-left-radius: 10px; }
    th:last-child { border-top-right-radius: 10px; }
    th:hover { background: var(--primary-hover); }

    tr { transition: 0.2s; }
    tr:hover td { background: rgba(255, 255, 255, 0.3); }
    .dark tr:hover td { background: rgba(255, 255, 255, 0.05); }

    .cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 25px;
    }

    .kpi {
    padding: 25px;
    border-radius: 20px;
    background: var(--card);
    backdrop-filter: blur(15px);
    border: 1px solid var(--glass-border);
    box-shadow: 0 8px 25px rgba(0,0,0,0.05);
    font-size: 1.1em;
    transition: transform 0.2s;
    }
    .kpi:hover { transform: translateY(-5px); }
    .kpi b { display: block; font-size: 1.8em; margin-top: 10px; color: var(--primary); }

    .pagination {
    text-align: center;
    margin-top: 20px;
    }
    .pagination button {
    margin: 0 4px;
    background: #94a3b8;
    border-radius: 8px;
    padding: 8px 14px;
    }
    .pagination button:hover { background: var(--primary); }

    .toast {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: var(--primary);
    color: white;
    padding: 15px 25px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    opacity: 0;
    transform: translateY(20px);
    transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    font-weight: bold;
    }

    .toast.show {
    opacity: 1;
    transform: translateY(0);
    }
    </style>
    </head>

    <body>

    <div class="app">

    <div class="sidebar">
    <h2>🚀 Admin</h2>
    <button onclick="toggleDark()">🌓 Dark Mode</button>
    <button onclick="loadProducts()">🔄 Refresh</button>
    </div>

    <div class="main">

    <div class="cards">
    <div class="kpi">📦 สินค้าทั้งหมด <b id="totalProducts">0</b></div>
    <div class="kpi">💰 มูลค่ารวม <b id="totalValue">0</b></div>
    <div class="kpi">📊 ราคาเฉลี่ย <b id="avgPrice">0</b></div>
    </div>

    <div class="glass">

    <div class="topbar">
    <h2>Product Management</h2>
    <div>
    <input type="text" id="search" placeholder="🔍 ค้นหาสินค้า...">
    </div>
    </div>

    <div style="margin-top:15px; display:flex; gap:10px; align-items: center; flex-wrap: wrap;">
    <input type="text" id="name" placeholder="ชื่อสินค้า">
    <input type="number" id="price" placeholder="ราคา">
    <button onclick="addProduct()">+ เพิ่มสินค้า</button>
    </div>

    <div style="overflow-x: auto;">
    <table>
    <thead>
    <tr>
    <th onclick="sortTable('id')">ID ⬍</th>
    <th onclick="sortTable('product_name')">ชื่อสินค้า ⬍</th>
    <th onclick="sortTable('price')">ราคา ⬍</th>
    <th>จัดการ</th>
    </tr>
    </thead>
    <tbody id="tableBody"></tbody>
    </table>
    </div>

    <div class="pagination" id="pagination"></div>

    </div>
    </div>
    </div>

    <div class="toast" id="toast"></div>

    <script>
    const API_URL="https://hosting.udru.ac.th/~it67040233137/workshop_api/api/products.php";
    let products=[];
    let currentPage=1;
    let rowsPerPage=5;
    let currentSort={key:null,asc:true};

    function toggleDark(){
    document.body.classList.toggle("dark");
    }

    function showToast(msg){
    const toast=document.getElementById("toast");
    toast.innerText=msg;
    toast.classList.add("show");
    setTimeout(()=>toast.classList.remove("show"),2000);
    }

    function updateKPI(){
    document.getElementById("totalProducts").innerText=products.length;
    let total=products.reduce((sum,p)=>sum+parseFloat(p.price),0);
    document.getElementById("totalValue").innerText=total.toLocaleString('th-TH', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById("avgPrice").innerText=
    (products.length? total/products.length:0).toLocaleString('th-TH', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    }

    function loadProducts(){
    fetch(API_URL)
    .then(res=>res.json())
    .then(data=>{
    products=data;
    updateKPI();
    renderTable();
    });
    }

    function renderTable(){
    let filtered=products.filter(p=>
    p.product_name.toLowerCase().includes(
    document.getElementById("search").value.toLowerCase()
    ));

    if(currentSort.key){
    filtered.sort((a,b)=>{
    let valA = a[currentSort.key];
    let valB = b[currentSort.key];

    // ตรวจสอบว่าเป็นตัวเลขหรือไม่เพื่อการเรียงลำดับที่ถูกต้อง
    if(!isNaN(valA) && !isNaN(valB)){
    valA = parseFloat(valA);
    valB = parseFloat(valB);
    }

    if(currentSort.asc)
    return valA>valB?1:-1;
    else
    return valA<valB?1:-1;
    });
    }

    let start=(currentPage-1)*rowsPerPage;
    let paginated=filtered.slice(start,start+rowsPerPage);

    let html="";
    paginated.forEach(p=>{
    html+=`
    <tr>
    <td>${p.id}</td>
    <td>${p.product_name}</td>
    <td>฿${parseFloat(p.price).toLocaleString('th-TH', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
    <td>
    <button onclick="editProduct(${p.id},'${p.product_name}',${p.price})">✏️ แก้ไข</button>
    <button class="delete-btn" onclick="deleteProduct(${p.id})">🗑️ ลบ</button>
    </td>
    </tr>`;
    });
    document.getElementById("tableBody").innerHTML=html;

    renderPagination(filtered.length);
    }

    function renderPagination(total){
    let pages=Math.ceil(total/rowsPerPage);
    let html="";
    for(let i=1;i<=pages;i++){
    html+=`<button onclick="changePage(${i})" style="${currentPage === i ? 'background: var(--primary);' : ''}">${i}</button>`;
    }
    document.getElementById("pagination").innerHTML=html;
    }

    function changePage(p){
    currentPage=p;
    renderTable();
    }

    function sortTable(key){
    if(currentSort.key===key){
    currentSort.asc=!currentSort.asc;
    }else{
    currentSort.key=key;
    currentSort.asc=true;
    }
    renderTable();
    }

    function addProduct(){
    let name=document.getElementById("name").value;
    let price=document.getElementById("price").value;

    if(!name || !price) {
        alert("กรุณากรอกชื่อสินค้าและราคาให้ครบถ้วน");
        return;
    }

    fetch(API_URL,{
    method:"POST",
    headers:{"Content-Type":"application/json"},
    body:JSON.stringify({product_name:name,price:price})
    })
    .then(()=>{
    showToast("เพิ่มสำเร็จ 🎉");
    document.getElementById("name").value = "";
    document.getElementById("price").value = "";
    loadProducts();
    });
    }

    function editProduct(id,name,price){
    let newName=prompt("ชื่อสินค้า:",name);
    if(newName === null) return; // กดยกเลิก
    let newPrice=prompt("ราคา:",price);
    if(newPrice === null) return; // กดยกเลิก

    fetch(API_URL,{
    method:"PUT",
    headers:{"Content-Type":"application/json"},
    body:JSON.stringify({id:id,product_name:newName,price:newPrice})
    })
    .then(()=>{
    showToast("แก้ไขสำเร็จ ✅");
    loadProducts();
    });
    }

    function deleteProduct(id){
    if(!confirm("คุณต้องการลบสินค้ารายการนี้ใช่หรือไม่?"))return;

    fetch(API_URL,{
    method:"DELETE",
    headers:{"Content-Type":"application/json"},
    body:JSON.stringify({id:id})
    })
    .then(()=>{
    showToast("ลบสำเร็จ ❌");
    loadProducts();
    });
    }

    document.getElementById("search").addEventListener("input",()=>{
    currentPage=1;
    renderTable();
    });

    loadProducts();
    </script>

    </body>
    </html>