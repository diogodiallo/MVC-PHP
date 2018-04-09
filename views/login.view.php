<?php

    ob_start();

    $title = "Se connecter";

?>

<section class="row">
    <div class="card col">
        <div class="card-body form-group">
            <h4 class="card-title btn btn-info">Je veux me connecté</h4>

            <?php if(!empty($errors)): ?>
                <div class="alert alert-danger">
                    <?php foreach($errors as $error): ?>
                        <?= $error; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="./login.php" method="POST">
                <p>
                    <label for="identifiant" class="control-label">Votre identifiant</label>
                    <input type="text" name="identifiant" id="identifiant" value="" placeholder="Entrez votre pseudo/e-mail" class="form-control">
                </p>
                <p>
                    <label for="password" class="control-label">Votre mot de passe</label>
                    <input type="password" name="password" id="password" value="" placeholder="Entrez votre mot de passe" class="form-control">
                </p>
                <p>
                    <input type="submit" name="connection" value="Connexion" class="btn btn-primary btn-lg">
                </p>
            </form>
        </div>
    </div>
</section>

<?php 
    $content = ob_get_clean();

    require("template.view.php");
?>