@extends('admin.master')
@section('admin.content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">All Orders</h4>

                <div class="table-responsive">
                    <table id="datatable" class="table table-striped display">
                        <thead>
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 10%;">Customer Name</th>
                                <th style="width: 10%;">Customer Email</th>
                                <th style="width: 10%;">Customer Phone</th>
                                <th style="width: 20%;">Customer Address</th>
                                <th style="width: 5%;">Is Package</th>
                                <th style="width: 10%;">Category</th>
                                <th style="width: 10%;">Total Amount</th>
                                <th style="width: 10%;">Payment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->address }}</td>
                                    @if ($order->package_id != 0)
                                        <td>Yes</td>
                                    @else
                                        <td>No</td>
                                    @endif
                                    @php
                                        $categories = explode(',', strip_tags($order->category_or_package_name));
                                    @endphp
                                    <td>
                                        @foreach ($categories as $index => $category)
                                            {{ $index + 1 }}. {{ trim($category) }} <br><br>
                                        @endforeach
                                    </td>
                                    <td>{{ $order->amount }}</td>
                                    <td>Paid</td>
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
