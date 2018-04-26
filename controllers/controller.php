<?php
    require("./models/blog/blog_front.php");
    //require("../models/blog/post.php");
    //require("../models/blog/comment.php");

    function home()
    {
        require("./views/blog/home.view.php");
    }
    
    function all_posts()
    {
        $posts = get_all_posts();
        
        require("./views/blog/post.view.php");
    }

    function one_post()
    {
        $post       = get_one_post($_GET["post_id"]);
        $comments   = get_all_comments($_GET["post_id"]);
        
        require("./views/blog/comment.view.php");
    }

    function one_comment($id)
    {
        $comment = get_one_comment($_GET["comment_id"]);

        require("./views/blog/update.view.php");
    }

    function add_comment($id, $author, $message)
    {
        $insert = insert_comments($id, $author, $message);

        if($insert)
        {
            header("Location:index.php?action=post&post_id=". $id);
            exit();
        }else {
            throw new Exception("Une erreur est survenue lors de l'ajout de votre commentaire");
        }
    }

    function modify_comment($id, $author, $message)
    {
        $update = update_comment($id, $author, $message);

        if ($update !== false) {
            header("Location:index.php?action=posts");
            exit();
        }else {
            throw new Exception("Une erreur est survenue lors de la modification du commentaire.");
        }
    }