@extends('layout.app',["current" => "produtos"])

@section('title', 'Produtos')

@section('body')
	<div class="card border">
		<div class="card-header">
			<h5 class="card-title">Produtos</h5>
		</div>
	
		<div class="card-body"> 
		@if(count($prod) > 0)
			<table class="table table-ordered table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Código</th>
						<th>Categoria</th>
						<th>Nome do Produto</th>
						<th>Estoque</th>
						<th>Preço</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($prod as $p)
						<tr>
							<td>{{ $loop->iteration }} </td>
							<td>{{ $p->id }}</td>
							<td>
							@foreach($cat as $c)
								@if($c->id == $p->categoria_id)
									{{ $c->nome }} 
								@endif
							@endforeach
							</td>
							<td>{{ $p->nome }} </td>
							<td>{{ $p->estoque }}</td>
							<td>R${{ $p->preco }}</td>
							<td> 
								<a href="/produtos/editar/{{ $p->id }}" class="btn btn-info btn-sm">Editar</a>
								<a href="/produtos/apagar/{{ $p->id }}" class="btn btn-danger btn-sm">Apagar</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@endif
		</div>
		<div class="card-footer">
			<a href="/produtos/novo/produto" class="btn btn-primary btn-sm">
				Adicionar Produto
			</a>

			<a href="/produtos/apagartodos" class="btn btn-outline-danger btn-sm">
				Apagar todos !
			</a>
		</div>
	</div>
@endsection