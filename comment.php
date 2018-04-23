<?php 
    require("models/comment_model.php");

        $post_id    = intval($_GET["post_id"]);
        $post       = get_one_post($post_id);
        $comments   = get_all_comments($post_id);

        $errors     = [];

        if (isset($_GET["post_id"]) &&  !empty($_GET["post_id"])) 
        {
            if(isset($_POST["comment"]))
            {
                array_pop($_POST);
                extract($_POST);

                $insert = insert_comments($post_id, $author, $message);

                if ($insert) {
                    header("Location: comment.php?post_id=". $_GET["post_id"]);
                    exit();
                }
            }
        }
        
    require("views/comment.view.php");