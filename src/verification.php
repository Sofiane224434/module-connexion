<?php require_once "db.php";

function verifier_connected()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../connexion.php");
        exit();
    }
}

function verifier_admin()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header("Location: ../connexion.php");
        exit();
    }
}

function verifier_session()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}