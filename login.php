<?php
session_start();
// Si déjà connecté -> redirection
if (!empty($_SESSION['is_admin'])) {
    header('Location: admin.php');
    exit;
}

$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['username'] ?? '');
    $pass = trim($_POST['password'] ?? '');

    // Identifiants demandés : tech / tech
    if ($user === 'tech' && $pass === 'tech') {
        $_SESSION['is_admin'] = true;
        // Regénérer l'ID de session
        session_regenerate_id(true);
        header('Location: admin.php');
        exit;
    } else {
        $err = 'Identifiant ou mot de passe incorrect.';
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin — Login</title>
  <style>
    :root{--bg:#f6f8fb;--card:#fff;--accent:#0b72ff;--muted:#666}
    body{font-family:Segoe UI, Roboto, Arial; background:var(--bg); margin:0;}
    .wrap{max-width:420px;margin:6rem auto;padding:1.25rem}
    .card{background:var(--card);padding:2rem;border-radius:10px;box-shadow:0 6px 20px rgba(0,0,0,0.08)}
    h1{margin:0 0 1rem;color:var(--accent)}
    label{display:block;margin-top:0.75rem;font-weight:600}
    input{width:100%;padding:0.6rem;border:1px solid #e6e9ef;border-radius:8px;margin-top:0.35rem}
    .btn{background:var(--accent);color:#fff;border:0;padding:0.7rem 1rem;border-radius:8px;margin-top:1rem;cursor:pointer;width:100%}
    .err{background:#fff6f6;border:1px solid #ffd2d2;color:#8b1c1c;padding:0.6rem;border-radius:6px;margin-bottom:0.5rem}
    .small{font-size:0.9rem;color:var(--muted);margin-top:0.8rem;text-align:center}
  </style>
</head>
<body>
  <div class="wrap">
    <div class="card">
      <h1>Admin — Connexion</h1>
      <?php if ($err): ?>
        <div class="err"><?php echo htmlspecialchars($err); ?></div>
      <?php endif; ?>
      <form method="post">
        <label for="username">Identifiant</label>
        <input id="username" name="username" type="text" required autofocus>

        <label for="password">Mot de passe</label>
        <input id="password" name="password" type="password" required>

        <button class="btn" type="submit">Se connecter</button>
      </form>
      <div class="small">
    </div>
  </div>
</body>
</html>