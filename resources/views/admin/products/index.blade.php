@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Product</h4>
                    <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm text-white">Add New</a>

                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
@endsection
