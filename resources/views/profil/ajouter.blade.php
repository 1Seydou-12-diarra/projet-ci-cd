<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">

        <h2>Profil de {{ $etudiant->nom }} {{ $etudiant->prenom }}</h2>
        <hr>

        @if($etudiant->profil)

            {{-- ✅ PROFIL EXISTE : afficher + boutons modifier/supprimer --}}
           <table class="table table-bordered">
    <tr>
        <th>Téléphone</th>
        <td>{{ $etudiant->profil->telephone }}</td>
    </tr>
    <tr>
        <th>Adresse</th>
        <td>{{ $etudiant->profil->adresse }}</td>
    </tr>
    <tr>
        <th>Date de naissance</th>
        <td>{{ $etudiant->profil->date_naissance }}</td>
    </tr>
    <tr>
        <th>Sexe</th>
        <td>{{ $etudiant->profil->sexe }}</td>
    </tr>
    <tr>
        <th>Bio</th>
        <td>{{ $etudiant->profil->bio }}</td>
    </tr>

    {{-- ✅ BOUTONS DANS LE TABLEAU --}}
    <tr>
        <th>Actions</th>
        <td>
            <button class="btn btn-warning btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#modalModifier">
                MODIFIER
            </button>

            <button class="btn btn-danger btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#modalSupprimer">
                SUPPRIMER
            </button>
        </td>
    </tr>
</table>

         

            {{-- Modal MODIFIER --}}
            <div class="modal fade" id="modalModifier" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/profil/modifier/{{ $etudiant->profil->id }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="modal-header">
                                <h5 class="modal-title">Modifier le profil</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-start">
                                <div class="mb-3">
                                    <label class="form-label">Téléphone</label>
                                    <input type="text" class="form-control" name="telephone"
                                           value="{{ $etudiant->profil->telephone }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Adresse</label>
                                    <input type="text" class="form-control" name="adresse"
                                           value="{{ $etudiant->profil->adresse }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Date de naissance</label>
                                    <input type="date" class="form-control" name="date_naissance"
                                           value="{{ $etudiant->profil->date_naissance }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sexe</label>
                                    <select class="form-select" name="sexe" required>
                                        <option value="M" {{ $etudiant->profil->sexe == 'M' ? 'selected' : '' }}>Masculin</option>
                                        <option value="F" {{ $etudiant->profil->sexe == 'F' ? 'selected' : '' }}>Féminin</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Bio</label>
                                    <textarea class="form-control" name="bio">{{ $etudiant->profil->bio }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-warning">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Modal SUPPRIMER --}}
            <div class="modal fade" id="modalSupprimer" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirmer la suppression</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            Voulez-vous vraiment supprimer le profil de
                            <strong>{{ $etudiant->nom }} {{ $etudiant->prenom }}</strong> ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <a href="/profil/supprimer/{{ $etudiant->profil->id }}" class="btn btn-danger">
                                Confirmer
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        @else

            {{-- ✅ PAS DE PROFIL : bouton ajouter --}}
            <div class="alert alert-warning">
                Aucun profil trouvé.
            </div>

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAjouter">
                AJOUTER UN PROFIL
            </button>

            {{-- Modal AJOUTER --}}
            <div class="modal fade" id="modalAjouter" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/profil/ajouter/{{ $etudiant->id }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un profil</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-start">
                                <div class="mb-3">
                                    <label class="form-label">Téléphone</label>
                                    <input type="text" class="form-control" name="telephone" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Adresse</label>
                                    <input type="text" class="form-control" name="adresse" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Date de naissance</label>
                                    <input type="date" class="form-control" name="date_naissance" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sexe</label>
                                    <select class="form-select" name="sexe" required>
                                        <option value="M">Masculin</option>
                                        <option value="F">Féminin</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Bio</label>
                                    <textarea class="form-control" name="bio"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @endif

        <a href="/etudiant" class="btn btn-secondary mt-3">Retour à la liste</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>