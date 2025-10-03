<?php require_once "src/db.php";
require_once "src/verification.php";
verifier_connected();
verifier_admin();

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
        <div>
            <section class="max-w-5xl mx-auto px-6 py-8">
                <header class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Liste des utilisateurs</h1>
                    <p class="text-sm text-gray-500">Consultez les comptes enregistrés sur la plateforme.</p>
                </header>
                <?php
                $sql = "SELECT * FROM utilisateurs";
                $stmt = $connexion->query($sql);
                $users = $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
                ?>

                <?php if (!empty($users)): ?>
                    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 text-sm">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            ID</th>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            Email</th>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            Username</th>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            Nom</th>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            Prénom</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <?php foreach ($users as $row): ?>
                                        <tr class="odd:bg-white even:bg-gray-50 hover:bg-indigo-50/60 transition">
                                            <td class="px-4 py-3 text-gray-700"><?= htmlspecialchars($row['id']) ?></td>
                                            <td class="px-4 py-3 text-gray-700"><?= htmlspecialchars($row['email']) ?></td>
                                            <td class="px-4 py-3 text-gray-700"><?= htmlspecialchars($row['username']) ?></td>
                                            <td class="px-4 py-3 text-gray-700"><?= htmlspecialchars($row['nom']) ?></td>
                                            <td class="px-4 py-3 text-gray-700"><?= htmlspecialchars($row['prenom']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php else: ?>
                    <div
                        class="rounded-xl border border-dashed border-gray-300 bg-gray-50 px-6 py-10 text-center text-sm text-gray-500">
                        Aucun utilisateur trouvé pour le moment.
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </main>
    <?php require_once "footer.php"; ?>
</body>

</html>