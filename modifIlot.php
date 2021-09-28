<?php require './att/traitement.php';
$ob=new ilot();
$requete=$ob->af_un_ilot_lot($_GET['id_ilot'],$_GET['id_lot'],$_GET['id_attrib']);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="autocomplete/monstyle.css">

</head>
  <body>

<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light"><?= $_GET['loti'] ?></h1>
          </div>
          <div class="col-md-6">
          <a href="/wamp/voir_Lot.php?id_loti=<?= $_GET['id_loti'] ?>&loti=<?= $_GET['loti'] ?>">  <button type="submit" class="btn btn-success pull-right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
            </svg> Voir L'enrégistrement</button></a>
          </div>
         
        </div>
        
      </section>


<div class="container form-control">
    <form class="row g-3" action='./att/traitement.php' method="POST" autocomplete="off">
        <div class="col-md-6">
            <label for="ilot" class="form-label">ILOT</label>
            <input type="text" class="form-control" name="ilot" value="<?= $requete['num_ilot'] ?>">
        </div>
        <div class="col-md-3">
            <label for="lotDebut" class="form-label">LOT DEBUT</label>
            <input type="text" class="form-control" name="lotDebut" value="<?= $requete['deb_lot'] ?>">
        </div>
        <div class="col-md-3">
            <label for="lotFin" class="form-label">LOT FIN</label>
            <input type="text" class="form-control" name="lotFin" value="<?= $requete['fin_lot'] ?>">
        </div>
        <div class="col-md-6">
          <label for="reserve" class="form-label">RESERVE ETAT</label>
          <input type="text" name="reserve" id="autocomplete" class="form-select" value="<?= $requete['n_pr_attrib'] ?>">
        <ul id="list">
          <li><a href="#">Commencer a ecrire</a></li>
        </div>

        <input type="hidden" name="id_ilot" value="<?= $_GET['id_ilot']?>">
        <input type="hidden" name="id_lot" value="<?= $_GET['id_lot']?>">
        <input type="hidden" name="loti" value="<?= $_GET['loti']?>">
        <input type="hidden" name="id_attrib" value="<?= $_GET['id_attrib']?>">
        <input type="hidden" name="id_loti" value="<?= $_GET['id_loti']?>">
    
        <div class="col-12">
          <button type="submit" class="btn btn-primary" name="btn" value="btn_mod">Enrégistrer</button>
        </div>
      </form>
</div>

</main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
  crossorigin="anonymous"></script>


<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

      
  </body>
  <script src="./autocomplete/ajax.js"></script>
<script type="text/javascript" src="./autocomplete/monjs.js"></script>
</html>
