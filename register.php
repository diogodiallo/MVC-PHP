<?php
    require("db/database.php");
    
    array_pop($_POST);
    extract($_POST);

    $pseudo     = strip_tags(trim($pseudo));
    $email      = strip_tags(strtolower(trim($email)));
    $password   = strip_tags(trim($password));
    $errors     = [];

    // Recuperation du nombre, du pseudo et de l'email des utilisateurs
    $req            = $db->prepare("SELECT id, COUNT(id), pseudo, email FROM users WHERE pseudo = :pseudo AND email = :email;");
    $counter_user   = $req->execute(["pseudo" => $pseudo, "email" => $email]);
    
    // Traitement du formulaire d'inscription
    if (isset($_POST["send"]) && !empty($_POST["send"])) 
    {
        if(empty($pseudo) && empty($email) && empty($password)) 
        {
            $errors[] .= "<p>Tous les champs sont recquis, veuillez vérifier.</p>";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $errors[] .= "<p>Veuillez entré une adresse E-mail valide.</p>";
        }

        if ($counter_pseudo == 1) 
        {
            $errors[] .= "<p>Veuillez choisir un autre pseudo/adresse E-mail, celui-ci existe déjà ou vous <a href='login.php'> connecter </a>.</p>";
        }

        if (mb_strlen($password) < 6) 
        {
            $errors[] .= "<p>Votre mot de passe doit contenir au moins six(6) caractères.</p>";
        }

        if (count($errors) == 0) 
        {
            $password_hash  = password_hash($password, PASSWORD_BCRYPT);

            $query          = $db->prepare("INSERT INTO users(pseudo, password, email) VALUES(:pseudo, :password, :email)");

            $insert_user    = $query->execute(["pseudo" => $pseudo, "password" => $password_hash, "email" => $email]);

            if($insert_user)
            {
                // Ajout du message flash ici avant la redirection
                header("Location:login.php");
                exit();
            }else {
                $errors[] .= "<p>Une erreur inattendue est survenue lors de votre inscription; veuillez recommancer SVP!</p>";
            }
        }
    }


    // Appel de la page vue de l'inscription
    require("views/register.view.php");
    