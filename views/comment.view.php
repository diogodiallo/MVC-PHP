<?php
    ob_start();

    $title = "Commenter l'article";
?>

<div class="row">
    <div class="card">
        <h3 class="card-header"><?= ucfirst($post->title); ?> 
            <em class="leader"><?= date("d-m-Y á H:i:s", strtotime($post->created_at)); ?></em> 
        </h3>
        <div class="card-body">
            <?= $post->content; ?>
        </div>
    </div>
</div><hr>

<div class="row">
    <?php foreach($comments as $comment): ?>
        <div class="card col">
            <h4 class="card-header"><?= ucfirst($comment->author); ?> dit : 
                    <em class="leader">le <time><?= date("d-m-Y á H:i:s", strtotime($comment->created_at)); ?></time></em> 
            </h4>
            <div class="card-blocks">
                <?= $comment->message; ?>
                <em>Voulez-vous <a href="update.php?comment_id=<?= $comment->comment_id; ?>">modifier cet article?</a></em>
            </div>
        </div>
    <?php endforeach; ?>
</div><hr>

<section class="row">
    <div class="card col">
        <div class="card-header">
            <h4 class="card-title">Je veux commenter</h4>
        </div>
        <div class="card-body form-group">

            <?php include("inc/errors_display.php"); ?>

            <form action="comment.php?post_id=<?= $post_id; ?>" method="POST">
                <p>
                    <label for="author" class="control-label">Votre nom</label>
                    <input type="text" name="author" id="author" 
                            value="<?= isset($_POST['author']) ? htmlspecialchars($_POST['author']) : ''; ?>" 
                            placeholder="Entrez votre pseudo" class="form-control">
                </p>
                <p>
                    <label for="message" class="control-label">Votre message</label>
                    <textarea  name="message" id="message" rows="10" placeholder="Entrez votre message ici" class="form-control">
                    <?= isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : ''; ?>
                    </textarea>
                </p>
                <p>
                    <input type="submit" name="comment" value="Envoyer" class="btn btn-default btn-lg">
                </p>
            </form>

        </div>
    </div>
</section>

<?php 
    $content = ob_get_clean();

    require("template.view.php");
?>