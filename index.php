<?php
    require("controllers/controller.php");

    if (isset($_GET["action"])) {
        if($_GET["action"] == "home")
        {
            home();
        }else if ($_GET["action"] == "posts") {
            all_posts();
        }else if ($_GET["action"] == "post") {
            if(isset($_GET["post_id"]) && $_GET["post_id"] > 0)
            {
                one_post();
            }
        }else if ($_GET["action"] == "add_comment") {
            if(isset($_GET["post_id"]) &&  !empty($_GET["post_id"]) && $_GET["post_id"] > 0)
            {
                $post_id = $_GET["post_id"];
                array_pop($_POST);
                extract($_POST);
                $errors = [];

                
                if(!empty($author) && !empty($message))
                {
                    add_comment($post_id, $author, $message);
                    
                }else {
                    $errors[] = "Tous les champs doivent être renseignés.";
                }
                
            }else {
                $errors[] = "Aucun identifiant trouvé pour cet article.";
            }
        }else {
            home();
        }
    }