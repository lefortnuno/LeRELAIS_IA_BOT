@extends('layout')
@section('title', 'Voitures')

@section('content')
    <div class="content">
        <div class="container mt-3">
            <ul class="nav nav-tabs justify-content-start flex-column flex-md-row">
                <li class="nav-item"><a href="{{ route('voitures.list') }}" class="nav-link"> Toutes </a></li>
                <li class="nav-item"><a href="{{ route('voitures.list.dispo') }}" class="nav-link"> Flotte </a></li>
                <li class="nav-item"><a href="{{ route('voitures.list.parking') }}" class="nav-link"> Au Parking </a></li>
                <li class="nav-item"><a href="{{ route('voitures.list.deRelais') }}" class="nav-link"> de Relais </a></li>
                <li class="nav-item"><a href="#" class="nav-link"> </a></li>
                <li class="nav-item"><a href="#" class="nav-link"> ... </a></li>
                <li class="nav-item"><a href="#" class="nav-link"> </a></li>
                <li class="nav-item"><a href="#" class="nav-link disabled"> Quitter </a></li>
            </ul>
        </div>
        <div class="starter-template">
            <div class="row">
                <div class="col-xs">
                    <h1>Liste des voitures {{ $titrement }} </h1>
                </div>
                <div class="col-xs"></div>
                <div class="col-xs"></div>
            </div>
            
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <th>#</th>
                    <th>N*Matricule</th>
                    <th>Entreprise</th>
                    <th>Mouvement</th>
                    <th>Chauffeur</th>
                    <th>Observation</th>
                </thead>
                <tbody>
                    @foreach ($bolide as $b)
                        <tr> 
                            <td>{{ $b->id }}</td>
                            <td>{{ $b->numero }}</td>
                            <td>{{ $b->entreprise }}</td>
                            <td>{{ $b->etat }}</td>
                            <td>{{ $b->chauffeur->nom }}</td>
                            <td>{{ $b->commentaire }}</td>

                            <td><a class="btn btn-success" href="{{ route('voitures.show', $b->id) }}">Voir</a></td>
                            <td><a class="btn btn-warning" href="{{ route('voitures.edit', $b->id) }}">Modifier</a></td>
                            {{-- <td>
                                {{ Form::open([
                                    'route' => ['voitures.delete', $b->id],
                                    'class' => 'form-horizontal',
                                    'method' => 'delete',
									'onsubmit' => 'return confirm("Etes-vous sur?");' ]) 
                                }}
                    
                                    <div class="form-group">
                                        {{ Form::submit('Supprimer', ['class' => 'btn btn-danger']) }}
                                    </div>
                                {{ Form::close() }}
                        </td> --}}
                        </tr>							    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection