@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Add Color</h4>
                    <a href="{{ url('admin/colors/create') }}" class="btn btn-primary btn-sm text-white">Add New</a>

                </div>
                <div class="card-body">
                    <form action="{{ url('admin/colors') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="">Name</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Code</label>
                            <input type="text" name="code" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Status</label><br>
                            <input type="checkbox" name="status" id="">
                        </div>
                        <div class="mb-3 text-end">
                            <a href="{{ url('admin/colors') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-info text-whie">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
