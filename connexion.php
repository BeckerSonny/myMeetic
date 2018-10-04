<?php
    include 'includes/meta_link.html';
    include 'includes/functions.php';
?>
<div class="fond">
    <div class="container-fluid inscription">
        <h1 class="row justify-content-center love_font">My meetic</h1>
        <p class="text row justify-content-center">Connexion</p> 
        <form action="" method="post" class="form-example">
            <label class="label" for="email">Email : </label>
            <input class="login email" id="email" type="email" name="email" />
            <label class="label" for="pass1">Password : </label>
            <input class="login pass" id="pass1" type="password" name="pass1" />
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
                <input class="btn btn-success submit" id="continuer" type="submit" value="Se connecter" />  
            </div>
        </form>
        <div class="non_inscrit">
            <p class="text">Pas encore inscrit  ? <a class="link" href="inscription.php">Inscrivez-vous</a></p>
        </div>
    </div>
</div>