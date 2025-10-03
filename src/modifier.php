<?php
verifier_session();
require_once "db.php";

if (!isset($_SESSION['admin_logged_in'])) {
    $_SESSION['admin_logged_in'] = false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['admin_logged_in'] != true) {
    $email = trim($_POST['email'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $nom = trim($_POST['nom'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmpassword'] ?? '';

    if (in_array('', [$email, $prenom, $nom, $username], true)) {
        $erreur = htmlspecialchars("Veuillez remplir tous les champs obligatoires");
    } elseif (!empty($password) && $password !== $confirmPassword) {
        $erreur = htmlspecialchars("Les mots de passe ne correspondent pas");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur = htmlspecialchars("Format d'email invalide");
    } elseif (!empty($password) && strlen($password) < 8) {
        $erreur = htmlspecialchars("Le mot de passe doit contenir au moins 8 caractères");
    } elseif (!empty($password) && !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,}$/', $password)) {
        $erreur = htmlspecialchars("Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial");
    } else {
        $sql = "SELECT email, username FROM utilisateurs WHERE (email = ? OR username = ?) AND id != ?";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$email, $username, $_SESSION['user_id']]);
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing) {
            if ($existing['email'] === $email) {
                $erreur = htmlspecialchars("Cette adresse email est déjà utilisée");
            } elseif ($existing['username'] === $username) {
                $erreur = htmlspecialchars("Ce nom d'utilisateur est déjà utilisé");
            }
        } else {
            if (!empty($password)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE utilisateurs SET email = ?, username = ?, nom = ?, prenom = ?, password = ? WHERE id = ?";
                $updateStmt = $connexion->prepare($sql);
                $success = $updateStmt->execute([$email, $username, $nom, $prenom, $hashedPassword, $_SESSION['user_id']]);
            } else {
                $sql = "UPDATE utilisateurs SET email = ?, username = ?, nom = ?, prenom = ? WHERE id = ?";
                $updateStmt = $connexion->prepare($sql);
                $success = $updateStmt->execute([$email, $username, $nom, $prenom, $_SESSION['user_id']]);
            }

            if ($success) {
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $username;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['nom'] = $nom;

                $success_message = "Profil modifié avec succès";
            } else {
                $erreur = htmlspecialchars("Erreur lors de la modification. Veuillez réessayer.");
            }
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['admin_logged_in'] == true) {

    $email = trim($_POST['email'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $nom = trim($_POST['nom'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmpassword'] ?? '';

    if (!empty($password) && $password !== $confirmPassword) {
        $erreur = htmlspecialchars("Les mots de passe ne correspondent pas");
    } else {
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE utilisateurs SET email = ?, username = ?, nom = ?, prenom = ?, password = ? WHERE id = ?";
            $updateStmt = $connexion->prepare($sql);
            $success = $updateStmt->execute([$email, $username, $nom, $prenom, $hashedPassword, $_SESSION['user_id']]);
        } else {
            $sql = "UPDATE utilisateurs SET email = ?, username = ?, nom = ?, prenom = ? WHERE id = ?";
            $updateStmt = $connexion->prepare($sql);
            $success = $updateStmt->execute([$email, $username, $nom, $prenom, $_SESSION['user_id']]);
        }

        if ($success) {
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['nom'] = $nom;

            $success_message = "Profil de l'administrateur a changé.";
        } else {
            $erreur = htmlspecialchars("Erreur lors de la modification. Veuillez réessayer.");
        }
    }
}

$sql = "SELECT email, username, prenom, nom FROM utilisateurs WHERE id = ?";
$stmt = $connexion->prepare($sql);
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$email = $user['email'];
$username = $user['username'];
$prenom = $user['prenom'];
$nom = $user['nom'];
?>