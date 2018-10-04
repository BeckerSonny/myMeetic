<?php
$verif_co = new User();
if ($verif_co->query_verif_mail() === false) {
    header("Location:index.php");
}
?>
<div class="fond3">
    <div class="container-fluid infos">
        <h2 class="row justify-content-center love_font">My meetic</h2>
        <p class="text row justify-content-center">
            Information à changer : <br />
            <?= $info_in_work ?>
        </p>
        <?php
        if (!isset($_POST['pass1']))
        {
        ?>
        <p class="text"> Entrez votre mot de passe actuel :</p>
        <form action="" method="post" class="row justify-content-center">
            <input type="hidden" name="change" value="<?= $_POST['colonne'] ?>">
            <input class="login pass" id="pass1" type="password" name="pass1">
            <input class="btn btn-info btn-change-2" type="submit" value="Verifier">  
        </form>
        <?php
        }
        if (isset($_POST['pass1']))
        {
            $user = new User();
            $ok = $user->query_connexion();
            if ($ok === true)
            {
            ?>
            <form action="" method="post" class="row justify-content-center">
                <input type="hidden" name="colonne" value="<?= $_POST['colonne'] ?>">
                <input class="login pass" id="pass1" type="password" name="pass1">
                <input class="login pass" id="pass2" type="password" name="change_info">
                <input class="btn btn-info btn-change-2" type="submit" value="Modifier">
            </form>
            <div class="errors">
                <p id="echo_error">
                    <?php
                        if (isset($verif))
                        {
                            if ($verif !== "")
                            {
                                echo $verif;
                            }
                        }
                    ?>
                </p>
            </div>
        <?php
            }
        }
        ?>
    </div>
</div>