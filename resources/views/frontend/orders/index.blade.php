@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
<div class="py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-whier p-3">
                    <h4 class="mb-4">My Orders</h4>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Tracking No</th>
                                    <th>Username</th>
                                    <th>Payment Mode</th>
                                    <th>Ordered Date</th>
                                    <th>Status Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $orderItem)
                                <tr>
                                    <td>{{ $orderItem->id }}</td>
                                    <td>{{ $orderItem->tracking_no }}</td>
                                    <td>{{ $orderItem->fullname }}</td>
                                    <td>{{ $orderItem->payment_mode }}</td>
                                    <td>{{ $orderItem->created_at->format('d-M-Y') }}</td>
                                    <td>{{ $orderItem->status_message }}</td>
                                    <td>
                                        <a href="{{ url('orders/'.$orderItem->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7"> No Orders available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
