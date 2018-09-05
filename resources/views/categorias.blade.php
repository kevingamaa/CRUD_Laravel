@extends('layout.app', ["current" => "categorias"])

@section('title', 'Categorias')

@section('body')
	<div class="card border">
		<div class="card-header">
			<h5 class="card-title">Categorias</h5>
		</div>
	
		<div class="card-body"> 
		@if(count($cats) >0)
			<table class="table table-ordered table-hover">
				<thead>
					<tr>
						<th>Posição na tabela</th>
						<th>Código</th>
						<th>Nome da Categoria</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cats as $c)

						<tr>
							<td>{{ $loop->iteration }} </td>
							<td>{{ $c->id }} </td>
							<td>{{ $c->nome}} </td>
							<td> 
								<a href="/categorias/editar/{{$c->id}}" class="btn btn-info btn-sm">Editar</a>
								<a href="/categorias/apagar/{{$c->id}}" class="btn btn-danger btn-sm">Apagar</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@endif
		</div>
		<div class="card-footer">
			<a href="/categorias/novo" class="btn btn-primary btn-sm">
				Adicionar categoria
			</a>

			<a href="/categorias/apagartodos/" class="btn btn-outline-danger btn-sm">
				Apagar todos !
			</a>
		</div>
	</div>

@endsection