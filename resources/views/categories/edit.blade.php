<!-- resources\views\categories\edit.blade.php -->
<h1>Edit Category</h1>

<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ $category->name }}" required>
    
    <label for="meta_title">Meta Title</label>
    <input type="text" id="meta_title" name="meta_title" value="{{ $category->meta_title }}" required>
    
    <label for="meta_description">Meta Description</label>
    <textarea id="meta_description" name="meta_description" required>{{ $category->meta_description }}</textarea>
    
    <label for="meta_keywords">Meta Keywords</label>
    <input type="text" id="meta_keywords" name="meta_keywords" value="{{ $category->meta_keywords }}" required>
    
    <button type="submit">Update</button>
</form>
