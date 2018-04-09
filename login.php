<?php
    session_start();

    require("db/database.php");

    array_pop($_POST);
    extract($_POST);

    $identifiant = htmlspecialchars(trim($identifiant));
    $password    = htmlspecialchars(trim($password));
    $errors      = [];
    $success     = "";


    //Recuperation de la liste des membres inscrit pour comparer
    $query              = $db->prepare("SELECT id, pseudo, email, password, status 
                                        FROM users 
                                        WHERE (pseudo = :identifiant OR email = :identifiant)");
    $query->execute(["identifiant" => $identifiant]);

    $user               = $query->fetch();

    $password_verify    = password_verify($password, $user->password);

    if(isset($_POST["connection"]))
    {
        if (!$user) 
        {
            $errors[] .= "<p>Vos identifiants/mot de passe sont incorrects.</p>";
        }else {
            if($password_verify)
            {
                $_SESSION["id"]     = $user->id;
                $_SESSION["pseudo"] = $user->pseudo;
                $_SESSION["email"]  = $user->email;
                $_SESSION["status"] = $user->status;

                $success .= "<p>Vous êtes connecté. On est content de vous voir M. ". ucfirst($_SESSION["pseudo"]) ."</p>";

                header("Location:admin/index.php");
                exit();
            }else {
                $errors[] .= "<p>Vos identifiants/mot de passe sont incorrects.</p>";
            }
        }
    }

    require("views/login.view.php");