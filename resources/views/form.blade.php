<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        h1{
            text-decoration: underline;
        }
        .bordure{
            border: 2px solid;
            border-radius: 20px;
            padding: 20px 45px;
            margin: 50px 20px;
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <h1 class="text-center">Informations d’un stagiaire </h1>

    <form action="'/add' }}" method="post">  <!--  update n'est jamais appele /lorsque j'appui sur submit '/add' qui fonctionne-->
    @csrf
    <div class="bordure">
    <div class="form-group">
        <label> Nom : </label>
        <input type="text" name="nom" placeholder="nom" class="form-control w-75" value="{{ old('nom', $stagiaire->nom ?? '') }}"> <!-- ?? if null affiche ''  ou sol.2 add $stagiaire = new Stagiaire() et passer compact('stagiaire') dans view-->
        @error('nom')
           <span class="text-danger"> {{ $message}} </span>
        @enderror
    </div>
    <br>
    <div class="form-group">
        <label> Prenom : </label>
        <input type="text" name="prenom" placeholder="prenom"  class="form-control w-75" value="{{ old('prenom', $stagiaire->prenom ?? '') }}">
        @error('prenom')
           <span class="text-danger"> {{ $message}} </span> 
        @enderror
    </div>
    <br>
    <div class="form-group">
        <label> Email : </label>
        <input type="email" name="email" placeholder="email"  class="form-control w-75"  value="{{ old('email', $stagiaire->email ?? '') }}">
        @error('email')
           <span class="text-danger"> {{ $message}} </span>
        @enderror
    </div>
    <br>
    <div class="form-group">
        <label> Telephone : </label> 
        <input type="tel" name="telephone" maxlength="8" pattern="\d{8}" placeholder="+216"  class="form-control w-75"
        value="{{ old('telephone', $stagiaire->telephone ?? '') }}">
        @error('telephone')
           <span class="text-danger"> {{ $message}} </span>
        @enderror
    </div>
    <br>
    <div class="form-group">
        <label> Filière : </label>
        <input type="text" name="filiere" placeholder="informatique"  class="form-control w-75" value="{{ old('filiere', $stagiaire->filiere ?? '') }}">
        @error('filiere')
           <span class="text-danger"> {{ $message}} </span>
        @enderror
    </div>
    <br>
    <div class="form-group">
        <label> Date de debut :</label>
        <input type="date" name="date_debut_stage" value="{{ old('date_debut_stage', $stagiaire->date_debut_stage ?? '') }}">
        @error('date_debut_stage')
           <span class="text-danger"> {{ $message}} </span>
        @enderror
        <label>< Date du fin</label>
        <input type="date" name="date_fin_stage" value="{{ old('date_fin_stage', $stagiaire->date_fin_stage ?? '') }}"">
        @error('date_fin_stage')
           <span class="text-danger"> {{ $message}} </span>
        @enderror
    </div>
    <br>
    <button type="submit" class="btn btn-primary"> Ajouter </button>
    
    </div>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>