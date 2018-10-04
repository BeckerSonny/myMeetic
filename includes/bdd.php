<?php

class User
{
    public $bdd;

    function __construct() {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=my_meetic;charset=utf8', 'root', '123987');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }
        catch (PDOException $e)
        {
            echo "<p class=\"bdd\">ECHEC Connection : " . $e->getMessage() . "<p>";
        }
        $this->bdd = $bdd;
    }

    public function recup_mail()
    {
        if (isset($_SESSION['email'])) {
            $mail = strtolower($_SESSION['email']);
        } elseif (isset($_POST['email'])) {
            $mail = htmlspecialchars(strtolower($_POST['email']));
        } else {
            $mail = null;
        }
        return $mail;
    }
    
    public function query_verif_mail()
    {
        $mail_query = $this->bdd->prepare('SELECT membre.mail, membre.disable FROM membre WHERE membre.mail = :mail;');
        $mail_query->bindValue(':mail', htmlspecialchars(strtolower($this->recup_mail())), PDO::PARAM_STR);
        $mail_query->execute();
        $donnees = $mail_query->fetch();
        if ($donnees['mail'] == $this->recup_mail())
        {
            return true;
        }
        return false;
    }

    public function info_query($colonne)
    {
        if ($this->query_verif_mail() === true)
        {
            $info_query = $this->bdd->prepare('SELECT ' . $colonne . ' FROM membre WHERE LOWER(membre.mail) = :mail;');
            $info_query->bindValue(':mail', htmlspecialchars(strtolower($this->recup_mail())), PDO::PARAM_STR);
            $info_query->execute();
            return $info_query->fetch();
        }
    }

    public function change_bdd($colonne, $value)
    {
        if ($this->query_verif_mail() === true)
        {
            $change_bdd = $this->bdd->prepare('UPDATE membre  SET ' . $colonne . '=:new_value WHERE LOWER(membre.mail) = :mail');
            $change_bdd->bindValue(':new_value', $value, PDO::PARAM_STR);
            $change_bdd->bindValue(':mail', htmlspecialchars(strtolower($this->recup_mail())), PDO::PARAM_STR);
            $change_bdd->execute();
            echo "Modification terminée !";
        }
    }

    public function query_subscribe()
    {
        $mail = $this->query_verif_mail();
        if ($mail === false)
        {
            $query = $this->bdd->prepare('INSERT INTO membre (nom, prenom, sexe, date_naissance, ville, mail, pass)
            VALUES (:nom, :prenom, :sexe, :naissance, :ville, :mail, :pass)');
            $query->bindValue(':nom', htmlspecialchars($_POST['name']), PDO::PARAM_STR);
            $query->bindValue(':prenom', htmlspecialchars($_POST['first_name']), PDO::PARAM_STR);
            $query->bindValue(':sexe', htmlspecialchars($_POST['sexe']), PDO::PARAM_STR);
            $query->bindValue(':naissance', htmlspecialchars($_POST['birthday']), PDO::PARAM_STR);
            $query->bindValue(':ville', htmlspecialchars($_POST['city']), PDO::PARAM_STR);
            $query->bindValue(':mail', htmlspecialchars(strtolower($_POST['email'])), PDO::PARAM_STR);
            $query->bindValue(':pass', password_hash(htmlspecialchars($_POST['pass1']), PASSWORD_DEFAULT), PDO::PARAM_STR);
            $query->execute();
            $this->open_session();
        }
        return $mail;
    }

    public function query_connexion()
    {
        $mail = $this->query_verif_mail();
        if ($mail === true)
        {
            $compte = $this->bdd->prepare('SELECT membre.mail, membre.pass, membre.disable FROM membre WHERE membre.mail = :post_mail;');
            $compte->bindValue(':post_mail', htmlspecialchars(strtolower($this->recup_mail())), PDO::PARAM_STR);
            $compte->execute();
            while ($donnees = $compte->fetch()) {
                if (password_verify($_POST['pass1'], $donnees['pass']) === true)
                {
                    if ($donnees['disable'] == 1) {
                    return null;
                    } else {
                    return true;
                    }
                }
            }
        }
        return false;
    }

    public function open_session()
    {
        if (isset($_POST['first_name']))
        {
            session_start();
            $_SESSION['prenom'] = $_POST['first_name'];
            $_SESSION['sexe'] = $_POST['sexe'];
        }
        else
        {
            $infos = $this->info_query('*');
            $_SESSION['prenom'] = $infos['prenom'];
            $_SESSION['sexe'] = $infos['sexe'];
        }
        $_SESSION['email'] = $_POST['email'];
    }
}