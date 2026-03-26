<?php
session_start();

// 1. Récupérer les données du formulaire
$login = $_POST['login'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

// 2. Vérifier que tous les champs sont remplis
if (empty($login) || empty($email) || empty($password) || empty($confirm_password)) {
    die("Erreur : Tous les champs sont obligatoires.");
}

// 3. Valider le login (lettres et chiffres, longueur minimale de 4)
$loginPattern = "/^[a-zA-Z0-9]{4,}$/";
if (!preg_match($loginPattern, $login)) {
    die("Erreur : Le login doit contenir uniquement des lettres et des chiffres, et faire au moins 4 caractères.");
}

// 4. Valider l'email (format basique)
$emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,}$/";
if (!preg_match($emailPattern, $email)) {
    die("Erreur : L'email n'est pas valide.");
}

// 5. Valider le mot de passe (8 caractères, 1 majuscule, 1 chiffre)
$passwordPattern = "/^(?=.*[A-Z])(?=.*\d).{8,}$/";
if (!preg_match($passwordPattern, $password)) {
    die("Erreur : Le mot de passe doit contenir au moins 8 caractères, une majuscule et un chiffre.");
}

// 6. Vérifier que les mots de passe correspondent
if ($password !== $confirm_password) {
    die("Erreur : Les mots de passe ne correspondent pas.");

}

$_SESSION['login'] = '$login';
$_SESSION['email'] = '$email';
$_SESSION['password'] = '$password';

// 7. Succès : afficher un message et rediriger vers la page de connexion
echo "Inscription réussie ! Bienvenue, $login. Vous pouvez maintenant vous connecter.";
header("Refresh: 0; url=login.html"); 
?>