@foreach($products as $product)
	<tr>
		<td>{{ $product->name }}</td>
		<td>{{ $product->getCategoryName() }}</td>
		<td>{{ $product->createdBy() }}</td>
		<td>{{ $product->editedBy() }}</td>
		<td class="d-flex options">
			{{-- <a href="{{ route('users.show', ['user' => $product->id]) }}" class="flex-fill" title="Show">
				<i class="fa fa-eye"></i>
			</a> --}}
			<a href="{{ route('product.edit', ['product' => $product->id]) }}" class="flex-fill" class="Edit">
				<i class="text-success fa fa-edit"></i>
			</a>
		<a href="{{ route('product.delete', ['product' => $product->id]) }}" class="flex-fill delete" class="Delete">
				<i class="text-danger fa fa-trash" 
				onclick="event.preventDefault();
				document.getElementById('delete-form').submit();"></i>
			</a>
			<form id="delete-form" action="{{ route('product.delete', ['product' => $product->id]) }}" method="POST" style="display: none;">
				@csrf
			</form>
		</td>
	</tr>
@endforeach