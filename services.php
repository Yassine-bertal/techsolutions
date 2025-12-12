
<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once __DIR__ . '/includes/db.php';
$isAdmin = !empty($_SESSION['is_admin']);
$pcs = pdo()->query('SELECT id, name, image_url, price FROM pcs ORDER BY id')->fetchAll();
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Services — TechSolution</title>
  <style>
    :root{--bg:#f6f8fb;--card:#fff;--accent:#0b72ff;--accent-dark:#0856cc;--muted:#6b7280;--light:#f3f4f6}
    *{box-sizing:border-box}
    body{font-family:Segoe UI, Roboto, Helvetica, Arial, sans-serif;background:var(--bg);margin:0;color:#111}
    .site-header{background:linear-gradient(90deg,var(--accent),#2b8bff);color:#fff;padding:0.75rem 0;box-shadow:0 2px 8px rgba(0,0,0,0.1);position:sticky;top:0;z-index:100}
    .header-content{max-width:1200px;margin:0 auto;padding:0 1rem;display:flex;justify-content:space-between;align-items:center rgba(0,0,0,0.1)}
    .brand h1{margin:0;font-size:1.4rem;font-weight:700 rgba(0,0,0,0.1)}
    nav{display:flex;gap:2rem}
    nav a{color:#fff;text-decoration:none;font-weight:500;padding-bottom:0.3rem;transition:all 0.3s;border-bottom:2px solid transparent}
    nav a:hover{opacity:0.9}
    nav a.active{border-bottom:2px solid #fff}
    .container{max-width:1200px;margin:0 auto;padding:1rem}
    h1{font-size:2.5rem;color:var(--accent);margin:2rem 0 1rem}
    h2{color:var(--accent);font-size:1.8rem;margin:2rem 0 1.5rem}
    .section-intro{font-size:1.1rem;color:var(--muted);margin-bottom:2rem;line-height:1.6}
    .grid-3{display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:2rem;margin:2rem 0}
    .service-card{background:var(--card);border-radius:12px;padding:2rem;box-shadow:0 2px 12px rgba(0,0,0,0.08);transition:all 0.3s}
    .service-card:hover{transform:translateY(-4px);box-shadow:0 8px 24px rgba(0,0,0,0.12)}
    .service-card-icon{font-size:3rem;margin-bottom:1rem}
    .service-card h3{color:var(--accent);margin:0 0 1rem;font-size:1.3rem}
    .service-card p{margin:0;color:var(--muted);line-height:1.6}
    .products-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.5rem;margin:2rem 0}
    .product-card{background:var(--card);border-radius:12px;padding:1.5rem;box-shadow:0 2px 12px rgba(0,0,0,0.08);transition:all 0.3s}
    .product-card:hover{transform:translateY(-4px);box-shadow:0 8px 24px rgba(0,0,0,0.12)}
    .product-card img{width:200px;height:200px;object-fit:cover;border-radius:8px;margin:0 auto 1rem;display:block}
    .product-card h3{color:var(--accent);margin:0.5rem 0;font-size:1.1rem;text-align:center}
    .product-price{font-weight:700;color:var(--accent);font-size:1.3rem;margin:0.5rem 0;text-align:center}
    .components-section{margin:1rem 0 0;padding:1rem 0;border-top:2px solid var(--light)}
    .components-header{display:flex;align-items:center;gap:0.5rem;cursor:pointer;user-select:none;padding:0.5rem 0}
    .components-header:hover{opacity:0.8}
    .components-header h4{color:var(--accent);margin:0;font-size:0.95rem;text-transform:uppercase;letter-spacing:0.5px;flex:1}
    .toggle-arrow{font-size:1.2rem;color:var(--accent);transition:transform 0.3s;display:inline-block}
    .toggle-arrow.rotated{transform:rotate(180deg)}
    .components-list{display:grid;grid-template-columns:1fr 1fr;gap:0.5rem;margin:0.5rem 0;max-height:0;overflow:hidden;transition:max-height 0.3s ease,margin 0.3s ease}
    .components-list.expanded{max-height:500px}
    .component-item{background:var(--light);padding:0.5rem 0.75rem;border-radius:6px;font-size:0.9rem;color:#333}
    .component-item strong{color:var(--accent)}
    .btn{background:var(--accent);color:#fff;border:0;padding:0.7rem 1.2rem;border-radius:8px;cursor:pointer;font-weight:600;text-decoration:none;display:inline-block;transition:all 0.3s;width:100%;text-align:center;margin-top:1rem}
    .btn:hover{background:var(--accent-dark);transform:translateY(-2px);box-shadow:0 4px 12px rgba(11,114,255,0.3)}
    .cta-section{background:linear-gradient(135deg,var(--accent),#2b8bff);color:#fff;padding:3rem 2rem;border-radius:16px;text-align:center;margin:3rem 0}
    .cta-section h2{color:#fff;margin:0 0 1rem}
    .cta-section p{margin:0 0 1.5rem;font-size:1.1rem}
    .cta-section .btn{background:#fff;color:var(--accent);width:auto}
    footer{margin-top:3rem;text-align:center;color:var(--muted);font-size:0.9rem;padding:2rem;border-top:1px solid #e6e9ef}
    @media (max-width:768px){
      h1{font-size:1.8rem}
      h2{font-size:1.3rem}
      .container{padding:0.5rem}
      nav{gap:1rem;font-size:0.95rem}
      .components-list{grid-template-columns:1fr}
    }
  </style>
</head>
<body>
  <header class="site-header">
    <div class="header-content">
      <div class="brand">
        <h1 style="color:#fff">🖥️ TechSolutions</h1>
      </div>
      <nav>
        <a href="index.php">Accueil</a>
        <a href="services.php" class="active">Services</a>
        <a href="contact.php">Contact</a>
        <?php if ($isAdmin): ?>
          <a href="admin.php">Admin</a>
          <a href="logout.php">Déconnexion</a>
        <?php else: ?>
          <a href="login.php">Connexion</a>
        <?php endif; ?>
      </nav>
    </div>
  </header>

  <div class="container">
    <h1>📋 Nos Services</h1>
    <p class="section-intro">TechSolution propose une suite complète de services pour accompagner vos besoins informatiques, du conseil à la maintenance.</p>

    <div class="grid-3">
      <div class="service-card">
        <div class="service-card-icon">💡</div>
        <h3>Conseil en informatique</h3>
        <p>Nos experts vous aident à définir la meilleure configuration selon vos besoins professionnels, votre budget et vos cas d'usage spécifiques.</p>
      </div>

      <div class="service-card">
        <div class="service-card-icon">🔧</div>
        <h3>Installation & configuration</h3>
        <p>Installation complète du matériel, configuration du système d'exploitation, installation des logiciels et optimisation des performances.</p>
      </div>

      <div class="service-card">
        <div class="service-card-icon">🆘</div>
        <h3>Support technique</h3>
        <p>Support réactif disponible pour résoudre vos problèmes informatiques rapidement. Intervention garantie dans les 48 heures.</p>
      </div>

      <div class="service-card">
        <div class="service-card-icon">🛡️</div>
        <h3>Maintenance préventive</h3>
        <p>Entretien régulier de votre matériel, mises à jour de sécurité, optimisation et prolongement de la durée de vie de vos équipements.</p>
      </div>

      <div class="service-card">
        <div class="service-card-icon">✅</div>
        <h3>Garantie & SAV</h3>
        <p>Tous nos produits bénéficient d'une garantie complète avec service après-vente fiable, réparation ou remplacement gratuit.</p>
      </div>

      <div class="service-card">
        <div class="service-card-icon">♻️</div>
        <h3>Reconditionnement</h3>
        <p>Matériel reconditionné, testé et certifié pour une informatique plus économique et durable. Même garantie que le neuf.</p>
      </div>
    </div>

    <div class="cta-section">
      <h2>Besoin de conseils pour choisir ?</h2>
      <p>Notre équipe d'experts est à votre disposition pour vous recommander la meilleure configuration selon vos besoins et votre budget.</p>
      <a href="contact.php" class="btn">Nous contacter pour un conseil</a>
    </div>

    <footer>
      © <?php echo date('Y'); ?> TechSolution — Tous droits réservés | Votre partenaire IT de confiance
    </footer>
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
'@

$servicesContent | Out-File -FilePath 'C:\Users\yassi\Documents\xamp\htdocs\techsolutions\services.php' -Encoding utf8 -Force
Write-Host 'services.php mis à jour - Les composants sont cachés par défaut ! ✨' -ForegroundColor Green