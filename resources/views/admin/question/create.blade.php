@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Create Question</h4>
                <p class="card-description">
                    Please fill out the form below.
                </p>

                <form action="{{ route('question.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">


                    @csrf
                    <div class="form-group">

                        <label for="exampleInputName1">Category</label>
                        <select class="form-control" name="category_id" id="category_id" placeholder="Select Category">
                            <option value="">Select Category</option>
                            @include('partials.category_options', ['categories' => $categories, 'prefix' => ''])
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="exampleTextarea1">Question :</label>
                        <textarea class="form-control" name="question" id="editor" rows="4"></textarea>
                        @error('question')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Question Type</label>
                        <select class="form-control" name="type_id" id="type" placeholder="status">
                            <option value=""> Select Type</option>
                            @foreach ($types as $type)
                            <option value="{{ $type->id }}"> {{ $type->type }} </option>
                            @endforeach
                        </select>
                        {{--  <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name">  --}}
                        @error('type_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Answer :</label>
                        <input type="text" class="form-control" name="answer" id="exampleInputName1" placeholder="answer">
                        @error('answer')
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
                        <label for="exampleInputName1">Status</label>
                        <select class="form-control" name="status" id="status" placeholder="status">
                            <option value="1"> Active</option>
                            <option value="0"> Inactive</option>
                        </select>
                        @error('name')
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
