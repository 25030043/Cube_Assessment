<h1>Dev Project Data</h1>

<a href="{{ route('devprojectdata.create') }}">Create New Dev Project Data</a>

@if ($devprojectdata->count() > 0)
    <ul>
        @foreach ($devprojectdata as $data)
            <li>
                <a href="{{ route('devprojectdata.show', $data->id) }}">{{ $data->name }}</a>
                <a href="{{ route('devprojectdata.edit', $data->id) }}">Edit</a>
                <form method="POST" action="{{ route('devprojectdata.destroy', $data->id) }}" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this dev project data?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@else
    <p>No dev project data available.</p>
@endif
