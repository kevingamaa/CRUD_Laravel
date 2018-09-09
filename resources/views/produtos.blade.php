@extends('layout.app',["current" => "produtos"])

@section('title', 'Produtos')

@section('body')
	<div class="card border">
		<div class="card-header">
			<h5 class="card-title">Produtos</h5>
		</div>
	
		<div class="card-body"> 
			<table class="table table-ordered table-hover">
				<thead>
					<tr>
						<th>Código</th>
						<th>Nome</th>
						<th>Quantidade</th>
						<th>Preço</th>
						<th>Departamento</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
		<div class="card-footer">
			<button type="button" class="btn btn-primary btn-sm btn-novo">
				Novo produto
			</button>
		</div>
	</div>


	<div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form class="form-horizontal" id="formProduto" action="/api/produtos">
					<div class="modal-header">
						<h4 class="modal-title">Novo produto</h4>
					</div>

					<div class="modal-body">
						<input type="text" name="id" id="id" hidden="" class="form-control">
						<div class="form-group">
							<label class="nome">Nome</label>
							<div class="input-group">
								<input type="name" id="nome" name="nome" placeholder="Nome do produto" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="preco">Preço</label>
							<div class="input-group">
								<input type="number" id="preco" name="preco" placeholder="Preço do produto" class="form-control">
							</div>
						</div>


						<div class="form-group">
							<label class="qtd">Quantidade</label>
							<div class="input-group">
								<input type="number" id="estoque" name="estoque" placeholder="Quantidade do produto" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="categoriaProduto">Categoria</label>
							<div class="input-group">
								<select class="custom-select" id="categoria_id" name="categoria">

								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" >
							Salvar
						</button>

						<button type="cancel" class="btn btn-secondary btn-cancela" data-dismiss="modal" >
							cancelar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection



@section('js')
	 <script type="text/javascript">
	 	$.ajaxSetup({
	 		headers: {
	 			'X-CSRF-TOKEN': "{{ csrf_token() }}"
	 		}
	 	});

	 	$('.btn-novo').click(function(){
	 		$('#dlgProdutos').show('3000').modal('show');

	 		$.getJSON('/api/categorias', function(data){
	 			$.each(data, function(i,e){
	 				$('#categoria_id').append('<option value="'+e.id+'">'+e.nome+'</option>')
	 			});
	 		});
	 	});


	 	$('.btn-cancela').click(function(){
	 		limpaForm();
	 	});

	 	function limpaForm(){
	 		$('#formProduto').find('.form-control').val('');
	 		$('#categoria_id').find('option').remove();
	 	}


	 	var table = $('.card-body').find('table tbody');
	 	var linha = function(e){
	 		return `
				<tr>
					<td>`+e.id+`</td>
					<td>`+e.nome+`</td>
					<td>`+e.estoque+`</td>
					<td>`+e.preco+`</td>
					<td>`+e.categoria_id+`</td>
					<td>
						<button type="button" class="btn btn-primary btn-sm btn-edit" onclick="">Editar</button>
						<button type="button" class="btn btn-danger btn-sm btn-remove" onclick="remover(`+e.id+`)">Apagar</button>
					</td>
				</tr>
	 		`;
	 	}

	 	function carregaProdutos(){
	 		$.getJSON('/api/produtos', function(data){
	 			$.each(data, function(i,e){
	 				table.append(linha(e));
	 			});
	 		});

	 	}

	 	$(function(){
	 		carregaProdutos();
	 	});
		
		function remover(id){
			 
			 


			$.ajax({
				url: '/api/produtos/'+id,
				type: 'DELETE',
				context: this,
				success: function(){
					
					e = table.children().filter(function(i,e){
						return e.cells[0].textContent == id;
					});

					if (e) {
						e.hide('3000');
					}
				},
				error: function(error){
					console.log(error);
				}

			});
		}

	 	$('form').submit(function(e){
	 		e.preventDefault();

	 		var form = $(this);
	 		var action = form.attr('action');

	 		$.post(action, form.serialize(), function(data){
	 			var produto = JSON.parse(data);
	 			form.parents('.modal').modal('hide').fadeOut('slow');
	 			table.fadeOut().append(linha(produto)).show('slow');

	 			limpaForm();
	 		});
	 	});



	 	
	 </script>
@endsection
