@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Users</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/users/' . $user->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ $user->name}}" id="" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{ $user->email}}" id="" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Role</label>
                            <select class="form-select" name="role_as" id="">
                                <option value="">Select Role</option>
                                <option value="0" {{ $user->role_as == '0' ? 'selected':'' }}>User</option>
                                <option value="1" {{ $user->role_as == '1' ? 'selected':'' }}>Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 text-end">
                        <a href="{{ url('admin/users') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-info text-whie">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
