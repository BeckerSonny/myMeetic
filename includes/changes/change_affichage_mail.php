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
        <form action="" method="post" class="row justify-content-center">
            <input type="hidden" name="colonne" value="<?= $_POST['colonne'] ?>">
            <input class="login email" id="email" type="email" name="change_info">
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
    </div>
</div>