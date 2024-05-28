@extends('layout')
@section('title', 'Modification du Voiture')

@section('content')
    <div class="content">
        <div class="starter-template">
            <h1>Modifier un voiture</h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    @if(is_array(session('success')))
                        <ul>
                            @foreach (session('success') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @else
                        {{ session('success') }}
                    @endif
                </div>
            @endif
            {{ Form::model($bolide, [
                'route' => ['voitures.update', $bolide],
                'class' => 'form-horizontal',
                'method' => 'put' ])
            }}
            <div class="form-group">
                <label for="numero" class="col-sm-2 control-label">Numero IM :</label>
                <div class="col-sm-10">
                    {{ Form::text('numero', $bolide->numero, ['class' => 'form-control', 'placeholder' => 'Numero IM']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="entreprise" class="col-sm-2 control-label">Entreprise :</label>
                <div class="col-sm-10">
                    {{ Form::text('entreprise', $bolide->entreprise, ['class' => 'form-control', 'placeholder' => 'Entreprise']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="commentaire" class="col-sm-2 control-label">Commentaire :</label>
                <div class="col-sm-10">
                    {{ Form::text('commentaire', $bolide->commentaire, ['class' => 'form-control', 'placeholder' => 'Observation']) }}
                </div>
            </div>
    		<div class="form-group col-sm-12">
                <label for="chauffeur_id" class="col-sm-2 control-label">Chauffeur :</label>
                
                <div class="form-group col-sm-8">
                    <select name="chauffeur_id" class="form-control">
                        <option value="{{ $pilote->id }}" selected class="form-control" >{{ $pilote->nom }}</option>
                        @foreach ($pilotes as $ps)	
                            <option value="{{ $ps->id }}" class="form-control" > {{ $ps->nom }} </option>					    
                        @endforeach
                    </select>
                </div>
    		</div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {{ Form::submit('Enregistrer', ['class' => 'btn btn-success']) }}
					<td>
                        <a class="btn btn-danger" href="{{ route('voitures.list') }}">Annuler</a>
                    </td>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection