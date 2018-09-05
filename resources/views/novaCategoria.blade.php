@extends('layout.app',["current" => "categorias"])

@section('title', 'Categorias')

@section('body')
	<div class="card border">
		<div class="card-body">
			<form action="/categorias" method="post">
				@csrf
				
				<div class="form-group">
					<label for="nomeCategoria">Nome da Categoria</label>
					<input type="text" name="nomeCategoria" id="nomeCategoria" class="form-control" placeholder="Categoria">
				</div>
				
				<button type="submit" class="btn btn-sm btn-outline-primary">
					Salvar
				</button>

				<a href="/categorias" class="btn btn-sm btn-danger">
					cancelar
				</a>
			</form>
		</div>
	</div>
	
@endsection