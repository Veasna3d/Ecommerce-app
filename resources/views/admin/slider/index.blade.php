@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Slider</h4>
                    <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm text-white">Add New</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>
                                        <img src="{{ asset("$slider->image") }}" style="width:70px; height:70px;"
                                            alt="">
                                    </td>
                                    <td>{{ $slider->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ url('admin/sliders/' . $slider->id . '/edit') }}"
                                            class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ url('admin/sliders/' . $slider->id . '/delete') }}"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Slider Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
