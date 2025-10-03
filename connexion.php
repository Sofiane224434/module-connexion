<?php require_once "src/login.php";

?>
<!DOCTYPE html>
<html lang="fr" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/output.css">
    <link rel="shortcut icon" href="asset/images/azim404.ico" type="image/x-icon">
    <title>Azim404</title>
</head>

<body class="min-h-screen flex flex-col">
    <?php require_once "header.php"; ?>
    <main class="bg-[url('/asset/images/background.jpg')]   bg-cover bg-center bg-no-repeat bg-fixed min-h-screen">
        <div class="container mx-auto px-4 py-32">
            <form method="POST" action="connexion.php"
                class="max-w-sm mx-auto space-y-6 bg-white/80  p-6 rounded-lg shadow-lg">
                <div class="relative z-0 w-full group">
                    <input type="text" name="login" id="floating_email"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required>
                    <label for="floating_email"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Adresse
                        e-mail ou nom d'utilisateur</label>
                </div>
                <div class="relative z-0 w-full group">
                    <input type="password" name="password" id="floating_password"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required>
                    <label for="floating_password"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Mot
                        de passe</label>
                </div>
                <button type="submit"
                    class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white  focus:ring-4 focus:outline-none focus:ring-cyan-200 ">
                    <span
                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white  rounded-md group-hover:bg-transparent ">
                        Se connecter</span>
            </form>
        </div>
        <div class="space-y-4">
            <?php if (!empty($erreur)): ?>
                <div id="alert-error "
                    class="flex items-center p-4 text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Zm0 4a1 1 0 1 1-1 1 1 1 0 0 1 1-1Zm1.25 11.5h-2.5a.75.75 0 0 1 0-1.5h.5V11h-.5a.75.75 0 0 1 0-1.5h2a.75.75 0 0 1 .75.75v5.75h.5a.75.75 0 0 1 0 1.5Z" />
                    </svg>
                    <span class="sr-only">Error</span>
                    <div class="ms-3 text-sm font-medium">
                        <?= htmlspecialchars($erreur); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>
    <?php require_once "footer.php"; ?>
</body>

</html>