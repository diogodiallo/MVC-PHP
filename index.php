<?php
    require("controllers/controller.php");

try {
    if (isset($_GET["action"])) {
        if($_GET["action"] == "home")
        {
            home();
        }else if ($_GET["action"] == "posts") {
            all_posts();
        }else if ($_GET["action"] == "post") {
            if(isset($_GET["post_id"]) && !empty($_GET["post_id"]) && $_GET["post_id"] > 0)
            {
                one_post();
            }
        }else if ($_GET["action"] == "add_comment") {
            if(isset($_GET["post_id"]) &&  !empty($_GET["post_id"]) && $_GET["post_id"] > 0)
            {
                //$post_id = $_GET["post_id"];
                array_pop($_POST);
                extract($_POST);
                $errors = [];

                
                if(!empty($author) && !empty($message))
                {
                    add_comment($_GET["post_id"], $author, $message);
                    
                }else {
                    $errors[] = "Tous les champs doivent être renseignés.";
                }
                
            }else {
                $errors[] = "Aucun identifiant trouvé pour cet article.";
            }
        }else if ($_GET["action"] == "modify_comment") {
            $comment    = one_comment($_GET["comment_id"]);
            if (isset($_GET["comment_id"]) &&  !empty($_GET["comment_id"]) && $_GET["comment_id"] > 0 )
            {
                array_pop($_POST);
                extract($_POST);

                if (!empty($author) && !empty($message)) {
                    modify_comment($_GET["comment_id"], $author, $message);
                }else {
                    throw new Exception("Tous les champs sont obligatoires, veuillez les remplir svp.");
                }
            }
        }else {
            home();
        }
    }
}catch(Exception $e) {
    $error_throw = $e->getMessage() ." et code : ". $e->getCode();
    require("views/error_throw.view.php");
}