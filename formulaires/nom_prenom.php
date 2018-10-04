<div class="fond">
    <div class="container-fluid inscription">
        <h1 class="row justify-content-center love_font">My meetic</h1>
        <p class="text">Bienvenue sur My meetic, site de rencontres sérieuses.<br />
        Inscrivez vous pour peut-être trouver votre âme soeur.</p>
        <form action="" method="post" class="form-example">
            <label class="label" for="name">Nom : </label>
            <input class="champ az_only" type="text" name="name" id="name" required />
            <label class="label" for="first_name">Prenom : </label>
            <input class="champ az_only" type="text" name="first_name" id="first_name" required />
                <p class="row justify-content-center text_form">Vous êtes :</p>
            <div class="text-center">
                <div class="btn-group btn-group-toggle">
                    <label id="radio_label_1" class="btn btn-outline-dark radio_label">
                        <input class="radio" type="radio" name="sexe" id="homme" value="homme" /> Homme
                    </label>
                    <label id="radio_label_2" class="btn btn-outline-dark radio_label">
                        <input class="radio" type="radio" name="sexe" id="femme" value="femme" /> Femme
                    </label>
                    <label id="radio_label_3" class="btn btn-outline-dark radio_label">
                        <input class="radio" type="radio" name="sexe" id="autre" value="autre" /> Autre
                    </label>
                </div>
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
            </div>
        </form>
    </div>
</div>