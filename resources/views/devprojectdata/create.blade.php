<!-- resources/views/devprojectdata/create.blade.php -->

<h1>Create Dev Project Data</h1>

<form method="POST" action="{{ route('devprojectdata.store') }}">
    @csrf

    <label for="name">Name:</label>
    <input type="text" name="name" id="name">

    <label for="slug">Slug:</label>
    <input type="text" name="slug" id="slug">

    <button type="submit">Create</button>
</form>

<a href="{{ route('devprojectdata.index') }}">Back</a>
