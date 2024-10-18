@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Create Category</h4>
                <p class="card-description">
                    Please fill out the form below.
                </p>

                <form action="{{ route('package.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="categorySelect">Select Multiple Categories :</label>
                        <select class="form-control" name="category_ids[]" id="categorySelect" multiple>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{!! $category->category_name !!}</option>
                            @endforeach
                        </select>
                        @error('category_ids')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Title :</label>
                        <input type="text" class="form-control" id="title" name ="title" placeholder="Enter text">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Description :</label>
                        <textarea class="form-control" name="description" id="editor" rows="4"></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="image">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Price :</label>
                        <input type="text" class="form-control" id="peice" name ="price" placeholder="Enter price">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Status</label>
                        <select class="form-control" name="status" id="status" placeholder="status">
                            <option value="1"> Active</option>
                            <option value="0"> Inactive</option>
                        </select>
                        {{--  <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name">  --}}
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#categorySelect').select2({
                placeholder: "Select Multiple Categories",
                allowClear: true
            });
        });
    </script>
@endpush
