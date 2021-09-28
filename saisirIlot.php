<?php
require './att/traitement.php';


 if(!empty($_GET['id_loti']))
 {
  $_SESSION['id']=$_GET['id_loti'];
  $_SESSION['loti']=$_GET['loti'];

 }
 // creation d'objet
$ob=new ilot();
$ob2=new lot();
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
            <h1 class="fw-light"><?= $_SESSION['loti']; ?></h1>
          </div>
          <div class="col-md-6">
            <a href="accueil.php">  <button type="submit" class="btn btn-primary pull-right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
  <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
</svg> Accueil</button></a>
          <a href="/wamp/voir_Lot.php?id_loti=<?=$_SESSION['id']?>&loti=<?=$_SESSION['loti']?>">  <button type="submit" class="btn btn-success pull-right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
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
            <input type="text" class="form-control" name="ilot" value="<?php echo $ob->num_ilot($_SESSION['id'])+1;?>" >
        </div>
        <div class="col-md-3">
            <label for="lotDebut" class="form-label">LOT DEBUT</label>
            <input type="text" class="form-control" name="lotDebut" value="<?php echo $ob2->fin_lot($_SESSION['id'])+1; ?>" id="zero">
        </div>
        <div class="col-md-3">
            <label for="lotFin" class="form-label">LOT FIN</label>
            <input type="text" class="form-control" name="lotFin" id="foc">
        </div>
        <div class="col-md-6">
          <label for="reserve" class="form-label">RESERVE ETAT</label>
          <input type="text" name="reserve" id="autocomplete" class="form-select">
      <ul id="list">
        <li><a href="#">Commencer a ecrire</a></li>
      </ul>
          
        </div>
        <input type="hidden" name="id_guide" value="<?php echo @$_SESSION['id']; ?>">
        <input type="hidden" name="loti" value="<?php echo @$_SESSION['loti']; ?>">
        <div class="col-12">
          <button type="submit" class="btn btn-primary" name="btn" value="btn_enr">Enrégistrer</button>
        </div>
      </form>
</div>

</main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
  crossorigin="anonymous"></script>


<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script type="text/javascript">
  (function()
    {
      var doc=document.getElementById('foc');
      window.onload=doc.focus();
      var v=document.getElementById('zero');
      var sang=v.value;
      doc.onkeyup=function(){
        var doc2=document.getElementById('zero');
        var fin=document.getElementById('fin');
        var d=document.getElementById('foc');

        if(d.value && d.value==0)
        {
          doc2.value=d.value;
        }
        else if (!d.value) {
          doc2.value=sang//variable globale;
        }
      };
    })();
</script>
<script src="autocomplete/ajax.js"></script>
<script type="text/javascript" src="autocomplete/monjs.js"></script>
  </body>
</html>
