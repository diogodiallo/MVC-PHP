<?php 
    ob_start();
        $title = "NOT FOUND PAGE";
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?= $error_throw; ?></h3>
        <div class="card-body">
            <img src="public/images/not-found-page.png" alt="Img card" class="card-img">
            <p>
                Oouuuups!! Cette page est inaccessible ou inexistant. 
            </p>
        </div>
    </div>
</div>

<?php 
    $content = ob_get_clean();
    require("views/template.view.php");
?>