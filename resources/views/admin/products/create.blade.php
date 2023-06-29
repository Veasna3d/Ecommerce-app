@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <span class="alert alert-danger">
                            @foreach ($errors as $item)
                                <span>{{ $item }}</span>
                            @endforeach
                        </span>
                    @endif

                    <form action="{{ url('admin/products') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag"
                                    type="button" role="tab" aria-controls="seotag" aria-selected="false">SEO
                                    Tags</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details"
                                    type="button" role="tab" aria-controls="details"
                                    aria-selected="false">Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image"
                                    type="button" role="tab" aria-controls="image" aria-selected="false">Product
                                    Images</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color"
                                    type="button" role="tab" aria-controls="color" aria-selected="false">Product
                                    Colors</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="mb-3 mt-3">
                                    <label class="form-label" for="">Choose Category</label>
                                    <select class="form-control" name="category_id" id="">
                                        <option >Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">Product Name</label>
                                    <input type="text" name="name" id="" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">Product Slug</label>
                                    <input type="text" name="slug" id="" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">Choose Brand</label>
                                    <select class="form-control" name="brand" id="">
                                        <option >Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">Small Description (500 Words)</label>
                                    <textarea name="small_description" class="form-control" rows="4"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="">Description</label>
                                    <textarea name="description" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="seotag" role="tabpanel" aria-labelledby="seotag-tab">
                                <div class="mb-3 mt-3">
                                    <label class="form-label" for="">Meta Title</label>
                                    <input type="text" name="meta_title" id="" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="">Original Price</label>
                                            <input type="text" name="original_price" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="">Sellting Price</label>
                                            <input type="text" name="selling_price" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="">Quantity</label>
                                            <input type="number" name="quantity" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="">Trending</label><br>
                                            <input type="checkbox" name="trending">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="">Featured</label><br>
                                            <input type="checkbox" name="featured">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="">Status</label><br>
                                            <input type="checkbox" name="status">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
                                <div class="mb-3 mt-3">
                                    <label class="form-label" for="">Upload Product Images</label>
                                    <input type="file" name="image[]" multiple id="" class="form-control">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="color" role="tabpanel" aria-labelledby="color-tab">
                                <div class="mb-3 mt-3">
                                    <label class="form-label" for="">Select Color</label>
                                    <div class="row">
                                        @forelse ($colors as $colorItem)
                                            <div class="col-md-3 mt-3">
                                                <div class="p-2 border">
                                                    <input type="checkbox" name="colors[{{ $colorItem->id }}]"
                                                        value="{{ $colorItem->id }}"> {{ $colorItem->name }}
                                                    <br />
                                                    Quantity: <input type="number"
                                                        style="width:50px; border-radius: 2px;"
                                                        name="colorQuantity[{{ $colorItem->id }}]" id="">
                                                </div>
                                            </div>
                                        @empty
                                            <div class="cor-md-12">
                                                <span class="text-center">No Color Found</span>
                                            </div>
                                        @endforelse

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3 text-end">
                            <a href="{{ url('admin/products') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-info text-whie">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
