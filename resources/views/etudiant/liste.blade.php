<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h1>CRUD LARAVEL 12</h1>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <a href="/ajouter" class="btn btn-primary mb-3">AJOUTER</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Classe</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($etudiants as $etudiant)
                            <tr>
                                <th scope="row">{{ $etudiant->id }}</th>
                                <td>{{ $etudiant->nom }}</td>
                                <td>{{ $etudiant->prenom }}</td>
                                <td>{{ $etudiant->classe }}</td>
                                <td>
                                    {{-- ✅ Bouton VOIR PROFIL --}}
                                    <a href="/etudiant/profil/{{ $etudiant->id }}" 
                                       class="btn btn-info">
                                        PROFIL
                                    </a>

                                    {{-- Bouton MODIFIER --}}
                                    <button type="button" class="btn btn-warning"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalEdit{{ $etudiant->id }}">
                                        MODIFIER
                                    </button>

                                    {{-- Bouton SUPPRIMER --}}
                                    <button type="button" class="btn btn-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalSuppr{{ $etudiant->id }}">
                                        SUPPRIMER
                                    </button>

                                    {{-- Modal de modification --}}
                                    <div class="modal fade" id="modalEdit{{ $etudiant->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="/etudiant/{{ $etudiant->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modifier l'étudiant</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-start">
                                                        <div class="mb-3">
                                                            <label for="nom{{ $etudiant->id }}" class="form-label">Nom</label>
                                                            <input type="text" class="form-control" id="nom{{ $etudiant->id }}" name="nom" value="{{ $etudiant->nom }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="prenom{{ $etudiant->id }}" class="form-label">Prénom</label>
                                                            <input type="text" class="form-control" id="prenom{{ $etudiant->id }}" name="prenom" value="{{ $etudiant->prenom }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="classe{{ $etudiant->id }}" class="form-label">Classe</label>
                                                            <input type="text" class="form-control" id="classe{{ $etudiant->id }}" name="classe" value="{{ $etudiant->classe }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-warning">Enregistrer les modifications</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Modal de suppression --}}
                                    <div class="modal fade" id="modalSuppr{{ $etudiant->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Confirmer la suppression</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    Voulez-vous vraiment supprimer
                                                    <strong>{{ $etudiant->prenom }} {{ $etudiant->nom }}</strong> ?
                                                    Cette action est irréversible.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                    <form action="/etudiant/{{ $etudiant->id }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>