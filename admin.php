<?php
session_start();
require_once __DIR__ . '/includes/db.php';

if (empty($_SESSION['is_admin'])) {
    header('Location: login.php');
    exit;
}

$pdo = pdo();
// Handle create/update/delete actions
$action = $_POST['action'] ?? '';
if ($action === 'create') {
    $name = trim($_POST['name'] ?? '');
    $image = trim($_POST['image_url'] ?? '');
    $price = floatval($_POST['price'] ?? 0);
    if ($name) {
        $stmt = $pdo->prepare('INSERT INTO pcs (name, image_url, price) VALUES (?, ?, ?)');
        $stmt->execute([$name, $image, $price]);
    }
    header('Location: admin.php'); exit;
}
if ($action === 'delete') {
    $id = intval($_POST['id'] ?? 0);
    if ($id) {
        $stmt = $pdo->prepare('DELETE FROM pcs WHERE id = ?');
        $stmt->execute([$id]);
    }
    header('Location: admin.php'); exit;
}

$pcs = $pdo->query('SELECT id, name, image_url, price FROM pcs ORDER BY id')->fetchAll();
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin — Gestion du parc</title>
  <style>
    :root{--bg:#f6f8fb;--card:#fff;--accent:#0b72ff;--accent-dark:#0856cc;--muted:#6b7280;--light:#f3f4f6}
    *{box-sizing:border-box}
    body{font-family:Segoe UI, Roboto, Arial;background:var(--bg);margin:0;color:#111}
    .site-header{background:linear-gradient(90deg,var(--accent),#2b8bff);color:#fff;padding:0.75rem 0;box-shadow:0 2px 8px rgba(0,0,0,0.1);position:sticky;top:0;z-index:100}
    .header-content{max-width:1200px;margin:0 auto;padding:0 1rem;display:flex;justify-content:space-between;align-items:center}
    .brand h1{margin:0;font-size:1.4rem;font-weight:700;color:#fff}
    nav{display:flex;gap:2rem}
    nav a{color:#fff;text-decoration:none;font-weight:500;padding-bottom:0.3rem;transition:all 0.3s;border-bottom:2px solid transparent}
    nav a:hover{opacity:0.9}
    nav a.active{border-bottom:2px solid #fff}
    .container{max-width:1200px;margin:0 auto;padding:1rem}
    h1{font-size:2.5rem;color:var(--accent);margin:2rem 0 1rem}
    h2{color:var(--accent);font-size:1.8rem;margin:2rem 0 1.5rem}
    .products-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.5rem;margin:2rem 0}
    .product-card{background:var(--card);border-radius:12px;padding:1.5rem;box-shadow:0 2px 12px rgba(0,0,0,0.08);transition:all 0.3s}
    .product-card:hover{transform:translateY(-4px);box-shadow:0 8px 24px rgba(0,0,0,0.12)}
    .product-card img{width:200px;height:200px;object-fit:cover;border-radius:8px;margin:0 auto 1rem;display:block}
    .product-card h3{color:var(--accent);margin:0.5rem 0;font-size:1.1rem;text-align:center}
    .product-price{font-weight:700;color:var(--accent);font-size:1.3rem;margin:0.5rem 0;text-align:center;display:none}
    .components-section{margin:1rem 0 0;padding:1rem 0;border-top:2px solid var(--light)}
    .components-header{display:flex;align-items:center;gap:0.5rem;cursor:pointer;user-select:none;padding:0.5rem 0}
    .components-header:hover{opacity:0.8}
    .components-header h4{color:var(--accent);margin:0;font-size:0.95rem;text-transform:uppercase;letter-spacing:0.5px;flex:1}
    .toggle-arrow{font-size:1.2rem;color:var(--accent);transition:transform 0.3s;display:inline-block}
    .toggle-arrow.rotated{transform:rotate(180deg)}
    .components-list{display:grid;grid-template-columns:1fr 1fr;gap:0.5rem;margin:0.5rem 0;max-height:0;overflow:hidden;transition:max-height 0.3s ease,margin 0.3s ease}
    .components-list.expanded{max-height:500px}
    .component-item{background:var(--light);padding:0.5rem 0.75rem;border-radius:6px;font-size:0.9rem;color:#333}
    .product-actions{display:flex;gap:0.5rem;margin-top:1rem}
    .btn{background:var(--accent);color:#fff;border:0;padding:.7rem 1.2rem;border-radius:8px;cursor:pointer;font-weight:600;transition:all 0.3s;flex:1;text-align:center}
    .btn:hover{background:var(--accent-dark);transform:translateY(-2px);box-shadow:0 4px 12px rgba(11,114,255,0.3)}
    .danger{background:#d33}
    .danger:hover{background:#b22;box-shadow:0 4px 12px rgba(211,51,51,0.3)}
    .form-group{margin:1rem 0}
    label{display:block;font-weight:600;margin-bottom:.35rem;color:var(--accent)}
    input{width:100%;padding:.6rem .75rem;border:1px solid #e6e9ef;border-radius:8px;background:#fff;font-size:0.95rem}
    .card{background:var(--card);border-radius:12px;padding:1.5rem;box-shadow:0 2px 12px rgba(0,0,0,0.08)}
    .form-card{margin-top:2rem}
    @media (max-width:768px){
      h1{font-size:1.8rem}
      h2{font-size:1.3rem}
      .container{padding:0.5rem}
      nav{gap:1rem;font-size:0.95rem}
      .products-grid{grid-template-columns:1fr}
    }
  </style>
</head>
<body>
  <header class="site-header">
    <div class="header-content">
      <div class="brand">
        <h1 style="margin:0;font-size:1.4rem;color:#fff;font-weight:700">TechSolution</h1>
      </div>
      <nav>
        <a href="index.php">Accueil</a>
        <a href="services.php">Services</a>
        <a href="contact.php">Contact</a>
        <a href="logout.php">Déconnexion</a>
      </nav>
    </div>
  </header>

  <div class="container">
    <h1>👨‍💻 Gestion du parc informatique</h1>

    <div style="display:grid;grid-template-columns:1fr;gap:2rem;margin:2rem 0">
      <main>
        <div class="products-grid">
          <?php foreach ($pcs as $pc): ?>
            <?php
              $stmt = pdo()->prepare('
                SELECT c.name
                FROM pc_components pc
                JOIN components c ON c.id = pc.component_id
                WHERE pc.pc_id = ?
                ORDER BY c.name
              ');
              $stmt->execute([(int)$pc['id']]);
              $components = $stmt->fetchAll();
            ?>
            <div class="product-card">
              <img src="<?= e($pc['image_url']) ?>" alt="Photo de <?= e($pc['name']) ?>">
              <h3><?= e($pc['name']) ?></h3>

              <?php if (!empty($components)): ?>
                <div class="components-section">
                  <div class="components-header" onclick="toggleComponents(this)">
                    <h4>⚙️ Composants</h4>
                    <span class="toggle-arrow">▼</span>
                  </div>
                  <div class="components-list">
                    <?php foreach ($components as $comp): ?>
                      <div class="component-item">
                        ✓ <?= e($comp['name']) ?>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </main>
    </div>
  </div>

  <script>
    function toggleComponents(header) {
      const arrow = header.querySelector('.toggle-arrow');
      const list = header.nextElementSibling;

      arrow.classList.toggle('rotated');
      list.classList.toggle('expanded');
    }
  </script>
</body>
</html>
