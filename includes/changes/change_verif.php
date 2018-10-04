<?php
class Verif_changes
{
    function __construct()
    {

    }

    public function verif()
    {
        $verif = "";
        if ($_POST['colonne'] == "nom" || $_POST['colonne'] == "prenom" || $_POST['colonne'] == "city") {
            $verif .= $this->verif_champ();
        } elseif ($_POST['colonne'] == "mail") {
            $verif .= $this->verif_email();
        } elseif ($_POST['colonne'] == "pass") {
            $verif .= $this->verif_pass();
        } elseif ($_POST['colonne'] == "date_naissance") {
            $verif .= $this->verif_date();
        }
        return $verif;
    }

    private function verif_champ()
    {
        $verif = "";
        if (strlen($_POST['change_info']) < 2 || preg_match("/\d+/", $_POST['change_info']) === 1)
        {
            $verif .= "Ce champ est invalide.<br />";
        }
        return $verif;
    }

    private function verif_email()
    {
        $verif = "";
        if (strlen($_POST['change_info']) < 2 || preg_match("/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/", $_POST['change_info']) === 0)
        {
            $verif .= "Votre email est invalide.<br />";
        }
        return $verif;
    }

    private function verif_pass()
    {
        $verif = "";
        if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/", $_POST['change_info']) === 0)
        {
            $verif .= "Votre mot de pass est invalide.<br />
            Il doit contenir au moins 8 caractères, 1 majuscule, 1 minuscule et 1 chiffre.<br />";
        }
        return $verif;
    }

    private function verif_date()
    {
        $verif = "";
        $verif_basic = new Verif_basic();
        if ($verif_basic->age_by_date($_POST['change_info']) < 18) {
            $verif .= "Vous devez être majeur.<br />";
        }
        if (preg_match("/^[0-3]{1}[0-9]{1}\/[0-1]{1}[0-9]{1}\/[1-2]{1}[9,0]{1}[0-9]{2}$/",
        date("d/m/Y", strtotime($_POST['change_info']))) === 0) {
            $verif .= "Format de date invalide.<br />"; 
        }
        if ($_POST['change_info'] >= date("Y-m-d")) {
            $verif .= "Votre date de naissance ne peut être supérieur ou égal à la date actuel.<br />";
        }
        return $verif;
    }
}