<?php
    ob_start();
    $title = "Nos articles";
?>
<div class="container">
    <div class="row">
        <?php foreach($posts as $post): ?>
            <div class="card col">
                <div class="card-block">
                    <div class="card-header">
                        <h3 class="card-title lead">
                        <a href="index.php?action=post&amp;post_id=<?= $post->post_id; ?>" class="">
                            <?= $post->title; ?>
                        </a><br>
                            <em class="text-info leader"> le : <?= date("d-m-Y H:i", strtotime($post->created_at)); ?> </em>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php if(isset($post->photos)): ?>
                            <img src="public/images/<?= $post->photos; ?>" alt="<?= $post->photos; ?>" class="card-img">
                        <?php else: ?>
                            <img src="images/card-img.svg" alt="Card img cap" class="card-img">
                        <?php endif; ?>

                        <?= $post->content; ?>
                    </div>
                    <div class="card-text text-center">
                        <a href="index.php?action=post&amp;post_id=<?= $post->post_id; ?>" class="btn btn-primary">
                            Ajouter un commentaire
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
    $content = ob_get_clean();
    require("views/template.view.php"); 
?>