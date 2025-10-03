<?php require_once "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $nom = trim($_POST['nom'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmpassword'] ?? '';

    if (in_array('', [$email, $prenom, $nom, $username, $password, $confirmPassword], true)) {
        $erreur = htmlspecialchars("Veuillez remplir tous les champs");
    } elseif ($password !== $confirmPassword) {
        $erreur = htmlspecialchars("Les mots de passe ne correspondent pas");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur = htmlspecialchars("Format d'email invalide");
    } elseif (strlen($password) < 8) {
        $erreur = htmlspecialchars("Le mot de passe doit contenir au moins 8 caractères");
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,}$/', $password)) {
        $erreur = htmlspecialchars("Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial");
    } else {
        $sql = "SELECT email, username FROM utilisateurs WHERE email = ? OR username = ?";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$email, $username]);
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing) {
            if ($existing['email'] === $email) {
                $erreur = htmlspecialchars("Cette adresse email est déjà utilisée");
            } elseif ($existing['username'] === $username) {
                $erreur = htmlspecialchars("Ce nom d'utilisateur est déjà utilisé");
            }
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO utilisateurs (email, username, nom, prenom, password) VALUES (?, ?, ?, ?, ?)";
            $insertStmt = $connexion->prepare($sql);

            if ($insertStmt->execute([$email, $username, $nom, $prenom, $hashedPassword])) {
                header("Location: index.php");
                exit;
            } else {
                $erreur = htmlspecialchars("Erreur lors de l'inscription. Veuillez réessayer.");
            }
        }
    }
}

