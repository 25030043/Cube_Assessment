<h1>Dev Project Data: {{ $devprojectdata->name }}</h1>
<a href="{{ route('devprojectdata.index') }}">Back</a>

<p>Name: {{ $devprojectdata->name }}</p>
<p>Slug: {{ $devprojectdata->slug }}</p>

<!-- Display product variants -->
@if ($devprojectdata->variants->count() > 0)
    <h2>Product Variants</h2>
    <ul>
        @foreach ($devprojectdata->variants as $variant)
            <li>
                {{ $variant->name }}
                <a href="{{ route('devprojectdata.variants.edit', [$devprojectdata, $variant]) }}">Edit</a>
                <form method="POST" action="{{ route('devprojectdata.variants.destroy', [$devprojectdata, $variant]) }}" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this product variant?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@else
    <p>No product variants found.</p>
@endif
