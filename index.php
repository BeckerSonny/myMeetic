<!DOCTYPE html>
<html>
    <?php
    session_start();
    if (isset($_SESSION['email']) || isset($_POST['email']))
    {
        include_once 'includes/bdd.php';
        $user = new User();
        if (!isset($_SESSION['email']))
        {
            $ok = $user->query_connexion();
            if ($ok === true)
            {
                $donnees = $user->info_query('*');
                $user->open_session();
            }
        }
        else
        {
            $ok = $user->query_verif_mail();
            if ($ok === false)
            {
                session_unset();
                session_destroy();
            }
        }
        if ($ok === true)
        {
            include 'includes/menu.php';
            include 'includes/search.php';
            include 'includes/footer.html';
        }
        else
        {
            if ($ok === false) {
                $verif = "Identifiants incorrects.";
            } elseif ($ok === null) {
                $verif = "Ce compte est desactivé.";
            }

            include 'connexion.php';
        }
    }
    else
    {
        include 'connexion.php';
    }
    ?>
</html>