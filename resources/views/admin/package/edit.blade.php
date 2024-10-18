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
                <form action="{{ route('package.update', $packages->id) }}" method="POST" class="forms-sample"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="form-group">
                            <label for="category_ids">Select Multiple Categories</label>
                            <select class="form-control select2" name="category_ids[]" id="category_ids" multiple>
                                @foreach ($premiumCategories as $category)
                                    <option value="{{ $category->id }}" @if (in_array($category->id, $packageCategoryIds)) selected @endif>
                                        {!! $category->category_name !!}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_ids')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="{{ old('title', $packages->title) }}" placeholder="Enter title">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Description : </label>
                            <textarea class="form-control" name="description" id="editor1" rows="4">{{ old('description', $packages->description) }}</textarea
                                                        </div>
                                                        <div class="form-group">
                                                            <img src="{{ $packages->getFirstMediaUrl() ?? '' }}" class="" alt="" />
                                                            <label for="exampleInputName1">Image</label>
                                                            <input type="file" class="form-control" name="image" id="image" placeholder="image">
                                                            @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
                            {{--  @dd($categories);  --}}
                                                        </div>
                                                        <div class="form-group">
                                                    <label for="title">Price</label>
                                                    <input type="text" class="form-control" name="price" id="price"
                                                        value="{{ old('price', $packages->price) }}" placeholder="Enter price">
                                                    @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
                                                </div>

                                                        <div class="form-group">
                                                            <label for="">Status</label>
                                                            <select class="form-control" name="status">
                                                                <option value="">Select Status</option>
                                                                <option value="1" @if ($packages->status == 1) selected @endif>Active</option>
                                                                <option value="0" @if ($packages->status == 0) selected @endif>Inactive</option>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#category_ids').select2();
                    });
                </script>
@endpush
