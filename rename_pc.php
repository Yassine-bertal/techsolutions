<?php
require_once __DIR__ . '/includes/db.php';

$pdo = pdo();
$stmt = $pdo->prepare('UPDATE pcs SET name = ? WHERE name = ?');
$result = $stmt->execute(['Pc Support client', 'systeme réseau']);

if ($result) {
    echo 'PC renommé avec succès : systeme réseau → Pc Support client';
} else {
    echo 'Erreur lors du renommage du PC';
}

// Vérification
$check = $pdo->query('SELECT name FROM pcs ORDER BY name')->fetchAll();
echo '<br><br>Liste des PC mise à jour:<br>';
foreach ($check as $pc) {
    echo '• ' . htmlspecialchars($pc['name']) . '<br>';
}
?>
