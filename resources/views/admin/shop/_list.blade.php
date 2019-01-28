@foreach($shops as $shop)
	<tr>
		<td>{{ $shop->name }}</td>
		<td>{{ $shop->createdBy() }}</td>
		<td>{{ $shop->editedBy() }}</td>
		<td class="d-flex options">
			{{-- <a href="{{ route('users.show', ['user' => $shop->id]) }}" class="flex-fill" title="Show">
				<i class="fa fa-eye"></i>
			</a> --}}
			<a href="{{ route('admin.shop.edit', ['shop' => $shop->id]) }}" class="flex-fill" class="Edit">
				<i class="text-success fa fa-edit"></i>
			</a>
			<a href="{{ route('admin.shop.delete', ['shop' => $shop->id]) }}" class="flex-fill delete" class="Delete">
				<i class="text-danger fa fa-trash" 
				onclick="event.preventDefault();
				document.getElementById('delete-form').submit();"></i>
			</a>
			<form id="delete-form" action="{{ route('admin.shop.delete', ['shop' => $shop->id]) }}" method="POST" style="display: none;">
				@csrf
			</form>
		</td>
	</tr>
@endforeach