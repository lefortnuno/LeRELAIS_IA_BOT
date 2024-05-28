@extends('layout')
@section('title', 'Creation de Chauffeur')

@section('content')
<div class="content">
    <div class="starter-template">
    	<h1>Ajouter un chauffeur</h1>
    	{{ Form::open([
			'route' => 'chauffeurs.store', 
			'class' => 'form-horizontal' ]) 
		}}
    		<div class="form-group">
    			<label for="nom" class="col-sm-2 control-label"> Nom :</label>
    			<div class="col-sm-10">
    				{{ Form::text('nom', False, ['class' => 'form-control', 'placeholder' => 'Entrer un nom']) }}
    			</div>	
    		</div>
    		<div class="form-group">
    			<label for="prenom" class="col-sm-2 control-label"> Prenom :</label>
    			<div class="col-sm-10">
    				{{ Form::text('prenom', False, ['class' => 'form-control', 'placeholder' => 'Prénom']) }}
    			</div>	
    		</div>

    		<div class="form-group">
    			<div class="col-sm-offset-2 col-sm-10">
    				{{ Form::submit('Enregistrer', ['class' => 'btn btn-success']) }}
					<a class="btn btn-danger" href="{{ route('chauffeurs.list') }}">
						Annuler
					</a>
    			</div>
    		</div>
		{{ Form::close() }}
    </div>
</div>
@endsection