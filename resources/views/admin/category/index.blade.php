@extends('admin.master')
@section('admin.content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">All Category</h4>

                <div class="table-responsive">
                    <table id="datatable" class="table table-striped display">
                        <thead>
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 20%;">Category Name</th>
                                <th style="width: 20%;">Image</th>
                                <th style="width: 20%;">Status</th>
                                <th style="width: 25%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{!! $category->category_name !!}</td>
                                    <td><span class="d-flex"><img style="height: 100px;width:100px;"
                                                src="{{ $category->getFirstMediaUrl() }}" alt></span></td>
                                    @if ($category->status == 1)
                                        <td style="color: blue">Active</td>
                                    @else
                                        <td style="color: red">Inactive</td>
                                    @endif
                                    <td>
                                        <div class="d-flex">
                                            <div class="p-2">
                                                <a href="{{ route('category.edit', $category->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="las la-edit"></i>
                                                </a>
                                            </div>
                                            <div class="p-2">
                                                <form action="{{ route('category.destroy', $category->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                                        data-toggle="tooltip" title='Delete'>
                                                        <i class="las la-trash-alt" style="color:rgb(243, 243, 243);"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection
