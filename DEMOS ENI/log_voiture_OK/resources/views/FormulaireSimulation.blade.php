@extends('layout')
@section('title', 'WEB CAM')

@section('content')
<div class="content">
    <div class="starter-template">
    	<h1>Mes Information</h1>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
		@if(session()->has('message'))
			<div class="alert alert-success">
				{{ session()->get('message') }}
			</div>
		@endif
    	{{ Form::open([
			'route' => 'infos.store', 
			'class' => 'form-horizontal' ]) 
		}}
    		<div class="form-group">
    			<label for="numero" class="col-sm-2 control-label"> Numero Matricule : </label>
    			<div class="col-sm-10">
    				{{ Form::text('numero', False, ['class' => 'form-control', 'placeholder' => 'Entrer un IM']) }}
    			</div>	
    		</div>

    		<div class="form-group col-sm-14">
                <select name="mouvement" class="form-control" for="mouvement">
                    <option value="E" selected>Entre</option>
                    <option value="S">Sortie</option>
                </select>
    		</div>

    		<div class="form-group">
    			<div class="col-sm-offset-2 col-sm-10">
    				{{ Form::submit('Enregistrer', ['class' => 'btn btn-default']) }}
    			</div>
    		</div>
		{{ Form::close() }}
    </div>
</div>
@endsection