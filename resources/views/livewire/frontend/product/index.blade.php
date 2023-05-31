<div>
    <div class="row">
        @forelse ($products as $productItem)
            <div class="col-md-3">
                <div class="product-card">
                    <div class="product-card-img">
                        @if ($productItem->quantity > 0)
                            <label class="stock bg-success">In Stock</label>
                        @else
                            <label class="stock bg-ingo">Out of Stock</label>
                        @endif

                        @if ($productItem->productImages->count() > 0)
                            <a
                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                <img src="{{ asset($productItem->productImages[0]->image) }}"
                                    alt="{{ $productItem->name }}">
                            </a>
                        @endif

                    </div>
                    <div class="product-card-body">
                        <p class="product-brand">{{ $productItem->brand }}</p>
                        <h5 class="product-name">
                            <a
                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                {{ $productItem->name }}
                            </a>
                        </h5>
                        <div>
                            <span class="selling-price">${{ $productItem->selling_price }}</span>
                            <span class="original-price">${{ $productItem->original_price }}</span>
                        </div>
                        {{-- <div class="mt-2">
                    <a href="" class="btn btn1">Add To Cart</a>
                    <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                    <a href="" class="btn btn1"> View </a>
                </div> --}}
                    </div>
                </div>
            </div>
        @empty
            <span class="bg-white p-4 text-center">No Products Available for {{ $category->name }}</span>
        @endforelse
    </div>
</div>
