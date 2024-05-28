@extends('layout')
@section('title', 'Chauffeurs')

@section('content')
    <div class="content">
            <div class="starter-template">
                <div class="row">
                    <div class="col-xs">
						<h1>Liste des chauffeurs : <a href="{{ route('chauffeurs.create') }}" class="btn btn-secondary">Nouveau</a></h1>
					</div>
                    <div class="col-xs"></div>
                    <div class="col-xs"></div>
                </div>

                <table class="table table-hover">
                	<thead>
                		<th>#</th>
                		<th>Nom</th>
                		<th>Prenom</th>
                		<th></th>
                		<th></th>
                        <th></th>
                	</thead>
                	<tbody>
                		@foreach ($pilote as $p)
	                		<tr>
	                			<td>{{ $p->id }}</td>
	                			<td>{{ $p->nom }}</td>
	                			<td>{{ $p->prenom }}</td>

	                			<td><a class="btn btn-success" href="{{ route('chauffeurs.show', $p->id) }}">Voir</a></td>
                                <td><a class="btn btn-warning" href="{{ route('chauffeurs.edit', $p->id) }}">Modifier</a></td>
	                			<td>
									{{ Form::open([
										'route' => ['chauffeurs.delete', $p->id],
										'class' => 'form-horizontal',
										'method' => 'delete',
										'onsubmit' => 'return confirm("Etes-vous sur?");' ]) 
									}}

										<div class="form-group">
											{{ Form::submit('Supprimer', ['class' => 'btn btn-danger']) }}
										</div>
									{{ Form::close() }}
								</td>
	                		</tr>							    
						@endforeach
                	</tbody>

                </table>
            </div>
    </div>
@endsection