<!DOCTYPE html>
<html lang="fr">
    <?php
    session_start();
    include_once 'includes/bdd.php';
    include_once 'includes/changes/change_verif.php';
    $verif_co = new User();
    if ($verif_co->query_verif_mail() === false)
    {
        header("Location:index.php");
    }
    elseif (isset($_SESSION['email']))
    {
        $user = new User();
        $ok = $user->query_verif_mail();
        if ($ok === true)
        {
            include 'includes/menu.php';
            if (!isset($_POST['colonne']))
            {
                $donnees = $user->info_query('*');
                include 'includes/compte_affichage.php';
            }
            else
            {
                if (isset($_POST['change_info']))
                { 
                    $verif_change = new Verif_changes();
                    $verif = $verif_change->verif();
                    if ($verif === "") {
                        if ($_POST['colonne'] == "pass") {
                            $_POST['change_info'] = password_hash($_POST['change_info'], PASSWORD_DEFAULT);
                        }
                        $user->change_bdd($_POST['colonne'] ,$_POST['change_info']);
                        if ($_POST['colonne'] == "mail") {
                            $_SESSION['email'] = $_POST['change_info'];
                        }
                        $donnees = $user->info_query('*');
                        include 'includes/compte_affichage.php';
                    }
                    else
                    {
                        $affichage = new Verif_basic();
                        $affichage->affiche_change($verif);
                    }
                }
                elseif (!isset($verif))
                {
                    $affichage = new Verif_basic();
                    $affichage->affiche_change();
                }
            }
            
        }
        else
        {
            header("Location:index.php");
        }
    }
    ?>
    <?php include 'includes/footer.html'; ?>
</html>