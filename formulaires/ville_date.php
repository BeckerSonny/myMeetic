<div class="fond_ville">
    <div class="container-fluid inscription">
        <h1 class="row justify-content-center love_font">My meetic</h1>
        <p class="text">Bonjour <?= ucfirst($_POST['first_name'])?> et Bienvenue ! <br />
        Dans quelle ville cherchez vous l'amour ? </p> 
        <form action="" method="post" class="form-example">
            <input type="hidden" name="first_name" value="<?=$_POST['first_name']?>" />
            <input type="hidden" name="name" value="<?=$_POST['name']?>" />
            <input type="hidden" name="sexe" value="<?=$_POST['sexe']?>" />
            <label class="label" for="city">Ville : </label>
            <select class="" id="city" name="city">
            <option class="option" value="">Ville</option>
                <option class="option" value="Lyon">Lyon</option>
                <option class="option" value="Marseille">Marseille</option>
                <option class="option" value="Paris">Paris</option>
            </select>
            <p class="text">Quand êtes vous <?php $verif_basic->add_e($_POST['sexe'], "né") ?> ? </p>
            <label class="label" for="birthday">Date : </label>
            <input  class="date" id="birthday" type="date" name="birthday" />
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
                <input class="btn btn-success submit" id="continuer" type="submit" value="Continuer">
            </div>
        </form>
    </div>
</div>