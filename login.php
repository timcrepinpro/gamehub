<?php
session_start();

// 1. Récupérer les données
$login = $_POST['identifier'] ?? '';
$password = $_POST['password'] ?? '';

// 2. Vérifier que les champs sont remplis
if (empty($login) || empty($password)) {
    echo "Erreur : champs manquants";
    exit;
}

// 3. Simulation (pas de base de données)
if ($login == "admin" && $password == "1234") {

    // 4. Sauvegarder dans la session
    $_SESSION['login'] = $login;

    // 5. Redirection vers accueil
    header("Location: index.php");
    exit;

} else {
    echo "Erreur : identifiants incorrects";
}
?>