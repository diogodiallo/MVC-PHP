<?php

    function get_all_comments($id)
    {
        $db     = connect();
        $req    = $db->prepare("SELECT comment_id, id_post, author, message, created_at FROM comments WHERE id_post = :id_post ");
        
        $req->execute(["id_post" => $id ]);

        $comments = $req->fetchAll();

        $req->closeCursor();
            
            return $comments;
    }

    function get_one_comment($id)
    {
        $db     = connect();
        $req    = $db->prepare("SELECT comment_id, id_post, author, message, created_at FROM comments WHERE comment_id = :comment_id");
        $req->execute(["comment_id" => $id]);

        $comment   = $req->fetch();

        $req->closeCursor();

            return $comment;
    }

    function get_one_post($id)
    {
        $db     = connect();
        $req    = $db->prepare("SELECT post_id, title, content, created_at, photos FROM posts WHERE post_id = :post_id");
        $req->execute(["post_id" => $id]);

        $post   = $req->fetch();

        $req->closeCursor();

            return $post;
    }

    function insert_comments($id, $author, $message)
    {
        $db     = connect();
        $req    = $db->prepare("INSERT INTO comments(id_post, author, message)  VALUES(:id_post, :author, :message)");
        $comment_added = $req->execute([
                                        "id_post" => $id,
                                        "author"  => $author,
                                        "message" => $message
                                    ]);

        $req->closeCursor();

            return $comment_added;
    }

    function update_comment($id, $author, $message)
    {
        $db     = connect();
        $req    = $db->prepare("UPDATE comments 
                                SET author =:author, message =:message 
                                WHERE comment_id =:comment_id
                            ");
        $update = $req->execute([
                                "comment_id"    => $id, 
                                "author"        => $author, 
                                "message"       => $message
                            ]);

        $req->closeCursor();

            return $update;
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