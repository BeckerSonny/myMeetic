<head>
  <?php
    include_once 'includes/meta_link.html';
    include_once 'includes/bdd.php';
    include_once 'includes/functions.php';

    $info = new User();
  ?>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="offset-2">
    </div>
    <button class="navbar-toggler" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
      <a class="navbar-brand" href="index.php"><h1 class="love_font">My meetic</h1></a>
      <div class="offset-1 navbar-nav">
        <a class="nav-item nav-link" href="index.php">Recherchez l'amour</a>
      </div>
      <div class="offset-3 user">
        <p class="text"><?= ucfirst($_SESSION['email'])?> connecté.<br />
          Bonjour <?= $info->info_query('prenom')[0]?> !</p>
          <div class="row">
            <a class="link" href="moncompte.php">
            <p class="btn btn-light text link">
                Mon compte
            </p>
            </a>
            <a class="link" href="deconnexion.php">
              <p class="btn btn-light text link">
                Se deconnecter
              </p>
            </a>
          </div>
      </div>
    </div>
  </nav>