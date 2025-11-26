<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=techsolutions;charset=utf8mb4', 'root', '', [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

$pcId = isset($_GET['pc']) ? (int)$_GET['pc'] : 1;

$pc = $pdo->query("SELECT id, name, image_url, price FROM pcs WHERE id = ".$pcId)->fetch();
$components = $pdo->query("SELECT c.name FROM pc_components pc JOIN components c ON c.id=pc.component_id WHERE pc.pc_id=".$pcId)->fetchAll();
?>
<!doctype html>
<html lang="fr">
<head><meta charset="utf-8"><title>Étape 04 — PC dynamique</title></head>
<body>
  <p>Choisir : <a href="?pc=1">PC 1</a> | <a href="?pc=2">PC 2</a> | <a href="?pc=3">PC 3</a></p>
  <h1><?php echo $pc ? $pc['name'] : 'PC introuvable'; ?></h1>
  <?php if ($pc): ?>
    <img src="<?php echo $pc['image_url']; ?>" alt="Image">
    <p>Prix : <?php echo number_format((float)$pc['price'], 2, ',', ' '); ?> €</p>
    <h2>Composants</h2>
    <ul>
      <?php foreach ($components as $r): ?>
        <li><?php echo $r['name']; ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</body>
</html>
