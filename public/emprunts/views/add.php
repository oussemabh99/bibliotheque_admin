<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un emprunt</title>
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

        <div class="mb-4">
            <h2>Ajouter un emprunt</h2>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">

<form method="POST" action="add.php">
    <div class="mb-3">
        <button type="submit" class="btn btn-warning">Ajouter</button>
        <a href="list.php" class="btn btn-secondary">Retour</a>
    </div>
    <div class="mb-3">
        <label class="form-label">Lecteur</label>
        <select name="nom" class="form-select" required>
            <option value="">Sélectionnez un lecteur</option>
            
            <?php 
               require_once '../../includes/get_lecteurs.php';
               $lecteurs = getLecteurs();
               foreach ($lecteurs as $lecteur): ?>
                <option value="<?= $lecteur['nom'] ?>">
                    <?= $lecteur['nom'] ?>
                </option>
            <?php endforeach; ?>                 
        </select>                       
    </div>

    <div class="mb-3">
        <label class="form-label">Livre</label>
        <select name="titre" class="form-select" required>
            <option value="">Sélectionnez un livre</option>
            
            <?php 
               require_once '../../includes/get_livre.php';
               $livres = getLivreWithNbrNotZero();
               foreach ($livres as $livre): ?>
                <option value="<?= $livre['titre'] ?>">
                    <?= $livre['titre'] ?>
                </option>
            <?php endforeach; ?>                 
        </select>                       
    </div>

    

</form>

            </div>
        </div>

    </div>

</div>

</body>
</html>