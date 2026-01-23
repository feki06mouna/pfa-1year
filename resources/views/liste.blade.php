<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Stagiaires</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="text-center mb-5"> Liste des Stagiaires </h1>
    @if(session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <!-- ajouter le boutton ajouter à droite -->
    <div class="d-flex justify-content-end mb-4">
        <!-- mb:margin butom /d-flex:display:flex; a la meme ligne /justify-content-end :a droite -->
        <a href="/form" class="btn btn-primary">Ajouter</a>
    </div>

    @foreach($Stagiaires as $Stagiaire)
        <div class="card my-2">
            <div class="card-body">
                <ol>
                    <li>
                        <p>
                            <b>Nom et Prénom :</b>
                            <i>{{$Stagiaire->nom}}</i> -
                            <i>{{$Stagiaire->prenom}}</i>
                        </p>
                    </li>
                    <li>
                        <p>
                            <b>Email :</b>
                            {{$Stagiaire->email}}
                        </p>
                    </li>
                    <li>
                        <p>
                            <b>Teléphone :</b>
                            {{$Stagiaire->telephone}}
                        </p>
                    </li>
                    <li>
                        <p>
                            <b>Filière :</b>
                            {{$Stagiaire->filiere}}
                        </p>
                    </li>
                    <li>
                        <p>
                            <b>Date de debut et fin :</b>
                            {{$Stagiaire->date_debut_stage}} /
                            {{$Stagiaire->date_fin_stage}}
                        </p>
                    </li>
                </ol>
            </div>
            <div class="card-footer">
                <a class="btn btn-success btn-sm mx-2 float-end" href="{{ route('editStagiaire',['id'=>$Stagiaire->id])}}"
                   onclick="return confirm('voulez-vous vraiment modifier ce stagiaire')"> Modifier </a>
                <a class="btn btn-danger btn-sm mx-2 float-end" href="{{ route('deleteStagiaire',['id'=>$Stagiaire->id])}}"
                   onclick="return confirm('voulez-vous vraiment supprimer ce stagiaire')"> Supprimer </a>
            </div>
        </div>
    @endforeach
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</html>
