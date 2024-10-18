@extends('frontend.layouts.master')
@section('frontend.content')
    <section class="cart-area pt-80px pb-80px position-relative">
        <div class="container">
            <form action="#" class="cart-form mb-50px table-responsive px-2">
                <table class="table generic-table">
                    <thead>
                        <tr>
                            @if ($cartItems[0]->categories == null)
                                <th scope="col">Package</th>
                            @else
                                <th scope="col">Category</th>
                            @endif
                            <th scope="col">Price</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <th scope="row">
                                    <div
                                        class="media media-card align-items-center shadow-none p-0 mb-0 rounded-0 bg-transparent">
                                        <a href="#" class="media-img d-block media-img-sm">
                                            <img src="{{ optional($item->categories)->getFirstMediaUrl() ?? optional($item->packages)->getFirstMediaUrl() }}"
                                                alt="Product image">
                                        </a>
                                        <div class="media-body">
                                            <h5 class="fs-15 fw-medium">
                                                <a href="#">
                                                    {!! optional($item->categories)->category_name ?? $item->packages->title !!}
                                                </a>
                                            </h5>
                                        </div>

                                    </div>
                                </th>
                                <td>৳ {{ $item->categories->price ?? $item->packages->price }}</td>
                                <td>৳ {{ $item->categories->price ?? $item->packages->price }}</td>
                                <td>
                                    <a href="{{ route('cart.remove', $item->id) }}"
                                        class="icon-element icon-element-xs shadow-sm" data-bs-toggle="tooltip"
                                        data-placement="top" title="Remove item">
                                        <i class="la la-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
            <div class="cart-totals w-50 ms-auto table-responsive px-2">
                <h3 class="mb-4 fs-24">Cart Totals</h3>
                <table class="table generic-table overflow-hidden">
                    <tbody>
                        <tr>
                            <th scope="row">Total Price</th>
                            <td>৳ {{ $cartItems->sum(fn($item) => $item->categories->price ?? $item->packages->price) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-end mt-4">
                    <a href="{{ route('checkout') }}" class="btn btn-primary fs-10 lh-25">
                        <i class="fa fa-credit-card"></i> Purchase now
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
<style>
    /* Checkout section styling */
    .media-body a{
        color: #000;
    }
    .cart-area {
        background-color: #f9f9f9;
        padding: 80px 0;
    }

    .cart-form {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .cart-totals {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .table.generic-table th,
    .table.generic-table td {
        padding: 15px;
        text-align: center;
    }

    .table.generic-table th {
        background-color: #f2f2f2;
    }

    .table.generic-table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* SSLCommerz button styling */
    /* SSLCommerz button styling */
    .btn.theme-btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 10px 12px;
        /* Adjusted padding for a compact look */
        font-size: 12px;
        /* Smaller font size for text */
        display: inline-flex;
        /* Ensure proper alignment of icon and text */
        align-items: center;
        gap: 5px;
        text-transform: uppercase;
        transition: background-color 0.3s ease;
    }

    .btn.theme-btn i {
        font-size: 14px;
    }

    .btn.theme-btn:hover {
        background-color: #0056b3;
    }

    .text-end {
        text-align: right;
    }
</style>
