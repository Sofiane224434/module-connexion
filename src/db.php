<?php
function connexion_database()
{
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=sofiane-kherarfa_portfolio", "azim.404", "Sosoplesk");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

$connexion = connexion_database();

if ($connexion === null) {
    die("Impossible de se connecter à la base de données");
}

function erreur($erreur)
{
    echo "<p class=\"text-red-500\"> $erreur<p>";
}

$erreur = "";