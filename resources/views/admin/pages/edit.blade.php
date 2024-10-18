</div>
@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Edit Page</h4>
                <p class="card-description">
                    Please fill out the form below.
                </p>
                <form action="{{ route('pages.update', $pages->id) }}" method="POST" class="forms-sample"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="editor">Title:</label>
                        <textarea class="form-control" name="title" id="editor" rows="4">{{ old('title', $pages->title) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="editor">Second Title:</label>
                        <textarea class="form-control" name="second_title" id="editor1" rows="4">{{ old('second_title', $pages->second_title) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="editor">Description:</label>
                        <textarea class="form-control" name="description" id="editor2" rows="4">{{ old('description', $pages->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <img src="{{ $pages->getFirstMediaUrl() ?? '' }}" class="" alt="" />
                        <label for="exampleInputName1">Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="image">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select class="form-control" name="status">
                            <option value="">Select Status</option>
                            <option value="1" @if ($pages->status == 1) selected @endif>Active</option>
                            <option value="0" @if ($pages->status == 0) selected @endif>Inactive</option>
                        </select>
                        @if ($errors->has('status'))
                            <span class="help-block">
                                <p class="text-red">{{ $errors->first('status') }}</p>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>




            </div>
        </div>
    @endsection
