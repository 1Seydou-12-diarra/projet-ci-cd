<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
      <div class="container ">
        <div class="row">
          <div class="col">
            <h1>CRUD LARAVEL 12</h1>
            <H1>AJOUTER UN ETUDIANT</H1>
        
           <hr>
            <form action="/ajouter/traitement" method="POST" class= form-group>
            @csrf
         <div class="form-group-3">
    <label for="nom" class="form-label">Nom</label>
    <input type="text" class="form-control" id="nom"  name="nom">
  </div>
  <div class="form-group">
    <label for="prenom" class="form-label">Prenom</label>
    <input type="text" class="form-control" id="prenom" name="prenom">
  </div>
    <div class="form-group">
    <label for="classe" class="form-label">Classe</label>
    <input type="text" class="form-control" id="classe" name="classe">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Ajouter</button>
    <br>
    <br>
    <a href="/etudiant" class="btn btn-secondary">RETOUR</a>
    </form>    
          </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

  </body>
</html>