<?php

    require("models/user_model.php");

    array_pop($_POST);
    extract($_POST);

    $pseudo     = strip_tags(trim($pseudo));
    $email      = strip_tags(strtolower(trim($email)));
    $password   = strip_tags(trim($password));
    $errors     = [];

    $display_users  = display_all_users();

    $count_pseudo   = display_user_by_field("pseudo", $pseudo);
    $count_email    = display_user_by_field("email", $email);

    // Traitement du formulaire d'inscription
    if (isset($_POST["send"])) 
    {
        if(empty($pseudo) && empty($email) && empty($password)) 
        {
            $errors[] = "<p>Tous les champs sont recquis, veuillez vérifier.</p>";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $errors[] = "<p>Veuillez entré une adresse E-mail valide.</p>";
        }

        if ($count_pseudo > 0) 
        {
            $errors[] = "<p>Veuillez choisir un autre pseudo, celui-ci existe déjà ou vous <a href='login.php'> connecter </a>.</p>";
        }

        if ($count_email > 0) 
        {
            $errors[] = "<p>Veuillez choisir une autre adresse E-mail, celui-ci existe déjà ou vous <a href='login.php'> connecter </a>.</p>";
        }

        if (mb_strlen($password) < 6) 
        {
            $errors[] = "<p>Votre mot de passe doit contenir au moins six(6) caractères.</p>";
        }

        if (count($errors) == 0) 
        {
            $insert_user    = insert_user($pseudo, $password, $email);
            die($insert_user);

            if($insert_user)
            {
                // Ajout du message flash ici avant la redirection
                header("Location:login.php");
                exit();
            }else {
                $errors[] = "<p>Une erreur inattendue est survenue lors de votre inscription; veuillez recommancer SVP!</p>";
            }
        }
    }


    // Appel de la page vue de l'inscription
    require("views/register.view.php");
    