<?php
class Search_love
{
    private $user;
    private $bdd;

    public function __construct()
    {
        $this->user = new User();
        $this->bdd = $this->user->bdd;
    }

    public function filters_work()
    {
        $filters = "SELECT * FROM membre WHERE membre.mail != :mail ";
        if (isset($_GET['sexe']))
        {
            $filters .= $this->query_filters();
        }
        $filters .= ";";
        $all_member = $this->bdd->prepare($filters);
        $all_member->bindValue(':mail', htmlspecialchars(strtolower($this->user->recup_mail())), PDO::PARAM_STR);
        $all_member->execute();
        $i = 0;
        while ($donnees = $all_member->fetch()) {
            $arr_donnees[$i] = $donnees;
            $i ++;
        }
        if (isset($arr_donnees)) {
            return $arr_donnees;
        } else {
            return null;
        }
    }
    
    public function query_filters()
    {
        $filters = "";
        if ($_GET['sexe'] != "")
        {
            $filters .= 'AND membre.sexe = \'' . $_GET['sexe'] . '\' ';
        }
        if ($_GET['age'] != "")
        {
            $filters .= $this-> age_work();
        }
        if ($_GET['city'] != "")
        {
            $filters .= 'AND membre.ville = \'' . $_GET['city'] . '\' ';
        }
        return $filters;
    }

    public function age_work()
    {
        $filters = "";
        if (strpos($_GET['age'], "-") != false)
        {
            $age = explode("-", $_GET['age']);
            $filters .= "AND DATEDIFF(DATE(NOW()), membre.date_naissance) BETWEEN " . $age[0] . "*365.2425 AND " . $age[1] . "*365.2425 ";
        }
        else
        {
            $filters .= 'AND DATEDIFF(DATE(NOW()), membre.date_naissance) > ' . substr($_GET['age'], 0, 2) . '*365.2425 ';
        }
        return $filters;
    }

    public function echo_profils($arr)
    {
        $functions = new Verif_basic();
        for ($i=0; $i < count($arr); $i++) { 
            $donnees = $arr[$i];
            include 'includes/profil.php';
        }
    }
}
?>