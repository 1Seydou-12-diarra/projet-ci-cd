<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">

        <h2>Profil de {{ $etudiant->nom }} {{ $etudiant->prenom }}</h2>
        <hr>

        @if($profil)
            <table class="table table-bordered">
                <tr>
                    <th>Téléphone</th>
                    <td>{{ $profil->telephone }}</td>
                </tr>
                <tr>
                    <th>Adresse</th>
                    <td>{{ $profil->adresse }}</td>
                </tr>
                <tr>
                    <th>Date de naissance</th>
                    <td>{{ $profil->date_naissance }}</td>
                </tr>
                <tr>
                    <th>Sexe</th>
                    <td>{{ $profil->sexe }}</td>
                </tr>
                <tr>
                    <th>Bio</th>
                    <td>{{ $profil->bio }}</td>
                </tr>
            </table>
        @else
            <div class="alert alert-warning">
                Aucun profil trouvé pour cet étudiant.
                <a href="/profil/ajouter/{{ $etudiant->id }}" class="btn btn-primary btn-sm ms-3">
                    Ajouter un profil
                </a>
            </div>
        @endif

        <a href="/etudiant" class="btn btn-secondary mt-3">Retour à la liste</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>