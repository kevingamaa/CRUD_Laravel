@extends('layout.app',["current" => "categorias"])

@section('title', 'Categorias')

@section('body')
	<div class="card border">
		<div class="card-body">
			<form action="/categorias" method="post">
				@csrf
				
				<div class="form-group">
					<label for="nomeCategoria">Nome da Categoria</label>
					<input type="text" name="nome" id="nomeCategoria" class="form-control {{ $errors->has('nome')? 'is-invalid' : ''}}" placeholder="Categoria">

					@if($errors->has('nome'))
						<div class="invalid-feedback">
							{{ $errors->first('nome') }}
						</div>
					@endif
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