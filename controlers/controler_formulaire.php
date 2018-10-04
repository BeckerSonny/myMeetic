<?php
class Controle_forms
{
    public function __construct()
    {
        if (!isset($_SESSION['prenom']))
        {
            include_once("includes/bdd.php");
            include 'includes/meta_link.html';
        }
    }

    public function verif_form()
    {
        if (!isset($_SESSION['prenom']))
        {
            include 'includes/functions.php';
            include 'includes/meta_link.html';
            if (!isset($_POST['first_name']))
            {
                include 'formulaires/nom_prenom.php';
            }
            elseif (isset($_POST['email']))
            {
                $this->call_accueil($verif_basic);
            }
            else
            {
                $this->call_birthday_mail($verif_basic);
            }
        }
    }

    private function call_birthday_mail($verif_basic)
    {
        if (!isset($_POST['birthday']))
        {
            $verif = $this->verif_name();
            if ($verif === "")
            {
                include 'formulaires/ville_date.php';
            }
            else
            {
                include 'formulaires/nom_prenom.php';
            }
        }
        elseif ($_POST['birthday'] >= 18)
        {
            $verif = $this->verif_city_date($verif_basic);
            if ($verif === "")
            {
                include 'formulaires/mail_mdp.php';
            }
            else
            {
                include 'formulaires/ville_date.php';
            }
        }
    }

    private function call_accueil($verif_basic)
    {
        $verif = $this->verif_login();
        if ($verif === "")
        {
            $verif_name = $this->verif_name();
            $verif_city = $this->verif_city_date($verif_basic);
            $verif_login = $this->verif_login();

            if ($verif_name !== "")
            {
                include 'formulaires/nom_prenom.php';
            }
            elseif ($verif_city !== "")
            {
                include 'formulaires/ville_date.php';
            }
            elseif ($verif_login !== "")
            {
                include 'formulaires/mail_mdp.php';
            }
            else
            {
                $this->inscription($verif_basic);
            }
        }
        else
        {
            include 'formulaires/mail_mdp.php';
        }
    }

    private function verif_name()
    {
        $verif = "";
        if (strlen($_POST['first_name']) < 2 || preg_match("/\d+/", $_POST['first_name']) === 1)
        {
            $verif .= "Votre prenom est invalide.<br />";
        }
        if (strlen($_POST['name']) < 2 || preg_match("/\d+/", $_POST['name']) === 1)
        {
            $verif .= "Votre nom est invalide.<br />";
        }
        if (!isset($_POST['sexe']))
        {
            $verif .= "Vous n'avez pas defini votre sexe.<br />";
        }
        return $verif;
    }

    private function verif_city_date($verif_basic)
    {
        $verif = "";
        if (strlen($_POST['city']) < 2 || preg_match("/\d+/", $_POST['city']) === 1)
        {
            $verif .= "Votre ville est invalide.<br />";
        }
        if ($verif_basic->age_by_date($_POST['birthday']) < 18)
        {
            $verif .= "Vous devez être majeur pour pouvoir accèder à ce site, merci de le quitter.<br />";
        }
        if (preg_match("/^[0-3]{1}[0-9]{1}\/[0-1]{1}[0-9]{1}\/[1-2]{1}[9,0]{1}[0-9]{2}$/", date("d/m/Y", strtotime($_POST['birthday']))) === 0)
        {
            $verif .= "Format de date invalide.<br />"; 
        }
        if ($_POST['birthday'] >= date("Y/m/d"))
        {
            $verif = "Votre date de naissance ne peut être supérieur ou égal à la date actuel.<br />";
        }
        return $verif;
    }

    private function verif_login()
    {
        $verif = "";
        if (strlen($_POST['email']) < 2 || preg_match("/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/", $_POST['email']) === 0)
        {
            $verif .= "Votre email est invalide.<br />";
        }
        if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/", $_POST['pass1']) === 0)
        {
            $verif .= "Votre mot de passe doit contenir au moins:<br />
            8 caractères, 1 majuscule,<br />
            1 minuscule, 1 chiffre.<br /";
        }
        if ($_POST['pass1'] !== $_POST['pass2'])
        {
            $verif .= "Votre confirmation de mot de passe doit être identique à votre premier mot de passe.<br />";
        }
        $verif = $this->verif_mail($verif);
        return $verif;
    }

    private function verif_mail($verif)
    {
        $bdd = new User();
        $mail = $bdd->query_verif_mail();
        if ($mail === true)
        {
            $verif .= "Cette adresse mail est déjà utilisé.";
        }
        return $verif;
    }

    private function inscription($verif_basic)
    {
        $user = new User();
        $ok = $user->query_subscribe();
        if ($ok === false)
        {
            session_start();
            $_SESSION['prenom'] = $_POST['first_name'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['sexe'] = $_POST['sexe'];
            header("Location:index.php");
        }
        else
        {
            echo "Cette adresse mail est déjà utilisé" ;
        }
    }
}

$controle = new Controle_forms();