</div>
@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Edit Question Type
                    Name</h4>
                <p class="card-description">
                    Please fill out the form below.
                </p>
                <form action="{{ route('type.update', $type->id) }}" method="POST" class="forms-sample">
                    @csrf
                    @method('PUT')
                    <div class="form-group">

                        <div class="form-group">
                            <label for="">Question Type Name</label>
                            <input type="text" class="form-control" name="type" value="{{ $type->type }}">
                            @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-control" name="status">
                                <option value="">Select Status</option>
                                <option value="1" @if ($type->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($type->status == 0) selected @endif>Inactive</option>
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
