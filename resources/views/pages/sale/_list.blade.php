@foreach($sales as $sale)
	<tr>
		<td>{{ $sale->name }}</td>
		<td>{{ $sale->end_date->format('d/m/Y') }}</td>
		<td>{{ $sale->createdBy() }}</td>
		<td>{{ $sale->editedBy() }}</td>
		<td class="d-flex options">
			{{-- <a href="{{ route('users.show', ['user' => $sale->id]) }}" class="flex-fill" title="Show">
				<i class="fa fa-eye"></i>
			</a> --}}
			<a href="{{ route('sale.edit', ['sale' => $sale->id]) }}" class="flex-fill" class="Edit">
				<i class="text-success fa fa-edit"></i>
			</a>
			<a href="{{ route('sale.delete', ['sale' => $sale->id]) }}" class="flex-fill delete" class="Delete">
				<i class="text-danger fa fa-trash" 
				onclick="event.preventDefault();
				document.getElementById('delete-form').submit();"></i>
			</a>
			<form id="delete-form" action="{{ route('sale.delete', ['sale' => $sale->id]) }}" method="POST" style="display: none;">
				@csrf
			</form>
		</td>
	</tr>
@endforeach