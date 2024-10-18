@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Create Question Type</h4>
                <p class="card-description">
                    Please fill out the form below.
                </p>

                <form action="{{ route('type.store') }}" method="POST" class="forms-sample">
                    @csrf
                   
                    <div class="form-group">
                        <label for="exampleInputName1">Question Type Name</label>
                        <input type="text" class="form-control" name="type" placeholder="Enter Question Type Name">
                        @error('type')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" name="slug" id="slug">
                    

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
