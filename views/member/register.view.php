<?php
    ob_start();

    $title = "S'inscrire";

?>

<section class="row">
    <div class="card col">
        <div class="card-body form-group">
            <h4 class="card-title btn btn-primary">Je souhaite m'inscrire</h4>
            
            <?php include("inc/errors_display.php"); ?>

            <form action="./register.php" method="POST" enctype="multipart/form-data">
                <p>
                    <label for="pseudo" class="control-label">Votre pseudonyme</label>
                    <input type="text" name="pseudo" id="pseudo" value="<?= isset($_POST['pseudo']) ? $_POST['pseudo'] : ''; ?>" placeholder="Entrez votre pseudo" class="form-control">
                </p>
                <p>
                    <label for="email" class="control-label">Votre adresse E-mail</label>
                    <input type="email" name="email" id="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>" placeholder="Entrez votre adresse e-mail" class="form-control">
                </p>
                <p>
                    <label for="password" class="control-label">Votre mot de passe</label>
                    <input type="password" name="password" id="password" value="" placeholder="Entrez votre mot de passe" class="form-control">
                </p>
                <p>
                    <input type="submit" name="send" value="S'inscrire maintenant" class="btn btn-default btn-lg">
                </p>
            </form>

        </div>
    </div>
</section>

<?php 
    $content = ob_get_clean();

    require("template.view.php");
?>