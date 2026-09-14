<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Emprunts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="d-flex">

    <div class="bg-dark text-white p-3" style="width:250px; min-height:100vh;">
        <h4 class="text-center">📚 Admin</h4>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="../auteurs/list.php" class="nav-link text-white">👤 Auteurs</a>
            </li>
            <li class="nav-item mb-2">
                <a href="../livres/list.php" class="nav-link text-white">📖 Livres</a>
            </li>
            <li class="nav-item mb-2">
                <a href="../lecteurs/list.php" class="nav-link text-white">👥 Lecteurs</a>
            </li>
            <li class="nav-item mb-2">
                <a href="../emprunts/list.php" class="nav-link text-white">🔄 Emprunts</a>
            </li>
            <li class="nav-item mb-2">
                <a href="../search.php" class="nav-link text-white">🔍 Recherche</a>
            </li>
            <li class="nav-item mb-2">
                <a href="../stats.php" class="nav-link text-white">📊 Statistiques</a>
            </li>
        </ul>
    </div>

    <div class="container-fluid p-4">
        <a href="../logout.php" class="btn btn-danger">🚪 Déconnexion</a>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Liste des emprunts</h2>
            <a href="add.php" class="btn btn-primary">➕ Ajouter</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">

                <ul class="list-group">
                    <?php foreach ($emprunts as $emprunt): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>
                                <?=$emprunt['titre']?> - <?=$emprunt['date_emprunt']?> (<?=$emprunt['lecteur']?>)
                            </span>
                            <?php if (!$emprunt['returned']): ?>
                               <form action="./return.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $emprunt['id'] ?>">
                                <input type="hidden" name="book_id" value="<?= $emprunt['livre_id'] ?>">
    
                                <button type="submit" class="btn btn-sm btn-success">
                                    Return
                                </button>
                               </form>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>
        </div>

    </div>

</div>

</body>
</html>