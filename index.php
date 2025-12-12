
<?php // index.php - page d'accueil améliorée ?>
<?php
session_start();
$isAdmin = !empty($_SESSION['is_admin']);
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Accueil — TechSolution</title>
  <style>
    :root{--bg:#f6f8fb;--card:#fff;--accent:#0b72ff;--accent-dark:#0856cc;--muted:#6b7280;--light:#f3f4f6}
    *{box-sizing:border-box}
    body{font-family:Segoe UI, Roboto, Helvetica, Arial, sans-serif;background:var(--bg);margin:0;color:#111}
    .site-header{background:linear-gradient(90deg,var(--accent),#2b8bff);color:#fff;padding:0.75rem 0;box-shadow:0 2px 8px rgba(0,0,0,0.1);position:sticky;top:0;z-index:100}
    .header-content{max-width:1200px;margin:0 auto;padding:0 1rem;display:flex;justify-content:space-between;align-items:center}
    .brand h1{margin:0;font-size:1.4rem;font-weight:700}
    nav{display:flex;gap:2rem}
    nav a{color:#fff;text-decoration:none;font-weight:500;padding-bottom:0.3rem;transition:all 0.3s;border-bottom:2px solid transparent}
    nav a:hover{opacity:0.9}
    nav a.active{border-bottom:2px solid #fff}
    .container{max-width:1200px;margin:0 auto;padding:1rem}
    .hero{background:linear-gradient(135deg,var(--accent) 0%,#2b8bff 100%);color:#fff;padding:4rem 2rem;border-radius:16px;text-align:center;margin:2rem 0;box-shadow:0 8px 24px rgba(11,114,255,0.2)}
    .hero h2{margin:0 0 1rem;font-size:2.5rem;font-weight:700}
    .hero p{margin:0 0 1.5rem;font-size:1.15rem;opacity:0.95}
    .btn{background:var(--accent);color:#fff;border:0;padding:0.8rem 1.5rem;border-radius:8px;cursor:pointer;font-weight:600;text-decoration:none;display:inline-block;transition:all 0.3s}
    .btn:hover{background:var(--accent-dark);transform:translateY(-3px);box-shadow:0 6px 16px rgba(11,114,255,0.3)}
    .btn-secondary{background:#fff;color:var(--accent);border:2px solid var(--accent)}
    .btn-secondary:hover{background:var(--light)}
    .grid-2{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:2rem;margin:2rem 0}
    .card{background:var(--card);border-radius:12px;padding:2rem;box-shadow:0 2px 12px rgba(0,0,0,0.08);transition:all 0.3s}
    .card:hover{transform:translateY(-4px);box-shadow:0 8px 24px rgba(0,0,0,0.12)}
    .card-icon{font-size:2.5rem;margin-bottom:1rem}
    .card h3{color:var(--accent);margin:0 0 0.75rem;font-size:1.25rem}
    .card p{margin:0;color:var(--muted);line-height:1.6}
    .section-title{text-align:center;font-size:2rem;color:var(--accent);margin:3rem 0 2rem;font-weight:700}
    .features-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:1.5rem;margin:2rem 0}
    .feature-item{display:flex;align-items:flex-start;gap:1rem}
    .feature-icon{background:linear-gradient(135deg,var(--accent),#2b8bff);color:#fff;width:50px;height:50px;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.5rem;font-weight:700}
    .feature-item h4{margin:0 0 0.5rem;color:#111}
    .feature-item p{margin:0;color:var(--muted);font-size:0.95rem}
    .cta-section{background:linear-gradient(135deg,var(--accent),#2b8bff);color:#fff;padding:3rem 2rem;border-radius:16px;text-align:center;margin:3rem 0}
    .cta-section h2{margin:0 0 1rem;font-size:2rem}
    .cta-section p{margin:0 0 1.5rem;font-size:1.1rem}
    footer{margin-top:3rem;text-align:center;color:var(--muted);font-size:0.9rem;padding:2rem;border-top:1px solid #e6e9ef}
    @media (max-width:768px){
      .hero{padding:2rem 1rem}
      .hero h2{font-size:1.8rem}
      nav{gap:1rem;font-size:0.95rem}
      .container{padding:0.5rem}
    }
  </style>
</head>
<body>
  <header class="site-header">
    <div class="header-content">
      <div class="brand">
        <h1 style="margin:0;color:#fff;font-size:1.25rem;font-weight:700">🖥️ TechSolutions</h1>
      </div>
      <nav>
        <a href="index.php" class="active">Accueil</a>
        <a href="services.php">Services</a>
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
    <div class="hero">
      <h2>Bienvenue chez TechSolution</h2>
      <p>Votre partenaire de confiance pour l'informatique professionnelle et performante</p>
      <a href="services.php" class="btn">Découvrir nos services</a>
      <a href="contact.php" class="btn btn-secondary" style="margin-left:1rem">Nous contacter</a>
    </div>

    <div class="grid-2">
      <div class="card">
        <div class="card-icon">💡</div>
        <h3>Expertise reconnue</h3>
        <p>Plus de 10 ans d'expérience dans la sélection et la configuration de solutions informatiques adaptées à chaque besoin.</p>
      </div>
      <div class="card">
        <div class="card-icon">🚀</div>
        <h3>Performance garantie</h3>
        <p>Nos PC sont sélectionnés et testés pour offrir les meilleures performances dans votre domaine d'activité.</p>
      </div>
      <div class="card">
        <div class="card-icon">🛡️</div>
        <h3>Support professionnel</h3>
        <p>Une équipe technique réactive disponible pour vous accompagner avant, pendant et après votre achat.</p>
      </div>
    </div>

    <h2 class="section-title">Pourquoi TechSolution ?</h2>
    
    <div class="features-grid">
      <div class="feature-item">
        <div class="feature-icon">✓</div>
        <div>
          <h4>Large gamme de PC</h4>
          <p>Du portable budgétaire au PC gaming haute performance, nous avons la solution pour vous.</p>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">✓</div>
        <div>
          <h4>Conseil personnalisé</h4>
          <p>Nos experts vous conseillent pour trouver le matériel parfait selon vos besoins et votre budget.</p>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">✓</div>
        <div>
          <h4>Installation gratuite</h4>
          <p>Installation, configuration et mise en service gratuites avec chaque achat.</p>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">✓</div>
        <div>
          <h4>Garantie complète</h4>
          <p>Tous nos produits bénéficient d'une garantie complète et d'un excellent service après-vente.</p>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">✓</div>
        <div>
          <h4>Support 48h</h4>
          <p>En cas de problème, notre équipe technique intervient dans les 48 heures.</p>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">✓</div>
        <div>
          <h4>Prix compétitifs</h4>
          <p>Des tarifs avantageux sans compromis sur la qualité du matériel et du service.</p>
        </div>
      </div>
    </div>

    <div class="cta-section">
      <h2>Prêt à trouver le PC qui vous convient ?</h2>
      <p>Contactez nos experts pour une consultation gratuite et une démonstration personnalisée.</p>
      <a href="contact.php" class="btn" style="margin-top:1rem">Prendre rendez-vous</a>
    </div>

    <footer>
      © <?php echo date('Y'); ?> TechSolution — Tous droits réservés | Votre partenaire IT de confiance
    </footer>
  </div>
</body>
</html>
'@

$indexContent | Out-File -FilePath 'C:\Users\yassi\Documents\xamp\htdocs\techsolutions\index.php' -Encoding utf8 -Force
Write-Host 'index.php amélioré ! ✨' -ForegroundColor Green