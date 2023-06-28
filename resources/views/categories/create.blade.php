<!-- resources\views\categories\create.blade.php -->
<h1>Create Category</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <label for="name">Name</label>
    <input type="text" id="name" name="name" required>
    
    <label for="meta_files">Meta Files</label>
    <input type="text" id="meta_files" name="meta_files">
    
    <label for="meta_description">Meta Description</label>
    <textarea id="meta_description" name="meta_description"></textarea>
    
    <label for="meta_keywords">Meta Keywords</label>
    <input type="text" id="meta_keywords" name="meta_keywords">
    
    <button type="submit">Create</button>
</form>
