<?php require_once "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($login) || empty($password)) {
        $erreur = "Veuillez remplir tous les champs";
    } else {
        $sql = "SELECT id, email, username, password, nom, prenom FROM utilisateurs WHERE email = ? OR username = ?";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$login, $login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['password'] = $password;

            if ($user['id'] == 1) {
                $_SESSION['admin_logged_in'] = true;
            }

            header("Location: index.php");
            exit;
        } else {
            $erreur = "Email/nom d'utilisateur ou mot de passe incorrect";
        }
    }
}

