<?php


$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
echo "Login: $login, Email: $email, Password: $password, Confirm Password: $confirm_password";

$pattern = '/.{8,}/'; // Au moins 8 caractères

if (preg_match($pattern, $password)) {
echo "Mot de passe valide";
} else {
echo "Mot de passe invalide";
exit;
}

if ($_POST['password']==$_POST['confirm_password']) {


}
/*



session_start();
$login = $_POST['identifier'];
$password = $_POST['password'];
if (!empty($login) && !empty($password)) {
$_SESSION['login'] = $login;
header("Location: index.php");
exit;
} else {
echo "Erreur : champs manquants";
}


if ($_post['password']==$_post['confirm_password']) {
    $login = $_post['login'];
    $email = $_post['email'];
    $password = $_post['password'];
    $confirm_password = $_post['confirm_password'];
    echo "";
} else {
    echo "";
}



*/
?>
