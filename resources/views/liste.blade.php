<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{__('Liste des Stagiaires')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="text-center mb-5"> {{__('Liste des Stagiaires')}} </h1>
    @if(session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('stagiaire.form') }}" class="btn btn-primary">{{__('Ajouter')}}</a>
    </div>

    @foreach($Stagiaires as $key => $Stagiaire)
        <div class="card my-2">
            <div class="card-header">
                <b>{{__('Nom et Prénom')}} :</b>
                <span>{{$Stagiaire->nom}} {{$Stagiaire->prenom}}</span>
            </div>
            <div class="card-body">
                <ul>
                    <li>
                        <b>{{__('Email')}} :</b>
                        <span>   {{$Stagiaire->email}}</span>
                    </li>
                    <li>
                        <b>{{__('Teléphone')}} :</b>
                        <span>  {{$Stagiaire->telephone}}</span>
                    </li>
                    <li>
                            <b>{{__('Filière')}} :</b>
                            <span>    {{$Stagiaire->filiere}}</span>
                    </li>
                    <li>
                        <b>{{__('Date de debut et fin')}} :</b>
                        <span>{{$Stagiaire->date_debut_stage}} / {{$Stagiaire->date_fin_stage}}</span>
                    </li>
                </ul>
            </div>
            <div class="card-footer">
                <a class="btn btn-danger btn-sm mx-2 float-end"
                   href="{{ route('stagiaire.delete',['id'=>$Stagiaire->id])}}"
                   onclick="return confirm('voulez-vous vraiment supprimer ce stagiaire')"> {{__('Supprimer')}} </a>
                <a class="btn btn-success btn-sm mx-2 float-end"
                   href="{{ route('stagiaire.edit',['id'=>$Stagiaire->id])}}"
                   onclick="return confirm('voulez-vous vraiment modifier ce stagiaire')"> {{__('Modifier')}} </a>
            </div>
        </div>
    @endforeach
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</html>
