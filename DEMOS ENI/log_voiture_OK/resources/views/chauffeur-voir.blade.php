@extends('layout')
@section('title', 'Chauffeur : {{ $pilote->prenom }}')

@section('content')
    <div class="content">
    <main class="container-fluid mb-4">
        <section class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-3">
                <section class="card">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h3">Info : Chauffeur</h1>
                    </div>
                    <figure class="figure">
                        <img src="https://img2.freepng.fr/20180623/hpj/kisspng-chauffeur-computer-icons-clip-art-special-tasks-patrol-police-5b2ee794829ba2.230708371529800596535.jpg" alt="#" class="card-img-top img-thumbnail rounded"/>
                        <figcaption class="figure-caption text-right">LeRelais Mada.</figcaption>
                    </figure>
                    <div class="card-body">
                        <h1 class="h3 card-title">
                            Nom : {{ $pilote->nom }}<br>
                            Prenom : {{ $pilote->prenom }}
                        </h1>
                        
                        <a class="form-group">
                            {{ Form::open([
                                'route' => ['chauffeurs.delete', $pilote->id],
                                'class' => 'btn',
                                'method' => 'delete' ]) 
                            }}
            
                                <div class="form-group">
                                    <a class="btn btn-warning" href="{{ route('chauffeurs.edit', $pilote->id) }}">
                                        Editer
                                    </a>
                                    {{ Form::submit('Supprimer', ['class' => 'btn btn-danger']) }}
                                </div>
                            {{ Form::close() }}
                        </a>
                    </div>
                    <a href="{{ route('chauffeurs.list') }}" class="btn btn-primary">Retour à la liste</a>
                </section>
            </div>
        </section>
    </main>
@endsection