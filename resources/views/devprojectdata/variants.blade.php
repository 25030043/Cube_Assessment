<!-- resources/views/devprojectdata/variants.blade.php -->

<h1>Product Variants for: {{ $devprojectdata->name }}</h1>

<a href="{{ route('devprojectdata.show', $devprojectdata->id) }}">Back</a>

@if($variants->count() > 0)
    <ul>
        @foreach($variants as $variant)
            <li>
                <p>SAP Product Code: {{ $variant->sap_product_code }}</p>
                <p>Web Product Code: {{ $variant->web_product_code }}</p>
                <p>Name: {{ $variant->name }}</p>
            </li>
        @endforeach
    </ul>
@else
    <p>No variants available.</p>
@endif
