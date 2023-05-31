@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Add Slider</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/sliders') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label><br>
                            <input type="checkbox" name="status" id="">
                        </div>
                        <div class="mb-3 text-end">
                            <a href="{{ url('admin/sliders') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-info text-whie">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
