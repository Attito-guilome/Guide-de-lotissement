<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
<form action="./att/traitement.php" method="POST">
    <div class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nom</label>
    <input type="text" class="form-control input-group" id="inputEmail4" name="nom">
  </div>
  </div>
  
  <div class="row g-3">
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Prenom</label>
        <input type="text" class="form-control input-group" id="inputPassword4" name="prenom">
    </div>
  </div>

  
  <div class="row g-3">
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Adresse</label>
    <input type="text" class="form-control input-group" id="inputCity" name="adresse">
  </div>
  </div>

  
  <div class="row g-3">
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Telephone</label>
    <input type="tel" class="form-control input-group" id="inputCity" name="telephone">
  </div>
  </div>
  <div class="row g-3">
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Ilot Attribue</label>
    <input type="text" class="form-control input-group" id="inputCity" name="ilot_attribuer">
    <div><strong>NB:</strong> entrer les numeros en les separant par une virgule</div> 
  </div>
  </div>
  <br>
  <div class="col-12 mt-10">
    <button type="submit" class="btn btn-primary" name="btn" value="attributaire">Enregistrer</button>
  </div>
  </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
  crossorigin="anonymous"></script>


<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>