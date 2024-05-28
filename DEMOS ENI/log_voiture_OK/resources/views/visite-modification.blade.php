@extends('layout')
@section('title', 'Modification de visite')

@section('content')
<div class="content">
    <div class="starter-template">
    	<h1>Modifier une visite</h1>
    	{{ Form::model($tsidika, [
                'route' => ['visites.update', $tsidika],
                'class' => 'form-horizontal', 
                'method' => 'put']
                ) 
        }}
    		<div class="form-group">
					<label for="chauffeur_id" class="col-sm-2 control-label">Chauffeur :</label>
					<div class="form-group col-sm-12">
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
						<a class="btn btn-danger" href="{{ route('visites.list') }}">
							Annuler
						</a>
					</td>
    			</div>
    		</div>
		{{ Form::close() }}
    </div>
</div>
@endsection