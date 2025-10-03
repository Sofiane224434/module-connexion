<?php
require_once "src/verification.php";
verifier_session();
$page = pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_FILENAME);
$connecte = isset($_SESSION['user_id']);
$admin = $connecte && isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;

switch ($page) {
    case 'index':
        if ($admin) {
            echo "<header class=\"w-full h-37.5 bg-black\">
                    <div class=\"mx-9 flex justify-between gap-4 text-white text-5xl font-kings pt-5\">
                    <a href=\"index.php\" class=\"mt-14  relative text-cyan-500 after:content-[''] after:absolute after:bottom-[12.5px] after:left-0 after:w-full after:h-[7.5px] after:bg-cyan-400 after:rounded-full\">Accueil</a>
                    <h1 class=\"text-9xl relative left-8\">Azim.404</h1>
                    <a href=\"admin.php\" class=\"mt-14 hover:text-cyan-300 transition-colors duration-300\">admin</a>  
                    <a href=\"profil.php\" class=\"mt-14 hover:text-cyan-300 transition-colors duration-300\">profil</a>
                    <a href=\"src/logout.php\" class=\"mt-14 hover:text-red-500 transition-colors duration-300\">X</a>  
                    </div>
                </header>
            ";
        } elseif ($connecte) {
            echo "<header class=\"w-full h-37.5 bg-black\">
                    <div class=\"mx-9 flex justify-between gap-4 text-white text-5xl font-kings pt-5\">
                    <a href=\"index.php\" class=\"mt-14  relative text-cyan-500 after:content-[''] after:absolute after:bottom-[12.5px] after:left-0 after:w-full after:h-[7.5px] after:bg-cyan-400 after:rounded-full\">Accueil</a>
                    <h1 class=\"text-9xl relative right-7.75\">Azim.404</h1>
                    <a href=\"profil.php\" class=\"mt-14 hover:text-cyan-300 transition-colors duration-300 relative left-15.75\">profil</a> 
                    <a href=\"src/logout.php\" class=\"mt-14 hover:text-red-500 transition-colors duration-300\">X</a>   
                    </div>
                </header>
            ";
        } else {
            echo "<header class=\"w-full h-37.5 bg-black\">
                    <div class=\"mx-9 flex justify-between gap-4 text-white text-5xl font-kings pt-5\">
                    <a href=\"index.php\" class=\"mt-14  relative text-cyan-500 after:content-[''] after:absolute after:bottom-[12.5px] after:left-0 after:w-full after:h-[7.5px] after:bg-cyan-400 after:rounded-full\">Accueil</a>
                    <h1 class=\"text-9xl relative left-14\">Azim.404</h1>
                    <a href=\"inscription.php\" class=\"mt-14 hover:text-cyan-300 transition-colors duration-300 relative left-5\">Inscription</a>
                    <a href=\"connexion.php\" class=\"mt-14 hover:text-cyan-300 transition-colors duration-300\">Connexion</a>
                    </div>
                </header>
            ";
        }
        break;

    case "connexion":
        echo "<header class=\"w-full h-37.5 bg-black\">
                    <div class=\"mx-9 flex justify-between gap-4 text-white text-5xl font-kings pt-5\">
                    <a href=\"index.php\" class=\"mt-14 hover:text-cyan-300 transition-colors duration-300\">Accueil</a>
                    <h1 class=\"text-9xl relative left-14\">Azim.404</h1>
                    <a href=\"inscription.php\" class=\"mt-14 hover:text-cyan-300 transition-colors duration-300 relative left-5\">Inscription</a>
                    <a href=\"connexion.php\" class=\"mt-14  relative text-cyan-500 after:content-[''] after:absolute after:bottom-[12.5px] after:left-0 after:w-full after:h-[7.5px] after:bg-cyan-400 after:rounded-full\">Connexion</a>
                    </div>
                </header>
            ";
        break;

    case "inscription":
        echo "<header class=\"w-full h-37.5 bg-black\">
                    <div class=\"mx-9 flex justify-between gap-4 text-white text-5xl font-kings pt-5\">
                    <a href=\"index.php\" class=\"mt-14 hover:text-cyan-300 transition-colors duration-300\">Accueil</a>
                    <h1 class=\"text-9xl relative left-14\">Azim.404</h1>
                    <a href=\"inscription.php\" class=\"mt-14  relative text-cyan-500 after:content-[''] after:absolute after:bottom-[12.5px] after:left-0 after:w-full after:h-[7.5px] after:bg-cyan-400 after:rounded-full left-5\">Inscription</a>
                    <a href=\"connexion.php\" class=\"mt-14 hover:text-cyan-300 transition-colors duration-300\">Connexion</a>
                    </div>
                </header>
            ";
        break;

    case 'profil':
        if ($admin) {
            echo "<header class=\"w-full h-37.5 bg-black\">
                    <div class=\"mx-9 flex justify-between gap-4 text-white text-5xl font-kings pt-5\">
                    <a href=\"index.php\" class=\"mt-14 hover:text-cyan-300 transition-colors duration-300\">Accueil</a>
                    <h1 class=\"text-9xl relative left-8\">Azim.404</h1>
                    <a href=\"admin.php\" class=\"mt-14 hover:text-cyan-300 transition-colors duration-300\">admin</a>  
                    <a href=\"profil.php\" class=\"mt-14  relative text-cyan-500 after:content-[''] after:absolute after:bottom-[12.5px] after:left-0 after:w-full after:h-[7.5px] after:bg-cyan-400 after:rounded-full\">profil</a>
                    <a href=\"src/logout.php\" class=\"mt-14 hover:text-red-500 transition-colors duration-300\">X</a>  
                    </div>
                </header>
            ";
        } else {
            echo "<header class=\"w-full h-37.5 bg-black\">
                    <div class=\"mx-9 flex justify-between gap-4 text-white text-5xl font-kings pt-5\">
                    <a href=\"index.php\" class=\"mt-14 relative hover:text-cyan-300 transition-colors duration-300\">Accueil</a>
                    <h1 class=\"text-9xl relative right-7.75\">Azim.404</h1>
                    <a href=\"profil.php\" class=\"mt-14 text-cyan-500 after:content-[''] after:absolute after:bottom-[12.5px] after:left-0 after:w-full after:h-[7.5px] after:bg-cyan-400 after:rounded-full relative left-15.75\">profil</a> 
                    <a href=\"src/logout.php\" class=\"mt-14 hover:text-red-500 transition-colors duration-300\">X</a>   
                    </div>
                </header>
            ";
        }
        break;

    case 'admin':
        echo "<header class=\"w-full h-37.5 bg-black\">
                    <div class=\"mx-9 flex justify-between gap-4 text-white text-5xl font-kings pt-5\">
                    <a href=\"index.php\" class=\"mt-14 hover:text-cyan-300 transition-colors duration-300\">Accueil</a>
                    <h1 class=\"text-9xl relative left-8\">Azim.404</h1>
                    <a href=\"admin.php\" class=\"mt-14  relative text-cyan-500 after:content-[''] after:absolute after:bottom-[12.5px] after:left-0 after:w-full after:h-[7.5px] after:bg-cyan-400 after:rounded-full\">admin</a>  
                    <a href=\"profil.php\" class=\"mt-14 hover:text-cyan-300 transition-colors duration-300\">profil</a>
                    <a href=\"src/logout.php\" class=\"mt-14 hover:text-red-500 transition-colors duration-300\">X</a>  
                    </div>
                </header>
            ";
        break;
}
?>