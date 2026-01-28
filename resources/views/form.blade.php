<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="card my-3">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('stagiaire.liste') }}" class="btn btn-secondary">{{__('Retour à la liste')}}</a>
                <h1 class="text-center flex-grow-1">{{__('Informations d\'un stagiaire')}} </h1>
                <div style="width: 150px;"></div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{is_null($id)?route('stagiaire.add'):route('stagiaire.update',['id'=>$id])}}" method="post">
                @csrf
                <div class="bordure">
                    <div class="form-group">
                        <label> Nom : </label>
                        <input type="text" name="nom" placeholder="nom" class="form-control w-75"
                               value="{{ old('nom', $stagiaire->nom ?? '') }}">
                        @error('nom')
                        <span class="text-danger"> {{ $message}} </span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label> {{__('Prenom')}} : </label>
                        <input type="text" name="prenom" placeholder="prenom" class="form-control w-75"
                               value="{{ old('prenom', $stagiaire->prenom ?? '') }}">
                        @error('prenom')
                        <span class="text-danger"> {{ $message}} </span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label> {{__('Email')}} : </label>
                        <input type="email" name="email" placeholder="email" class="form-control w-75"
                               value="{{ old('email', $stagiaire->email ?? '') }}">
                        @error('email')
                        <span class="text-danger"> {{ $message}} </span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label> {{__('Telephone')}} : </label>
                        <input type="tel" name="telephone" maxlength="8" pattern="\d{8}" placeholder="+216"
                               class="form-control w-75"
                               value="{{ old('telephone', $stagiaire->telephone ?? '') }}">
                        @error('telephone')
                        <span class="text-danger"> {{ $message}} </span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label> {{__('Filière')}} : </label>
                        <select name="filiere" class="form-control w-75">
                            <option value="">{{__('Sélectionner une filière')}}</option>
                            <option
                                value="informatique" {{ old('filiere', $stagiaire->filiere ?? '') == 'informatique' ? 'selected' : '' }}>{{__('Informatique')}}</option>
                            <option
                                value="gestion" {{ old('filiere', $stagiaire->filiere ?? '') == 'gestion' ? 'selected' : '' }}>{{__('Gestion')}}</option>
                            <option
                                value="marketing" {{ old('filiere', $stagiaire->filiere ?? '') == 'marketing' ? 'selected' : '' }}>{{__('Marketing')}}</option>
                            <option
                                value="finance" {{ old('filiere', $stagiaire->filiere ?? '') == 'finance' ? 'selected' : '' }}>{{__('Finance')}}</option>
                            <option
                                value="ressources_humaines" {{ old('filiere', $stagiaire->filiere ?? '') == 'ressources_humaines' ? 'selected' : '' }}>{{__('Ressources Humaines')}}</option>
                        </select>
                        @error('filiere')
                        <span class="text-danger"> {{ $message}} </span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label> {{__('Date de debut')}} :</label>
                        <input type="date" name="date_debut_stage"
                               value="{{ old('date_debut_stage', $stagiaire->date_debut_stage ?? '') }}">
                        @error('date_debut_stage')
                        <span class="text-danger"> {{ $message}} </span>
                        @enderror
                        <label>< {{__('Date du fin')}}</label>
                        <input type="date" name="date_fin_stage"
                               value="{{ old('date_fin_stage', $stagiaire->date_fin_stage ?? '') }}">
                        @error('date_fin_stage')
                        <span class="text-danger"> {{ $message}} </span>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary float-end">
                        {{ is_null($id) ? __('Ajouter') : __('Modifier') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
