{{--  @foreach ($categories as $category)
    <option value="{{ $category->id }}">
        {!! $prefix . $category->category_name !!}
    </option>
    @if ($category->children && $category->children->isNotEmpty())
        @include('partials.category_options', [
            'categories' => $category->children,
            'prefix' => $prefix . $category->category_name . ' > ',
        ])
    @endif
@endforeach  --}}

{{--  @foreach ($categories as $category)
    @if ($category->parent_id == 0)
        <option value="{{ $category->id }}">
            {!! $prefix . $category->category_name !!}
        </option>
    @endif


    @if ($category->children && $category->children->isNotEmpty())
    @php
        $childCategory = $category->children;
    @endphp
    @foreach ($childCategory as $child)
 <option value="{{ $child->id }}">
        {!! $prefix . $child->category_name !!}
    </option>
    @endforeach

    @endif
@endforeach  --}}
