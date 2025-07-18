<?php
// public/webhook.php

//  Clé secrète pour limiter l'accès (�|  adapter)
$token = '5c876b8e45f9ea793c1324e54b37';

//  Sécurité : vérifier la méthode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Méthode non autorisée';
    exit;
}

//  Vérifier le token transmis en GET
if (!isset($_GET['token']) || $_GET['token'] !== $token) {
    http_response_code(403);
    echo 'Accès interdit';
    exit;
}

//  Chemin vers ton projet Laravel
$projectDir = '/home1/apiqamg/webdev/dev.e-solve.net';

//  Exécution du git pull (avec log)
$logFile = $projectDir . '/storage/logs/webhook.log';
$now = date('Y-m-d H:i:s');
file_put_contents($logFile, "\n=== [$now] Déclenchement webhook ===\n", FILE_APPEND);

//  Exécuter git pull
$cmd = "cd $projectDir && git pull origin master 2>&1";
$output = shell_exec($cmd);

file_put_contents($logFile, $output . "\n", FILE_APPEND);

echo "Déploiement effectué";