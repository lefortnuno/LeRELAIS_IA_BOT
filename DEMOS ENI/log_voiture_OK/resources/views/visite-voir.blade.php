@extends('layout')
@section('title', 'Visite : {{ $tsidika->id }}')

@section('content')
    <div class="content">
        <main class="container-fluid mb-4">
            <section class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-3">
                    <section class="card">
                        <div class="card-header bg-primary text-white">
                            <h1 class="h3">Info : Visite</h1>
                        </div>
                        <figure class="figure">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZdM0eorZPi5HDpkCNdKdnZ7ggGbQyI7gPnn0hUeSDcLkCIlPl--e1ezuxzexvnf_jacA&usqp=CAU" alt="#" class="card-img-top img-thumbnail rounded"/>
                            <figcaption class="figure-caption text-right">LeRelais Mada.</figcaption>
                        </figure>
                        <div class="card-body">
                            <h1 class="h3 card-title">
                                Chauffeur : {{ $tsidika->chauffeur_id }}<br>
                                Num Matr : {{ $tsidika->voiture_id }}<br>
                                Mouvement : {{ $tsidika->mouvement }}<br>
                            </h1>

                            <a class="btn btn-warning" href="{{ route('visites.edit', $tsidika->id) }}">
                                Editer
                            </a>
                            <a class="btn btn-danger" href="{{ route('visites.list', $tsidika->id) }}">
                                Supprimer
                            </a>
                            <hr>

                            {{-- <a class="form-group">
                                {{ Form::open([
                                    'route' => ['visites.delete', $tsidika->id],
                                    'class' => 'btn',
                                    'method' => 'delete' ]) 
                                }}
                    
                                    <div class="form-group">
                                        <a class="btn btn-warning" href="{{ route('visites.edit', $tsidika->id) }}">
                                            Editer
                                        </a>
                                        {{ Form::submit('Supprimer', ['class' => 'btn btn-danger']) }}
                                    </div>
                                {{ Form::close() }}
                                </a> --}}
                        </div>
                        <a href="{{ route('visites.list') }}" class="btn btn-primary">Retour à la liste</a>
                    </section>
                </div>
            </section>
        </main>
    </div>
@endsection