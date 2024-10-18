@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Create Category</h4>
                <p class="card-description">
                    Please fill out the form below.
                </p>

                <form action="{{ route('category.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Parent Category Name</label>
                        <select class="form-control" name="parent_id" id="exampleInputName1" placeholder="Name">
                            <option value="0"> Leave As Parent</option>
                            @foreach ($categories as $p_menu)
                                <option value="{{ $p_menu->id }}"> {!! $p_menu->category_name !!} </option>
                            @endforeach

                        </select>
                        {{--  <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name">  --}}
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Name :</label>
                        <textarea class="form-control" name="name" id="editorcategory" rows="4"></textarea>
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
                        <label for="exampleInputName1">Is it premium category?</label>
                        <select class="form-control" name="premium" id="premiumSelect" placeholder="Is it premium category">
                            <option value="">Select one</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="form-group" id="priceField" style="display: none;">
                        <label for="exampleInputName1">Price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Status</label>
                        <select class="form-control" name="status" id="status" placeholder="status">
                            <option value=""> Select Status</option>
                            <option value="1"> Active</option>
                            <option value="0"> Inactive</option>
                        </select>
                        {{--  <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name">  --}}
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{--  <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleTextarea1" rows="4"></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>  --}}
                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')

    <script>
        document.getElementById('premiumSelect').addEventListener('change', function() {
            var priceField = document.getElementById('priceField');
            if (this.value === 'yes') {
                priceField.style.display = 'block'; // Show the price field
            } else {
                priceField.style.display = 'none';  // Hide the price field
            }
        });
        </script>
@endpush
