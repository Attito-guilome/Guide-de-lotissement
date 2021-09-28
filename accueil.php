<?php
require './att/traitement.php';
$ob=new lotissement();
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Jaures">
    <title>Guide de lotissement</title>
    <link rel="stylesheet" href="style.css">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/jumbotron/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">
  </head>
  <body>

<main>
  <div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">

        <span class="fs-4">Bienvenue dans votre Guide de saisir</span>
      </a>
    </header>

    <div class="row align-items-md-stretch">
      <div class="col-md-12">
        <div class="h-100 p-5 bg-light border rounded-3">
            <div class="text-center">
                <h2>voir</h2>
                <p>créer l'entete pour enregistrer les Guides </p>
                <a href="enregistrerGuide.php"><button class="btn btn-primary btn-lg" type="button">Créer un Guide</button></a>
            </div>

        </div>
      </div>

    </div>
  </div>

  <div class="container py-4">
    <div class="pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">

        <span class="fs-4">Voir les Guide déja saisir</span>
      </a>
    </div>

    <div class="album py-5 bg-light">
      <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <!-- bloc a recuperer debut-->
          <?php $ob->af_lotissement(); ?>
            <!--  fin -->


                  </div>
                </div>
              </div>
            </div>
      </div>





    <footer class="pt-3 mt-4 text-muted border-top">
      &copy; 2021 nyusu
    </footer>
  </div>
</main>



  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
  crossorigin="anonymous"></script>
</script>
</html>
