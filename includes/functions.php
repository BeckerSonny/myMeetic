<?php
class Verif_basic
{
    public function __construct()
    {

    }

    public function add_e($sexe, $mot)
    {
        if($sexe === 'femme')
        {
            echo $mot . "e";
        }
        else
        {
            echo $mot;
        }
    }

    public function age_by_date($date)
    {
        $arr1 = explode('/', date('d/m/Y', strtotime($date)));
        $arr2 = explode('/', date('d/m/Y'));
            
        if(($arr1[1] < $arr2[1]) || (($arr1[1] == $arr2[1]) && ($arr1[0] <= $arr2[0])))
        {
            return $arr2[2] - $arr1[2];
        }
        else
        {
            return $arr2[2] - $arr1[2] - 1;
        }
    }

    public function affiche_change($verif = "")
    {
        $user = new User();
        $donnees = $user->info_query($_POST['colonne']);
        if ($_POST['colonne'] == "sexe") {
            $info_in_work = "<b>Sexe : </b>" . $donnees[0];
            include 'includes/changes/change_affichage_select_sexe.php';
        } elseif ($_POST['colonne'] == "ville") {
            $info_in_work = "<b>Ville : </b>" . $donnees[0];
            include 'includes/changes/change_affichage_select_ville.php';
        } else {
            if ($_POST['colonne'] != "mail" && $_POST['colonne'] != "pass" && $_POST['colonne'] != "disable") {
                $type = "text";
                if ($_POST['colonne'] == "date_naissance") {
                    $info_in_work = "<b>Date de naissance : </b>" .
                    date("d/m/Y", strtotime($donnees[0]));
                    $type = "date";
                } elseif ($_POST['colonne'] == "nom") {
                    $info_in_work = "<b>Nom : </b>" . $donnees[0];
                } elseif ($_POST['colonne'] == "prenom") {
                    $info_in_work = "<b>Prenom : </b>" . $donnees[0];
                } else {
                    header("Location:moncompte.php");
                }
                include 'includes/changes/change_affichage.php';
            } else {
                $this->affiche_change_login($verif);
            }
        }   
    }
    
    public function affiche_change_login($verif)
    {
        if ($_POST['colonne'] == "mail")
        {
            $info_in_work = "<b>Mail : </b> " . $_SESSION['email'];
            include 'includes/changes/change_affichage_mail.php';
        }
        elseif ($_POST['colonne'] == "pass")
        {
            $info_in_work = "<b>Mot de passe : </b>";
            include 'includes/changes/change_affichage_pass.php';
        }
        elseif ($_POST['colonne'] == "disable")
        {
            include 'includes/changes/change_affichage_disable.php';
        }
    }
}

$verif_basic = new Verif_basic();
?>