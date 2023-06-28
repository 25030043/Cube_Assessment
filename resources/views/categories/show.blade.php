<!-- resources\views\categories\show.blade.php -->
<h1>Category: {{ $category->name }}</h1>

<a href="{{ route('categories.index') }}">Back</a>

<p>Name: {{ $category->name }}</p>

<h2>Products</h2>
<a href="{{ route('devprojectdata.create') }}">Add New Product</a>
<ul>
    @if($category->products)
        @foreach($category->products as $product)
			<li>
				<a href="{{ route('devprojectdata.show', $product->id) }}">{{ $product->name }}</a>
				<form method="POST" action="{{ route('devprojectdata.destroy', $product->id) }}" style="display: inline-block">
					@csrf
					@method('DELETE')
					<button type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
				</form>
				<a href="{{ route('devprojectdata.edit', $product->id) }}">Edit</a>
			</li>
		@endforeach
    @endif
</ul>

