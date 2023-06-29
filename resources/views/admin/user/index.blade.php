@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            @if (session('message'))
            <div class="alert alert-warning" role="alert">
                {{ session('message') }}
            </div>
            @endif
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Users</h4>
                <a href="{{ url('admin/users/create') }}" class="btn btn-primary btn-sm text-white">Add New</a>

            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->role_as == '1')
                                <span class="badge rounded-pill bg-warning">Admin</span>
                                @elseif ($user->role_as == '0')
                                <span class="badge rounded-pill bg-info">User</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/users/' . $user->id . '/edit') }}"
                                    class="btn btn-sm btn-success">Edit</a>
                                <a href="{{ url('admin/users/' . $user->id . '/delete') }}"
                                    class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No User Available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
