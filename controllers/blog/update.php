<?php 

    $comment_id        = intval($_GET["comment_id"]);
    $comment           = get_one_comment($comment_id);

    $errors            = [];

    if (isset($comment_id) &&  !empty($comment_id)) 
    {
        if(isset($_POST["update"]))
        {
            array_pop($_POST);
            extract($_POST);

            $update = update_comment($comment_id, $author, $message);

            if ($update) {
                header("Location: post.php");
                exit();
            }else {
                $errors[] = "<p>Une erreur est survenue lors de la mise a jour du commentaire.</p>";
            }
        }
    }
        
    require("../views/blog/update.view.php");