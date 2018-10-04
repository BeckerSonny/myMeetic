<div class="fond3">
    <div class="container-fluid infos">
        <h2 class="row justify-content-center love_font">My meetic</h2>
        <p class="text row justify-content-center">Bonjour <?= ucfirst($_SESSION['prenom'])?> ! <br />
        <b>Voici vos informations :</b>
        <form action="" method="post" class="row justify-content-center">
            <input type="hidden" name="colonne" value="prenom" />
            <p class="text info">
                <b> Prenom : </b><?= $donnees['prenom'] ?>
            </p>
            <input class="btn btn-info btn-change" type="submit" value="Modifier">  
        </form>
        <form action="" method="post" class="row justify-content-center">
            <input type="hidden" name="colonne" value="nom" />
            <p class="text info">
                <b> Nom : </b><?= $donnees['nom'] ?>
            </p>
            <input class="btn btn-info btn-change" type="submit" value="Modifier">  
        </form>
        <form action="" method="post" class="row justify-content-center">
            <input type="hidden" name="colonne" value="sexe" />
            <p class="text info">
                <b> Sexe : </b><?= ucfirst($donnees['sexe']) ?>
            </p>
            <input class="btn btn-info btn-change" type="submit" value="Modifier">  
        </form>
        <form action="" method="post" class="row justify-content-center">
            <input type="hidden" name="colonne" value="ville" />
            <p class="text info">
                <b> Ville : </b><?= ucfirst($donnees['ville']) ?>
            </p>
            <input class="btn btn-info btn-change" type="submit" value="Modifier">  
        </form>
        <form action="" method="post" class="row justify-content-center">
            <input type="hidden" name="colonne" value="date_naissance" />
            <p class="text info">
                <b> Date de naissance : </b><?= date("d/m/Y", strtotime($donnees['date_naissance'])) ?>
            </p>
            <input class="btn btn-info btn-change" type="submit" value="Modifier">
        </form>
        <form action="" method="post" class="row justify-content-center">
            <input type="hidden" name="colonne" value="mail" />
            <p class="text info">
                <b> Email : </b><?= $_SESSION['email'] ?>
            </p>
            <input class="btn btn-info btn-change" type="submit" value="Modifier">
        </form>
        <form action="" method="post" class="row justify-content-center">
            <input type="hidden" name="colonne" value="pass" />
            <input class="btn btn-info btn-change-mdp" type="submit" value="Modifier mot de passe">
        </form>
        <form action="" method="post" class="row justify-content-center">
            <input type="hidden" name="colonne" value="disable" />
            <input class="btn btn-danger btn-disable" type="submit" value="Désactiver le compte">
        </form>
    </div>
</div>