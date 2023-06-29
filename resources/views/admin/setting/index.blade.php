@extends('layouts.admin')
@section('title', 'Admin Settings')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <form action="{{ url('/admin/settings') }}" method="post">
                @csrf

                {{-- @if (session('message'))

                @endif --}}

                <div class="card mb-3">
                    <div class="card-header bg-info">
                        <h3 class="text-white mb-0">Website</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="">Website Name</label>
                                <input type="text" value="{{ $setting->website_name ?? '' }}" name="website_name" id="" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="">Website URL</label>
                                <input type="text" value="{{ $setting->website_url ?? '' }}" name="website_url" id="" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="">Page Title</label>
                                <input type="text" value="{{ $setting->page_title ?? '' }}" name="page_title" id="" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="">Meta Keywords</label>
                                <input type="text" value="{{ $setting->meta_keywords ?? '' }}" name="meta_keywords" id="" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="">Meta Description</label>
                                <textarea class="form-control" name="meta_description" id="" rows="3">{{ $setting->meta_description ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-info">
                        <h3 class="text-white mb-0">Website - Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="">Address</label>
                                <textarea class="form-control" name="address" id="" rows="3">{{ $setting->address ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="">Phone 1 *</label>
                                <input type="text" value="{{ $setting->phone1 ?? '' }}" name="phone1" id="" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="">Phone No. 2</label>
                                <input type="text" value="{{ $setting->phone2 ?? '' }}" name="phone2" id="" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="">Email ID 1*</label>
                                <input type="text" value="{{ $setting->email1 ?? '' }}" name="email1" id="" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="">Email ID 2</label>
                                <input type="text" value="{{ $setting->email2 ?? '' }}" name="email2" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-info">
                        <h3 class="text-white mb-0">Website - Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="">Facebook (Optional)</label>
                                <input type="text" value="{{ $setting->facebook ?? '' }}" name="facebook" id="" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="">Twitter (Optional)</label>
                                <input type="text" value="{{ $setting->twitter ?? '' }}" name="twitter" id="" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="">Instagram (Optional)</label>
                                <input type="text" value="{{ $setting->instagram ?? '' }}" name="instagram" id="" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="">YouTube (Optional)</label>
                                <input type="text" value="{{ $setting->youtube ?? '' }}" name="youtube" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary text-white">Save Settings</button>
                </div>
            </form>
        </div>
    </div>
@endsection
