<?php 
    require("models/post_model.php");

        $posts = get_all_posts();
        
    require("views/post.view.php");