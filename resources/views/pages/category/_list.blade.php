@foreach($categories as $category)
	<tr>
		<td>{{ $category->name }}</td>
		<td>{{ $category->createdBy() }}</td>
		<td>{{ $category->editedBy() }}</td>
		<td class="d-flex options">
			{{-- <a href="{{ route('users.show', ['user' => $category->id]) }}" class="flex-fill" title="Show">
				<i class="fa fa-eye"></i>
			</a> --}}
			<a href="{{ route('category.edit', ['category' => $category->id]) }}" class="flex-fill" class="Edit">
				<i class="text-success fa fa-edit"></i>
			</a>
		<a href="{{ route('category.delete', ['category' => $category->id]) }}" class="flex-fill delete" class="Delete">
				<i class="text-danger fa fa-trash" 
				onclick="event.preventDefault();
				document.getElementById('delete-form').submit();"></i>
			</a>
			<form id="delete-form" action="{{ route('category.delete', ['category' => $category->id]) }}" method="POST" style="display: none;">
				@csrf
			</form>
		</td>
	</tr>
@endforeach