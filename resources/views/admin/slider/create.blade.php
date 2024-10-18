@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Create Slider</h4>
                <p class="card-description">
                    Please fill out the form below.
                </p>

                <form action="{{ route('slider.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                        @error('Title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                     <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleTextarea1" rows="4"></textarea>
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
                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        document.getElementById('name').addEventListener('input', function() {
            let name = this.value;
            document.getElementById('slug').value = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        });
    </script>
@endpush
