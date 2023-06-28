<!-- resources/views/devprojectdata/edit.blade.php -->

<h1>Edit Dev Project Data: {{ $devprojectdata->name }}</h1>

<form method="POST" action="{{ route('devprojectdata.update', $devprojectdata->id) }}">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $devprojectdata->name }}">

    <label for="slug">Slug:</label>
    <input type="text" name="slug" id="slug" value="{{ $devprojectdata->slug }}">

    <button type="submit">Update</button>
</form>

<a href="{{ route('devprojectdata.show', $devprojectdata->id) }}">Cancel</a>
