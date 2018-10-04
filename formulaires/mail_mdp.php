<div class="fond">
    <div class="container-fluid inscription">
        <h1 class="row justify-content-center love_font">My meetic</h1>
        <p class="text">Vous avez <?= $verif_basic->age_by_date($_POST['birthday']) ?> ans ! <br />
        Vous êtes donc <?php $verif_basic->add_e($_POST['sexe'], "autorisé") ?> à vous inscrire !</p> 
        <form action="" method="post" class="form-example">
            <input type="hidden" name="first_name" value="<?=$_POST['first_name']?>" />
            <input type="hidden" name="name" value="<?=$_POST['name']?>" />
            <input type="hidden" name="sexe" value="<?=$_POST['sexe']?>" />
            <input type="hidden" name="birthday" value="<?=$_POST['birthday']?>" />
            <input type="hidden" name="city" value="<?=$_POST['city']?>" />
            <label class="label" for="email">Email : </label>
            <input class="login email" id="email" type="email" name="email" />
            <p class="text">Choisissez votre mot de passe :<br />
            Au moins 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre.</p>
            <label class="label" for="pass1">Password : </label>
            <input  class="login pass" id="pass1" type="password" name="pass1" />
            <label class="label" for="pass2">Confirmez : </label>
            <input  class="login pass" id="pass2" type="password" name="pass2" />
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
            <div class="row justify-content-center">
                <input class="btn btn-success submit" id="continuer" type="submit" value="S'inscrire">
            </div>
        </form>
    </div>
</div>