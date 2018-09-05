@extends('layout.app',["current" => "Produtos"])

@section('title', 'novo Produto')

@section('body')

	@if($error == 'error')
		<small class="alert alert-warning p-3 m-2">
			Produto já existe!
		</small>
	@endif
	<div class="card border">
		<div class="card-body">
			<form action="/produtos" method="post">
				@csrf

				

				<div class="form-row">
					<div class="col-md-4 form-group">
						<label for="nomeCategoria">Nome do produto </label>
						<input type="text" name="nomeProduto" id="nomeProduto" class="form-control" placeholder="Produto">
					</div>

					<div class="col-md-4 form-group">
						<label for="preco">Preço R$</label>
						<input type="text" name="preco" id="preco" class="form-control">	
					</div>

					<div class="col-md-4">
						<label for="cat">Categoria</label>
						<select class="custom-select" id="cat" name="categoria">
							<option>Escolha a categoria</option>
							
							@foreach($cat as $c)
								<option value="{{$c->id}}">{{$c->nome}}</option>
							@endforeach

						</select>
					</div>
				</div>
				
				<button type="submit" class="btn btn-sm btn-outline-primary">
					Salvar
				</button>

				<a href="/produtos" class="btn btn-sm btn-danger">
					cancelar
				</a>
			</form>
		</div>
	</div>
	
@endsection