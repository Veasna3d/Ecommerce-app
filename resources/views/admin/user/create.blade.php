@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Users</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/users') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="">Name</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="">Email</label>
                            <input type="email" name="email" id="" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="">Password</label>
                            <input type="text" name="password" id="" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="">Role</label>
                            <select class="form-select" name="role_as" id="">
                                <option value="">Select Role</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 text-end">
                        <a href="{{ url('admin/users') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary text-whie">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
