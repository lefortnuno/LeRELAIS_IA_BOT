@extends('layout')
@section('title', 'Visites')

@section('content')
    <div class="content">
        <div class="starter-template">
            <div class="row">
                <div class="col-xs">
                    <h1>Liste des visites {{ $text }}</h1>
                     {{ Form::open([
                        'route' => 'visites.check', 
                        'class' => 'form-horizontal' ]) 
                    }}
                    
                    <table class="table">
                        <tbody>
                                <tr> 
                                    <td class="text-dark">Du : </td>
                                    <td>
                                        <div class=" col-sm-12">
                                            {{ Form::date('dateto', $default1,['class' => 'form-control']) }}
                                        </div>
                                    </td>
                                    <td class="text-dark"> Au : </td>
                                    <td>
                                        <div class="col-sm-12">
                                            {{ Form::date('datefrom', $default2,['class' => 'form-control']) }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-12" >
                                            {{ Form::submit('Lister', ['class' => 'text-info']) }}
                                        </div>
                                    </td>
                                </tr>	 
                        </tbody>
                    </table>
                    {{ Form::close() }}  
                </div>
                <div class="col-xs"></div>
                <div class="col-xs"></div>
            </div> 
            <br>
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <th>#</th>
                    <th data-sortable="false">Date et Heure</th>
                    <th data-sortable="false">Mouvement</th>
                    <th data-sortable="false">Voiture</th>
                    <th data-sortable="false">Entreprise</th>
                    <th data-sortable="false">Chauffeur</th>
                    <th data-sortable="false"></th>
                    <th data-sortable="false"></th>
                </thead>
                <tbody>
                    @foreach ($tsidika as $t)
                        <tr> 
                            <td>{{ $t->id }}</td>
                            <td>{{ $t->dateheure->format('d/m/Y H:i') }}</td>
                            <td>{{ $t->mouvement }}</td>
                            <td>{{ $t->voiture->numero }}</td>
                            <td>{{ $t->voiture->entreprise}}</td>
                            <td>{{ $t->voiture->chauffeur->nom }}</td>
                            <td><a class="btn btn-success" href="{{ route('visites.show', $t->id) }}">Voir</a></td>
                            <td><a class="btn btn-warning" href="{{ route('visites.edit', $t->id) }}">Modifier</a></td>
                        </tr>	
                        					    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection