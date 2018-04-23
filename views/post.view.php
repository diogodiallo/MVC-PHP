<div class="container">
    <div class="row">
        <?php foreach($posts as $post): ?>
            <div class="card col">
                <div class="card-block">
                    <div class="card-header">
                        <h3 class="card-title">
                            <?= $post->title; ?><br>
                            <em class="text-info leader"> le : <?= date("d-m-Y H:i", strtotime($post->created_at)); ?> </em>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php if(isset($post->photos)): ?>
                            <img src="images/<?= $post->photos; ?>" alt="<?= $post->photos; ?>" class="card-img">
                        <?php else: ?>
                            <img src="images/card-img.svg" alt="Card img cap" class="card-img">
                        <?php endif; ?>

                        <?= $post->content; ?>
                    </div>
                    <div class="card-text text-center">
                        <a href="comment.php?post_id=<?= $post->post_id; ?>" class="btn btn-primary">
                            Ajouter un commentaire
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require("views/template.view.php"); ?>