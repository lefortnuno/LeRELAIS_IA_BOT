@extends('layout')
@section('title', 'Modification de chauffeur')

@section('content')
<div class="content">
    <div class="starter-template">
    	<h1>Modifier un chauffeur</h1>
    	{{ Form::model($pilote, [
                'route' => ['chauffeurs.update', $pilote],
                'class' => 'form-horizontal', 
                'method' => 'put']
                ) 
        }}
    		<div class="form-group">
    			<label for="nom" class="col-sm-2 control-label"> Nom :</label>
    			<div class="col-sm-10">
    				{{ Form::text('nom', $pilote->nom, ['class' => 'form-control', 'placeholder' => 'Entrer un nom']) }}
    			</div>	
    		</div>
    		<div class="form-group">
    			<label for="prenom" class="col-sm-2 control-label"> Prenom :</label>
    			<div class="col-sm-10">
    				{{ Form::text('prenom', $pilote->prenom, ['class' => 'form-control', 'placeholder' => 'Prénom']) }}
    			</div>	
    		</div>

    		<div class="form-group">
    			<div class="col-sm-offset-2 col-sm-10">
    				{{ Form::submit('Enregistrer', ['class' => 'btn btn-success']) }}
					<td>
						<a class="btn btn-danger" href="{{ route('chauffeurs.list') }}">
							Annuler
						</a>
					</td>
    			</div>
    		</div>
		{{ Form::close() }}
    </div>
</div>
@endsection