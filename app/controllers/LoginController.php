<?php
/**
 * Fichier       : LoginController.php
 * Sujet         : Contloller pour le login
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-04-21
 * Dernière mod. : 2025-04-21
 *
 * Description   : recupère le login, fait appel à la base de données, puis redirige vers une page ou le formulaire de login
 */
class LoginController {
   
    /**
     * fonction qui traite les données de connexion et redigirige ou affiche une erreur
     *
     * @param string $email
     * @param string $password
     * @return void
     */
    public function handleLogin($email,$password) {
        $user=User::findByLogin($email);
        //on verifie le mot de passe si c'est ok on inclue le dashboard

        if(!$user) {
            //redirection si utilisateur n'existe pas
            $_SESSION['error_message']="utilisateur n'existe pas";
            header('Location: /gestion-mails');
            exit;
        }
        if(password_verify($password,$user->password_utilisateur)) {
            $_SESSION['login']=$user->nom_utilisateur;
            header('Location: /gestion-mails?page=dashboard');
            exit;
        }

        else {
            // Redirection en cas de mauvais mot de passe
            $_SESSION['error_message'] = "mot de passe incorrecte";
            header('Location: /gestion-mails');
            exit;
        }
    }
}