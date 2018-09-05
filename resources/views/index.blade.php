@extends('layout.app',["current" => "home"])

@section('title', 'Home')

@section('body')
	<div class="jumbotron bg-light border border-secondary">
		<div class="row">
			<div class="card-deck">

				<div class="card border border-primary">
					<div class="card-body">
						<h5 class="card-titlw">Cadastro de produtos</h5>
						<p class="card-text">
							Aqui você cadastra todos os seu produtos.
							Só não se esqueça de cadastrar previamente as categorias
						</p>
						<a href="/produtos" class="btn btn-outline-primary">
							Cadastre seus produtos
						</a>
					</div>
				</div>

				<div class="card border border-primary">
					<div class="card-body">
						<h5 class="card-titlw">Cadastro de Categorias</h5>
						<p class="card-text">
							Cadastre as categorias dos seus produtos.
							Em seguida podera cadastrar seus produtos
						</p>
						<a href="/categorias" class="btn btn-outline-warning">
							Cadastre suas categorias
						</a>
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection