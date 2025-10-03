<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/output.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <link rel="shortcut icon" href="asset/images/azim404.ico" type="image/x-icon">
    <title>Azim404</title>
</head>

<body class="min-h-screen flex flex-col">
    <?php require_once "header.php"; ?>
    <main class="bg-[url('/asset/images/background.jpg')]   bg-cover bg-center bg-no-repeat bg-fixed min-h-screen">
        <h1
            class="my-6 text-3xl font-extrabold tracking-tight text-center bg-gradient-to-r from-blue-500 via-cyan-500 to-emerald-500 bg-clip-text text-transparent ">
            Mes sites :
        </h1>
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-sm bg-black border border-gray-200 rounded-lg shadow-sm">
                <a href="https://sofiane-kherarfa.students-laplateforme.io/Malaisie">
                    <img class="rounded-t-lg" src="asset/images/malaisie.png" alt="" />
                </a>
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white font-kings">Fansite Malaisie
                    </h5>
                    <p class="mb-3 font-normal text-white ">Ceci est mon site consacré à la
                        malaisie</p>
                </div>
            </div>
        </div>
    </main>
    <?php require_once "footer.php"; ?>
</body>

</html>