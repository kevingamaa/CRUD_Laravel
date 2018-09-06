@extends('layout.app',["current" => "Produtos"])

@section('title', 'Novo Produto')

@section('body')
	<div class="card border">
		<div class="card-body">
			<form action="/produtos" method="post">
				@csrf

				

				<div class="form-row">
					<div class="col-md-4 form-group">
						<label for="nomeProduto">Nome do produto </label>
						<input type="text" name="nome" id="nomeProduto" class="form-control {{ $errors->has('nome')? 'is-invalid' : '' }}" placeholder="Produto">
						@if($errors->has('nome'))
							<div class="invalid-feedback">
								{{ $errors->first('nome') }}
							</div>
						@endif
					</div>

					<div class="col-md-4 form-group">
						<label for="preco">Preço R$</label>
						<input type="text" name="preco" id="preco" class="form-control  {{ $errors->has('preco')? 'is-invalid' : '' }} ">	
						@if($errors->has('preco'))
							<div class="invalid-feedback">
								{{ $errors->first('preco') }}
							</div>
						@endif
					</div>

					<div class="col-md-4">
						<label for="cat">Categoria</label>
						<select class="custom-select  {{ $errors->has('categoria')? 'is-invalid' : '' }}" id="cat" name="categoria">
							<option value="">Escolha a categoria</option>
							
							@foreach($cat as $c)
								<option value="{{$c->id}}">{{$c->nome}}</option>
							@endforeach

						</select>

						@if($errors->has('categoria'))
							<div class="invalid-feedback">
								{{ $errors->first('categoria') }}
							</div>
						@endif
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