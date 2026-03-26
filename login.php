<?php
session_start();

// Si l'utilisateur est déjà connecté, rediriger vers l'accueil
if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

// 1. Récupérer les données du formulaire
$login = $_POST['identifier'] ?? '';
$password = $_POST['password'] ?? '';

// 2. Vérifier que les champs sont remplis
if (empty($login) || empty($password)) {
    die("Erreur : Tous les champs sont obligatoires.");
}

// 3.  vérification 
if (($login === $_SESSION['login'] || $login === $_SESSION['login']) && $password === $_SESSION['password']) {
    // 4. Sauvegarder le login dans la session
    $_SESSION['login'] = $login;

    // 5. Rediriger vers l'accueil
    header("Location: index.php");
    exit;
} else {
    // Identifiants incorrects
    echo "Erreur : Identifiants incorrects.";
}
?>