<?php
require_once "src/verification.php";
verifier_session();
$page = pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_FILENAME);
$connecte = isset($_SESSION['user_id']);
$admin = $connecte && isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;

switch ($page) {
    case 'index':
        if ($admin) {
            echo "<hr class=\"h-[5px] border-0 bg-gradient-to-r from-cyan-400 to-gray-950\">
            <footer class=\"w-full bg-black text-white font-kings h-24 mt-auto\">
                <div class=\"mx-9 py-6 flex justify-between items-center h-full\">
                    <div class=\"text-2xl\">
                        <span class=\"text-cyan-400\">Azim.404</span> - Administration
                    </div>
                    <a href=\"http://github.com/sofiane224434\" class=\"hover:text-cyan-300 transition-colors duration-300\"><img class = \"w-20 h-20 invert\" src=\"asset/images/github.png\" alt=\"GitHub Icon\"/></a>
                    <div class=\"flex gap-8 text-lg\">
                        <a href=\"mailto:admin@Azim.404.com\" class=\"hover:text-cyan-300 transition-colors duration-300\">Contact Admin</a>
                        <span class=\"text-cyan-400\">© 2025 Azim.404</span>
                    </div>
                </div>
            </footer>";
        } elseif ($connecte) {
            echo "<hr class=\"h-[5px] border-0 bg-gradient-to-r from-cyan-400 to-gray-950\">
            <footer class=\"w-full bg-black text-white font-kings h-24 mt-auto\">
                <div class=\"mx-9 py-6 flex justify-between items-center h-full\">
                    <div class=\"text-2xl\">
                        <span class=\"text-cyan-400\">Azim.404</span> - Espace Membre
                    </div>
                    <a href=\"http://github.com/sofiane224434\" class=\"hover:text-cyan-300 transition-colors duration-300\"><img class = \"w-20 h-20 invert\" src=\"asset/images/github.png\" alt=\"GitHub Icon\"/></a>
                    <div class=\"flex gap-8 text-lg\">
                        <a href=\"mailto:support@Azim.404.com\" class=\"hover:text-cyan-300 transition-colors duration-300\">Support</a>
                        <span class=\"text-cyan-400\">© 2025 Azim.404</span>
                    </div>
                </div>
            </footer>";
        } else {
            echo "<hr class=\"h-[5px] border-0 bg-gradient-to-r from-cyan-400 to-gray-950\">
            <footer class=\"w-full bg-black text-white font-kings h-24 mt-auto\">
                <div class=\"mx-9 py-6 flex justify-between items-center h-full\">
                    <div class=\"text-2xl\">
                        Bienvenue sur <span class=\"text-cyan-400\">Azim.404</span>
                    </div>
                    <a href=\"http://github.com/sofiane224434\" class=\"hover:text-cyan-300 transition-colors duration-300\"><img class = \"w-20 h-20 invert\" src=\"asset/images/github.png\" alt=\"GitHub Icon\"/></a>
                    <div class=\"flex gap-8 text-lg\">
                        <a href=\"mailto:contact@Azim.404.com\" class=\"hover:text-cyan-300 transition-colors duration-300\">Contact</a>
                        <span class=\"text-cyan-400\">© 2025 Azim.404</span>
                    </div>
                </div>
            </footer>";
        }
        break;

    case 'connexion':
        echo "<hr class=\"h-[5px] border-0 bg-gradient-to-r from-cyan-400 to-gray-950\">
        <footer class=\"w-full bg-black text-white font-kings h-24 mt-auto\">
            <div class=\"mx-9 py-6 flex justify-between items-center h-full\">
                <div class=\"text-2xl\">
                    Connectez-vous à <span class=\"text-cyan-400\">Azim.404</span>
                </div>
                <div class=\"flex gap-8 text-lg\">
                    <a href=\"inscription.php\" class=\"hover:text-cyan-300 transition-colors duration-300\">Pas encore inscrit ?</a>
                    <span class=\"text-cyan-400\">© 2025 Azim.404</span>
                </div>
            </div>
        </footer>";
        break;

    case 'inscription':
        echo "<hr class=\"h-[5px] border-0 bg-gradient-to-r from-cyan-400 to-gray-950\">
        <footer class=\"w-full bg-black text-white font-kings h-24 mt-auto\">
            <div class=\"mx-9 py-6 flex justify-between items-center h-full\">
                <div class=\"text-2xl\">
                    Rejoignez <span class=\"text-cyan-400\">Azim.404</span> dès maintenant
                </div>
                <div class=\"flex gap-8 text-lg\">
                    <a href=\"connexion.php\" class=\"hover:text-cyan-300 transition-colors duration-300\">Déjà inscrit ?</a>
                    <span class=\"text-cyan-400\">© 2025 Azim.404</span>
                </div>
            </div>
        </footer>";
        break;

    case 'profil':
        if ($admin) {
            echo "<hr class=\"h-[5px] border-0 bg-gradient-to-r from-cyan-400 to-gray-950\">
            <footer class=\"w-full bg-black text-white font-kings h-24 mt-auto\">
                <div class=\"mx-9 py-6 flex justify-between items-center h-full\">
                    <div class=\"text-2xl\">
                        Profil <span class=\"text-cyan-400\">Administrateur</span>
                    </div>
                    <div class=\"flex gap-8 text-lg\">
                        <a href=\"admin.php\" class=\"hover:text-cyan-300 transition-colors duration-300\">Retour Admin</a>
                        <span class=\"text-cyan-400\">© 2025 Azim.404</span>
                    </div>
                </div>
            </footer>";
        } else {
            echo "<hr class=\"h-[5px] border-0 bg-gradient-to-r from-cyan-400 to-gray-950\">
            <footer class=\"w-full bg-black text-white font-kings h-24 mt-auto\">
                <div class=\"mx-9 py-6 flex justify-between items-center h-full\">
                    <div class=\"text-2xl\">
                        Mon <span class=\"text-cyan-400\">Profil</span>
                    </div>
                    <div class=\"flex gap-8 text-lg\">
                        <a href=\"index.php\" class=\"hover:text-cyan-300 transition-colors duration-300\">Retour Accueil</a>
                        <span class=\"text-cyan-400\">© 2025 Azim.404</span>
                    </div>
                </div>
            </footer>";
        }
        break;

    case 'admin':
        echo "<hr class=\"h-[5px] border-0 bg-gradient-to-r from-cyan-400 to-gray-950\">
        <footer class=\"w-full bg-black text-white font-kings h-24 mt-auto\">
            <div class=\"mx-9 py-6 flex justify-between items-center h-full\">
                <div class=\"text-2xl\">
                    Panneau <span class=\"text-cyan-400\">Administrateur</span>
                </div>
                <div class=\"flex gap-8 text-lg\">
                    <span class=\"text-gray-400\">Accès Sécurisé</span>
                    <span class=\"text-cyan-400\">© 2025 Azim.404</span>
                </div>
            </div>
        </footer>";
        break;

    default:
        echo "<hr class=\"h-[5px] border-0 bg-gradient-to-r from-cyan-400 to-gray-950\">
        <footer class=\"w-full bg-black text-white font-kings h-24 mt-auto\">
            <div class=\"mx-9 py-6 flex justify-between items-center h-full\">
                <div class=\"text-2xl\">
                    <span class=\"text-cyan-400\">Azim.404</span>
                </div>
                <div class=\"text-lg\">
                    <span class=\"text-cyan-400\">© 2025 Azim.404</span>
                </div>
            </div>
        </footer>";
        break;
}
?>