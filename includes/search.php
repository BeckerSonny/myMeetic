<div class="fond2">
    <div class="filter row justify-content-center">
        <form action ="" method="get">
            <label for="sexe">Vous cherchez :</label>
            <select name="sexe" class="form">
                <option class="option" value="">Tout genres</option>
                <option class="option" value="homme">un homme</option>
                <option class="option" value="femme">une femme</option>
                <option class="option" value="autre">Autre</option> 
            </select>
            <label for="age">Entre :</label>
            <select name="age" class="form">
                <option class="option" value="">Tout âges</option>
                <option class="option" value="18-26">De 18 à 25 ans</option>
                <option class="option" value="24-36">De 25 à 35 ans</option>
                <option class="option" value="34-46">De 35 à 45 ans</option>
                <option class="option" value="44+">45 ans et plus</option> 
            </select>
            <label for="city">À :</label>
            <select name="city" class="form">
                <option class="option" value="">Peu importe</option>
                <option class="option" value="Lyon">Lyon</option>
                <option class="option" value="Marseille">Marseille</option>
                <option class="option" value="Paris">Paris</option>
            </select>
            <input class="btn btn-success" type="submit" value="Filtrer">
        </form>
    </div>
    <script src="scripts/script_slider.js"></script>
    <div class=" row justify-content-center">
        <img id="left" class="img left" src="style/images/f_left.png">
        <div id="profils" class="all_profils">
            <div class="slider" id="slider">
            <?php
            include 'filters_functions.php';
            $search = new Search_love();
            $arr_donnees = $search->filters_work();
            if ($arr_donnees != null) {
                $search->echo_profils($arr_donnees);
            } else {
                echo "Aucun résultat trouvé";
            }
            ?>
            </div>
        </div>
        <img id="right" class="img right" src="style/images/f_right.png">
    </div>
</div>