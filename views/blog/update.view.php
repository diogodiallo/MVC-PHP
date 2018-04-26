<?php
    ob_start();

    $title = "Modifier le commentaire";

?>

<section class="row">
    <div class="card col">
        <div class="card-header">
            <h4 class="card-title">Je veux modifier mon commentaire</h4>
        </div>
        <div class="card-body form-group">

            <?php include("inc/errors_display.php"); ?>

            <form action="index.php?action=modify_comment&amp;comment_id=<?= $_GET["comment_id"]; ?>" method="POST">
                <p>
                    <label for="author" class="control-label">Votre nom</label>
                    <input type="text" name="author" id="author" 
                            value="<?= $comment->author; ?>" 
                            placeholder="Entrez votre pseudo" class="form-control">
                </p>
                <p>
                    <label for="message" class="control-label">Votre message</label>
                    <textarea  name="message" id="message" rows="10" placeholder="Entrez votre message ici" class="form-control">
                        <?= $comment->message; ?>
                    </textarea>
                </p>
                <p>
                    <input type="submit" name="update" value="Envoyer" class="btn btn-default btn-lg">
                </p>
            </form>

        </div>
    </div>
</section>

<?php 
    $content = ob_get_clean();

    require("views/template.view.php");
?>