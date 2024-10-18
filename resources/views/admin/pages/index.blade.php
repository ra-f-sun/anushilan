@extends('admin.master')
@section('admin.content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">All Pages</h4>

                <div class="table-responsive">
                    <table id="datatable" class="table table-striped display">
                        <thead>
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 20%;">Title</th>
                                <th style="width: 20%;">Second Title</th>
                                <th style="width: 50%;">Description</th>
                                <th style="width: 10%;">Image</th>
                                <th style="width: 5%;">Status</th>
                                <th style="width: 10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $key => $page)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{!! $page->title !!}</td>
                                    <td>{!! $page->second_title !!}</td>
                                    <td>{!! $page->description !!}</td>
                                    <td><span class="d-flex"><img style="height: 100px;width:100px;"
                                                src="{{ $page->getFirstMediaUrl() }}" alt></span></td>
                                    @if ($page->status == 1)
                                        <td style="color: blue">Active</td>
                                    @else
                                        <td style="color: red">Inactive</td>
                                    @endif
                                    <td>
                                        <div class="d-flex">
                                            <div class="p-2">
                                                <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-info btn-sm">
                                                    <i class="las la-edit"></i>
                                                </a>
                                            </div>
                                            <div class="p-2">
                                                <form action="{{ route('pages.destroy', $page->id) }}" method="post">
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
                    {{ $pages->links() }}
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
