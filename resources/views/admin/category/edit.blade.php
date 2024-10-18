</div>
@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Edit Category</h4>
                <p class="card-description">
                    Please fill out the form below.
                </p>
                <form action="{{ route('category.update', $categories->id) }}" method="POST" class="forms-sample"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="form-group">
                            <label for="">Parent Menu</label>
                            <select class="form-control" name="parent_id">
                                <option value=""> Leave As Parent </option>

                                @foreach ($category as $p_menu)
                                    <option value="{{ $p_menu->id }}" @if ($categories->parent_id == $p_menu->id) selected @endif>
                                        {!! $p_menu->category_name !!} </option>
                                @endforeach
                            </select>
                            @if ($errors->has('parent_id'))
                                <span class="help-block">
                                    <p class="text-red">{{ $errors->first('parent_id') }}</p>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <textarea class="form-control" name="name" id="editor" rows="4">{{ old('description', $categories->category_name) }}</textarea

                            </div>
                            <div class="form-group">
                                <label for="">Description : </label>
                                <textarea class="form-control" name="description" id="editor1" rows="4">{{ old('description', $categories->description) }}</textarea
                            </div>
                            <div class="form-group">
                                <img src="{{ $categories->getFirstMediaUrl() ?? '' }}" class="" alt="" />
                                <label for="exampleInputName1">Image</label>
                                <input type="file" class="form-control" name="image" id="image" placeholder="image">
                                @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
{{--  @dd($categories);  --}}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Is it premium category?</label>
                                <select class="form-control" name="premium" id="premiumSelect" placeholder="Is it premium category">
                                    <option value="">Select one</option>
                                    <option value="yes" {{ $categories->is_premium == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="no" {{ $categories->is_premium == 0 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>

                            <div class="form-group" id="priceField" style="display: {{ $categories->is_premium == 1 ? 'block' : 'none' }};">
                                <label for="exampleInputName1">Price</label>
                                <input type="text" class="form-control" name="price" id="price" value="{{ $categories->price ?? '' }}" placeholder="Price">
                                @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Status</label>
                                <select class="form-control" name="status">
                                    <option value="">Select Status</option>
                                    <option value="1" @if ($categories->status == 1) selected @endif>Active</option>
                                    <option value="0" @if ($categories->status == 0) selected @endif>Inactive</option>
                                </select>
                                @if ($errors->has('status'))
    <span class="help-block">
                                        <p class="text-red">{{ $errors->first('status') }}</p>
                                    </span>
    @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>

                    </form>
                </div>
            </div>
@endsection
    @push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const premiumSelect = document.getElementById('premiumSelect');
            const priceField = document.getElementById('priceField');

            function togglePriceField() {
                if (premiumSelect.value === 'yes') {
                    priceField.style.display = 'block';
                } else {
                    priceField.style.display = 'none';
                    document.getElementById('price').value = '';
                }
            }
            premiumSelect.addEventListener('change', togglePriceField);
            togglePriceField();
        });
    </script>
@endpush
