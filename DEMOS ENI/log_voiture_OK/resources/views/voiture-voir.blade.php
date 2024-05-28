@extends('layout')
@section('title', 'Voiture : {{ $bolide->numero }}')

@section('content')

    <div class="content">
        <main class="container-fluid mb-4">
            <section class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-3">
                    <section class="card">
                        <div class="card-header bg-primary text-white">
                            <h1 class="h3">Info : Voiture</h1>
                        </div>
                        <figure class="figure">
                            <img src="https://svgsilh.com/png-1024/2546164.png" alt="#" class="card-img-top img-thumbnail rounded"/>
                            <figcaption class="figure-caption text-right">LeRelais Mada.</figcaption>
                        </figure>
                        <div class="card-body">
                            <h1 class="h3 card-title">
                                Num Matr : {{ $bolide->numero }}<br>
                                Mouvement : {{ $bolide->etat }}<br>
                                Nombre de visite : {{ $nbrvisite }}<br>
                            </h1>
                            <a class="btn btn-warning" href="{{ route('voitures.edit', $bolide->id) }}">
                                Editer
                            </a>
                            <a class="btn btn-danger" href="{{ route('voitures.list', $bolide->id) }}">
                                Supprimer
                            </a>
                            <hr>

                            {{-- <a class="form-group">
                                {{ Form::open([
                                    'route' => ['voitures.delete', $bolide->id],
                                    'class' => 'btn',
                                    'method' => 'delete' ]) 
                                }}
                    
                                    <div class="form-group">
                                        <a class="btn btn-warning" href="{{ route('voitures.edit', $bolide->id) }}">
                                            Editer
                                        </a>
                                        {{ Form::submit('Supprimer', ['class' => 'btn btn-danger']) }}
                                    </div>
                                {{ Form::close() }}
                            </a> --}}
                        </div>
                        <a href="{{ route('voitures.list') }}" class="btn btn-primary">Retour à la liste</a>
                    </section>
                </div>
            </section>
        </main>
    </div>
@endsection