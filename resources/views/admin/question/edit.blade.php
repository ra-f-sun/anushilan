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
                <form action="{{ route('question.update', $questions->id) }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="">Select Category</option>

                            @foreach ($categories as $category)
                                @if ($category->parent_id == 0)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == old('category_id', $questions->category_id) ? 'selected' : '' }}>
                                        {!! $category->category_name !!}
                                    </option>

                                    @if ($category->children && $category->children->isNotEmpty())
                                        @foreach ($category->children as $child)
                                            <option value="{{ $child->id }}"
                                                {{ $child->id == old('category_id', $questions->category_id) ? 'selected' : '' }}>
                                                {!! $category->category_name . ' > ' . $child->category_name !!}
                                                {{ $child->id == old('category_id', $questions->category_id) ? ' ✔' : '' }}
                                            </option>
                                        @endforeach
                                    @endif
                                @endif
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="editor">Question:</label>
                        <textarea class="form-control" name="question" id="editor" rows="4">{{ old('question', $questions->question) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Question Type</label>
                        <select class="form-control" name="type_id">
                            <option value=""> Question Type select </option>

                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @if ($type->id == $questions->type_id) selected @endif>
                                    {{ $type->type }} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('parent_id'))
                            <span class="help-block">
                                <p class="text-red">{{ $errors->first('parent_id') }}</p>
                            </span>
                        @endif
                    </div>

                    <!-- Options Fields -->
                    @foreach ($questions->options as $index => $option)
                        <div class="form-group">
                            <label for="option_{{ $index + 1 }}">Option {{ $index + 1 }}</label>
                            <input type="text" class="form-control" name="option_{{ $index + 1 }}"
                                id="option_{{ $index + 1 }}"
                                value="{{ old('option_' . ($index + 1), $option->option) }}">
                        </div>
                    @endforeach

                    <!-- Answer Selection -->
                    <div class="form-group">
                        <label for="exampleTextarea1">Answer :</label>
                        <textarea class="form-control" name="answer" id="editor2" rows="4">{{ old('answer', $questions->answer) }}</textarea>
                        @error('answer')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="editor">Description:</label>
                        <textarea class="form-control" name="description" id="editor1" rows="4">{{ old('description', $questions->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select class="form-control" name="status">
                            <option value="">Select Status</option>
                            <option value="1" @if ($questions->status == 1) selected @endif>Active</option>
                            <option value="0" @if ($questions->status == 0) selected @endif>Inactive</option>
                        </select>
                        @if ($errors->has('status'))
                            <span class="help-block">
                                <p class="text-red">{{ $errors->first('status') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <img src="{{ $questions->getFirstMediaUrl() ?? '' }}" class="" alt="" />
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
    @endsection
