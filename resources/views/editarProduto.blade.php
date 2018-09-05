@extends('layout.app',["current" => "Produtos"])

@section('title', 'Produtos')

@section('body')

	<div class="card border">
		<div class="card-body">
			<form action="/produtos/{{ $prod->id }}" method="post">
				@csrf

				<div class="form-row">
					<div class="col-md-4 form-group">
						<label for="nomeCategoria">Nome do produto </label>
						<input type="text" name="nomeProduto" id="nomeProduto" class="form-control" placeholder="Produto" value="{{ $prod->nome }}">
					</div>

					<div class="col-md-4 form-group">
						<label for="preco">Preço R$</label>
						<input type="text" name="preco" id="preco" class="form-control" value="{{$prod->preco}}">	
					</div>

					<div class="col-md-3">
						<label for="cat">Categoria</label>
						<select class="custom-select" id="cat" name="categoria">
							<option>Escolha a categoria</option>
							
							@foreach($cat as $c)
								@if($prod->categoria_id == $c->id)
									<option value="{{$c->id}}" selected >
										{{$c->nome}}
									</option>
								@else
									<option value="{{$c->id}}">
										{{$c->nome}}
									</option>
								@endif
							@endforeach

						</select>
					</div>

					<div class="col-md-1 form-group">
						<label for="preco">Estoque</label>
						<input type="number" name="estoque" id="estoque" class="form-control" value="{{$prod->estoque}}" min="0">	
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