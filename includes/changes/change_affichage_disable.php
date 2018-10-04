<?php
$verif_co = new User();
if ($verif_co->query_verif_mail() === false) {
    header("Location:index.php");
}
?>
<div class="fond3">
    <div class="container-fluid infos">
        <h2 class="row justify-content-center love_font">My meetic</h2>
        <p class="text alert-danger row justify-content-center">
           Êtes vous sûr de vouloir désactivé votre compte ?
        </p>
        <div class="row justify-content-center">
            <form action="" method="post">
                <input type="hidden" name="colonne" value="<?= $_POST['colonne'] ?>">
                <input type="hidden" name="change_info" value="1">
                <input class="btn btn-danger btn-change-2" type="submit" value="Oui">  
            </form>
            <form action="" method="post">
                <input type="hidden" name="colonne" value="<?= $_POST['colonne'] ?>">
                <input type="hidden" name="change_info" value="0">
                <input class="btn btn-info btn-change-2" type="submit" value="Non">  
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
        </div>
    </div>
</div>