<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.0.0/darkly/bootstrap.min.css">
        <title>Administration</title>
    </head>
    <body>
        <?php require("inc/nav.php"); ?>

        <main role="main">
            <div class="container">
                <?= $content; ?>
            </div>
        </main>
            
        <?php require("inc/footer.php"); ?>
        
        
    </body>
</html>