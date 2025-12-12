
<?php
// contact.php - page de contact professionnelle
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$isAdmin = !empty($_SESSION['is_admin']);

$errors = [];
$success = false;
$name = $email = $phone = $subject = $message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $subject = trim($_POST['subject'] ?? 'Demande via le formulaire');
    $message = trim($_POST['message'] ?? '');

    if ($name === '') $errors[] = 'Veuillez indiquer votre nom.';
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Veuillez indiquer une adresse e‑mail valide.';
    if ($message === '' || strlen($message) < 10) $errors[] = 'Veuillez écrire un message (au moins 10 caractères).';

    if (empty($errors)) {
        $mailTo = 'contact@techsolution.example';
        $mailSubject = '[Site TechSolution] ' . $subject;
        $mailBody = "Nom: $name\nEmail: $email\nTéléphone: $phone\n\nMessage:\n$message\n";
        $headers = "From: $name <$email>\r\nReply-To: $email\r\n";
        @mail($mailTo, $mailSubject, $mailBody, $headers);
        $logEntry = date('Y-m-d H:i:s') . " | $name | $email | $phone | $subject\n$message\n\n";
        @file_put_contents(__DIR__ . '/messages.log', $logEntry, FILE_APPEND | LOCK_EX);
        $success = true;
        $name = $email = $phone = $subject = $message = '';
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Contact — TechSolution</title>
  <style>
    :root{--bg:#f6f8fb;--card:#fff;--accent:#0b72ff;--muted:#6b7280}
    *{box-sizing:border-box}
    body{font-family:Segoe UI, Roboto, Helvetica, Arial, sans-serif;background:var(--bg);margin:0;color:#111}
    .site-header{background:linear-gradient(90deg,var(--accent),#2b8bff);color:#fff;padding:0.75rem 0;box-shadow:0 2px 8px rgba(0,0,0,0.1)}
    .header-content{max-width:1000px;margin:0 auto;padding:0 1rem;display:flex;justify-content:space-between;align-items:center}
    .brand h1{margin:0;font-size:1.25rem}
    nav{display:flex;gap:1.5rem}
    nav a{color:#fff;text-decoration:none;font-weight:500;padding-bottom:0.2rem;transition:all 0.3s}
    nav a:hover{opacity:0.8}
    nav a.active{border-bottom:2px solid #fff}
    .container{max-width:1000px;margin:0 auto;padding:1rem}
    .grid{display:grid;grid-template-columns:1fr 380px;gap:1rem;margin:2rem 0}
    @media (max-width:900px){.grid{grid-template-columns:1fr}}
    .card{background:var(--card);border-radius:12px;padding:1.25rem;box-shadow:0 2px 8px rgba(0,0,0,0.08)}
    label{display:block;font-weight:600;margin-bottom:.35rem}
    input[type="text"],input[type="email"],textarea{width:100%;padding:.6rem .75rem;border:1px solid #e6e9ef;border-radius:8px;background:#fff;font-size:0.95rem}
    textarea{min-height:150px;resize:vertical}
    .row{display:flex;gap:.75rem}
    .row .col{flex:1}
    .muted{color:var(--muted);font-size:.95rem}
    .btn{background:var(--accent);color:#fff;border:0;padding:.7rem 1rem;border-radius:8px;cursor:pointer;font-weight:600;transition:all 0.3s}
    .btn:hover{opacity:0.9;transform:translateY(-2px)}
    .info-box{padding:1rem;border-radius:10px;background:linear-gradient(180deg,#fbfdff,#f7f9ff);border:1px solid #eef6ff}
    .info-box a{color:var(--accent);text-decoration:none}
    .info-box a:hover{text-decoration:underline}
    .errors{background:#fff6f6;border:1px solid #ffd2d2;color:#8b1c1c;padding:.75rem;border-radius:8px;margin-bottom:1rem}
    .success{background:#f3ffef;border:1px solid #c8f7d3;color:#176c2f;padding:.75rem;border-radius:8px;margin-bottom:1rem}
    .small{font-size:.9rem;color:var(--muted)}
    footer{margin-top:2rem;text-align:center;color:var(--muted);font-size:0.9rem;padding:1rem 0;border-top:1px solid #e6e9ef}
    h2{color:var(--accent)}
  </style>
</head>
<body>
  <header class="site-header">
    <div class="header-content">
      <div class="brand">
        <h1>🖥️ TechSolution</h1>
      </div>
      <nav>
        <a href="index.php">Accueil</a>
        <a href="services.php">Services</a>
        <a href="contact.php" class="active">Contact</a>
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
    <div class="grid">
      <main class="card">
        <h2>Nous contacter</h2>
        <p class="muted">Vous avez une question sur nos produits, une demande commerciale ou besoin d'assistance ? Envoyez-nous un message.</p>

        <?php if (!empty($errors)): ?>
          <div class="errors">
            <strong>Erreur :</strong>
            <ul>
              <?php foreach ($errors as $e): ?>
                <li><?php echo htmlspecialchars($e, ENT_QUOTES); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <?php if ($success): ?>
          <div class="success">
            Merci — votre message a bien été reçu. Nous vous répondrons sous 48 heures.
          </div>
        <?php endif; ?>

        <form method="post">
          <div class="row">
            <div class="col">
              <label for="name">Nom *</label>
              <input id="name" name="name" type="text" value="<?php echo htmlspecialchars($name); ?>" required>
            </div>
            <div class="col">
              <label for="email">E‑mail *</label>
              <input id="email" name="email" type="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
          </div>

          <div style="margin-top:.75rem" class="row">
            <div class="col">
              <label for="phone">Téléphone</label>
              <input id="phone" name="phone" type="text" value="<?php echo htmlspecialchars($phone); ?>">
            </div>
            <div class="col">
              <label for="subject">Sujet</label>
              <input id="subject" name="subject" type="text" value="<?php echo htmlspecialchars($subject); ?>">
            </div>
          </div>

          <div style="margin-top:.75rem">
            <label for="message">Message *</label>
            <textarea id="message" name="message" required><?php echo htmlspecialchars($message); ?></textarea>
          </div>

          <div style="display:flex;justify-content:space-between;align-items:center;margin-top:1rem">
            <div class="small">Les champs marqués * sont obligatoires.</div>
            <button class="btn" type="submit">Envoyer le message</button>
          </div>
        </form>
      </main>

      <aside class="card info-box">
        <h3>Coordonnées</h3>
        <p><strong>TechSolution</strong></p>
        <p>12 Rue de l'Innovation<br>75000 Paris, France</p>
        <p>Téléphone : <a href="tel:+33123456789">+33 1 23 45 67 89</a></p>
        <p>E‑mail : <a href="mailto:contact@techsolution.example">contact@techsolution.example</a></p>

        <hr style="margin:1rem 0;border:none;border-top:1px solid #eef3ff">

        <h4>Horaires</h4>
        <p class="small">Lundi — Vendredi : 9h — 18h<br>Samedi : 10h — 14h</p>
      </aside>
    </div>

    <footer>
      © <?php echo date('Y'); ?> TechSolution — Tous droits réservés
    </footer>
  </div>
</body>
</html>
'@

$contactContent | Out-File -FilePath 'C:\Users\yassi\Documents\xamp\htdocs\techsolutions\contact.php' -Encoding utf8 -Force
Write-Host 'contact.php remis à jour avec navigation complète !' -ForegroundColor Green