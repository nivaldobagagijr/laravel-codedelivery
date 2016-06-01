@extends('app') 

@section('content')
<div class="container">

	<h3>Produtos</h3>

	<br>
	<a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">Novo Produto</a>
	<br>
	<br>
	<table class="table table-striped table-hover table-condensed">
		<thead>
		<tr>
			<th>ID</th>
			<th>Produto</th>
			<th>Categoria</th>
			<th>Preço</th>
			<th>Ação</th>
		</tr>
		</thead>

		<tbody>
			@foreach($products as $product)
			<tr>
				<td>{{$product->id}}</td>
				<td>{{$product->name}}</td>
				<td>{{$product->category->name}}</td>
				<td>{{$product->price}}</td>
				<td>
					<a href="{{route('admin.products.edit',['id'=>$product->id])}}" class="btn btn-default btn-sm">
						Editar
					</a>
					<a href="{{route('admin.products.destroy',['id'=>$product->id])}}" class="btn btn-default btn-sm">
						Remover
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{!! $products->render() !!}
</div>



@endsection