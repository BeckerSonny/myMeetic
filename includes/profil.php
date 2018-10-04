<div class="profil">
    <div class="profil_text">
        <h5 class="text">Profil de <b><?=$donnees['prenom']?></b></h5>
        <p class="text">
        Âge : <b><?= $functions->age_by_date($donnees['date_naissance'])?> ans</b><br />
        Sexe : <b><?= ucfirst($donnees['sexe']) ?></b><br />
        Ville : <b><?= ucfirst($donnees['ville']) ?></b><br />
        Email : <b><?= $donnees['mail'] ?></b><br />
        </p>
    </div>
</div>