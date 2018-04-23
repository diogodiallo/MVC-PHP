<?php 

    function display_all_users()
    {
        $db = connect();

        $req = $db->query("SELECT id, pseudo, password, email FROM users");

        $req->closeCursor();

            return $display_users;
    }

    function display_user_by_field($field, $value)
    {
        $db = connect();

        $req = $db->prepare("SELECT id FROM users WHERE $field = :value");
        $req->execute(["value" => $value]);

        $count_user = $req->rowCount();

        $req->closeCursor();

            return $count_user;
    }

    function insert_user($pseudo, $password, $email)
    {
        $db = connect();
        
        $password_hash  = password_hash($password, PASSWORD_BCRYPT);

        $query          = $db->prepare("INSERT INTO users(pseudo, password, email) VALUES(:pseudo, :password, :email)");

        $insert_user    = $query->execute(["pseudo" => $pseudo, "password" => $password_hash, "email" => $email]);

            return $insert_user;
    }

    function update_user_data($id, $pseudo, $password)
    {
        $db = connect();

        $req = $db->prepare("UPDATE users SET pseudo = :pseudo, password = :password WHERE id = :id");
        $req->execute(["id" => $id, "pseudo" => $pseudo, "password" => $password]);

        $update = $req->fetch();

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