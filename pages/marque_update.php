<?php

ob_start();
// php
$title = "Modifier";

if (!isset($_GET['id'])) {
    $_SESSION['flash']['danger'] = 'Id introuvable';
    header('Location: marques');
    die();
}

$id = (int)$_GET['id'];

if ($id == 0) {
    $_SESSION['flash']['danger'] = 'Id introuvable';
    header('Location: marques');
    die();
}


$marque_name = $pdo->query("SELECT nom FROM marques WHERE id = $id")->fetch()->nom;

$errors = [];

if (isset($_POST['marque_update'])) {

    $nom = _string($_POST['nom']);
    $req = $pdo->prepare('SELECT id FROM marques WHERE nom = ? LIMIT 1');
    $req->execute([$nom]);
    $maruqe = $req->fetch();

    if (empty($_POST['nom']) or !preg_match('/^[0-9a-zA-Z ]+$/', $_POST['nom']) or $maruqe or strlen($_POST['nom']) < 2 or strlen($_POST['nom']) > 20) {

        if (empty($_POST['nom'])) {
            $errors["nom"] = "Veuillez saisir le nom de la marque SVP ";
        }
        if (!preg_match('/^[0-9a-zA-Z ]+$/', $_POST['nom'])) {
            $errors["nom"] = "Veuillez entrer des caractères alphabétique ";
        }

        if (strlen($_POST['nom']) < 2) {
            $errors["nom"] = "Veuillez entrer plus que 1 caractère ";
        }

        if (strlen($_POST['nom']) > 20) {
            $errors["nom"] = "Veuillez entrer moin que 20 caractères ";
        }

        if ($maruqe) {
            $errors["nom"] = 'Cette marque est déjà existe';
        }

        $nom_class_input = "is-invalid";
        $nom_class_feedback = "invalid-feedback";
    }

    // dd($_POST['nom']);
    // die();


    if (empty($errors)) {
        $user = $pdo->prepare("UPDATE marques SET 
                nom = :nom WHERE id = :id
        ");
        $user->execute(
            [
                'id' => $id,
                'nom' => $nom
            ]
        );
        $_SESSION['flash']['success'] = 'Bien modifier';
        header('Location: marques');
        die();
    }
}

$content_php = ob_get_clean();


ob_start(); ?>

<h3 class="mb-3">Modifier <?= $marque_name ?></h3>


<div class="row justify-content-md-center ">
    <div class="col-6">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4>Modifier <?= $marque_name ?></h4>
            </div>

            <div class="card-body">
                <a href="marques" class="btn btn-secondary mb-3">
                    <i class="fas fa-undo"></i>
                    Liste des marques
                </a>

                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger shadow mb-4">
                        <h5>
                            Vous n'avez pas rempli le formulaire correctement
                        </h5>

                        <ul class="list-group list-group-flush">
                            <?php foreach ($errors as $key => $e) : ?>
                                <li class="list-group-item bg-transparent">
                                    <b><?= ucfirst($key) ?></b> - <?= $e ?>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>

                <form method="post">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Marque</label>

                        <input name="nom" type="text" class="form-control <?= $nom_class_input ?? "" ?>" value="<?= $marque_name ?>" id="nom" placeholder="Nike">

                        <div class="<?= $nom_class_feedback ?? "" ?> fw-bold">
                            <?= $errors['nom'] ?? "" ?>
                        </div>
                    </div>

                    <button type="submit" name="marque_update" class="btn btn-success">Modifier</button>
                </form>

            </div>
        </div>
    </div>
</div>

<?php $content_html = ob_get_clean(); ?>