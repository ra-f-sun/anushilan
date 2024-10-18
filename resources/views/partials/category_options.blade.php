@foreach ($categories as $category)
    <option value="{{ $category->id }}">
        {!! $prefix . $category->category_name !!}
    </option>
    @if ($category->children && $category->children->isNotEmpty())
        @include('partials.category_options', [
            'categories' => $category->children,
            'prefix' => $prefix . $category->category_name . ' > ',
        ])
    @endif
@endforeach

