<?php

    function get_all_posts()
    {
        $db         = connect();
        $posts      = $db->query("SELECT post_id, published, title, slug, content, created_at, photos FROM posts");

            return $posts;
    }

    function connect()
    {
        define("DNS", "localhost");
        define("DB_NAME", "project_php");
        define("USER_NAME", "root");
        define("USER_PASSWORD", "root");

        $db = new PDO("mysql:host=". DNS .";dbname=". DB_NAME, USER_NAME, USER_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            return $db;
    }