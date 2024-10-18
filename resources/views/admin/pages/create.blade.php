@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Create Category</h4>
                <p class="card-description">
                    Please fill out the form below.
                </p>

                <form action="{{ route('pages.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInput">Title</label>
                        <input type="text" class="form-control" id="title" name ="title" placeholder="Enter text">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <input type="hidden" name="slug" id="slug">

                    <div class="form-group">
                        <label for="exampleInputName1">Second Title</label>
                        <textarea class="form-control" name="second_title" id="editor2" rows="4"></textarea>
                        @error('second_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Description :</label>
                        <textarea class="form-control" name="description" id="editor1" rows="4"></textarea>
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
                        <label for="exampleInputName1">Status</label>
                        <select class="form-control" name="status" id="status" placeholder="status">
                            <option value="1"> Active</option>
                            <option value="0"> Inactive</option>
                        </select>
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
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the slug input element
            var slugInput = document.getElementById('slug');

            // Attach the event listener for the title CKEditor instance
            CKEDITOR.instances.editor1.on('change', function() {
                var title = CKEDITOR.instances.editor1.getData(); // Get the HTML content
                var tempDiv = document.createElement("div");
                tempDiv.innerHTML = title;
                var plainTextTitle = tempDiv.textContent || tempDiv.innerText || ""; // Extract plain text

                var slug = plainTextTitle.trim().toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '') // Remove special characters
                    .replace(/\s+/g, '-') // Replace spaces with dashes
                    .replace(/-+/g, '-'); // Replace multiple dashes with a single dash

                // Set the generated slug in the hidden slug input field
                slugInput.value = slug;
            });
        });
    </script>
@endpush
