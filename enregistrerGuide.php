<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
  <body>

<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Créer et enregistrer le guide de lotissement</h1>
            <p class="lead text-muted">cliquer sur ajouter pour commencer la saisir d'un nouveau guide</p>
            
          </div>
        </div>
      </section>

<div class="container form-control">
    <form class="row g-3 " action="./att/traitement.php" method="POST">
        <div class="col-md-4">
            <label for="validationDefault01" class="form-label"><h5>Lotissement :</h5> </label>
            <input type="text" class="form-control" id="lotissement" name="lotissement" placeholder="lotissement">
        </div>
        <div class="col-md-4">
            <label for="validationDefault02" class="form-label"><h5>Situation Géographique :</h5> </label>
            <input type="text" class="form-control"id="sitGeo" name="sitGeo" placeholder="Situation géographique">
        </div>
        <div class="col-md-4">
            <label for="validationDefault02" class="form-label"><h5>Circonscription Foncier :</h5> </label>
            <input type="text" class="form-control"id="circFonc" name="circFonc" placeholder="Commune">
        </div>
        <div class="col-md-6">
            <label for="validationDefault03" class="form-label"><h6>Arrete N° :</h6></label>
            <input type="text" class="form-control" id="arrete" name="arrete"placeholder="Arrete N°">
        </div>
        <div class="col-md-6">
            <label for="validationDefault03" class="form-label"><h6>TF :</h6></label>
            <input type="text" class="form-control" id="tf" name="tf" placeholder="TF">
        </div>

        <div class="col-12">
        <button class="btn btn-primary" type="submit" name="btn" value="btn_guide">Créer un Guide</button>
        </div>
    </form>
</div>

</main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
  crossorigin="anonymous"></script>


<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

      
  </body>
</html>
