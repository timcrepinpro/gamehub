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

// 3. Inclure la connexion à la base de données
include 'db.php';

try {
    // 4. Récupérer l'utilisateur depuis la base de données
    $sql = "SELECT * FROM utilisateurs WHERE login = :login";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // 5. Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($user && password_verify($password, $user['password'])) {
        // 6. Sauvegarder le login dans la session
        $_SESSION['login'] = $user['login'];

        // 7. Rediriger vers l'accueil
        header("Location: index.php");
        exit;
    } else {
        // Identifiants incorrects
        echo "Erreur : Identifiants incorrects.";
    }
} catch (PDOException $e) {
    die("Erreur lors de la connexion : " . $e->getMessage());
}
?>