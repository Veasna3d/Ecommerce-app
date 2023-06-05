<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $qtyCount = 1, $productColorId;

    public function addToWishList($productId)
    {
        if (Auth::check()) {

            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'Already added to wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already added to wishlist',
                    'type' => 'info',
                    'status' => 409
                ]);
                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistAddedUpdated');
                session()->flash('message', 'Wishlist added successfully');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Wishlist added successfully',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        } else {
            session()->flash('message', 'Please Login to continue!');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to continue!',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }

    public function colorSelected($productColorId)
    {

        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if ($this->prodColorSelectedQuantity == 0) {
            $this->prodColorSelectedQuantity = "outOfStock";
        }
    }

    public function incrementQty()
    {
        if ($this->qtyCount < 10) {
            $this->qtyCount++;
        }
    }
    public function decrementQty()
    {
        if ($this->qtyCount > 1) {
            $this->qtyCount--;
        }
    }

    public function addToCart(int $productId)
    {
        if (Auth::check()) {

            // dd($productId);
            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {

                //check for product color qty & add to cart
                if ($this->product->productColors()->count() > 1) {

                    if ($this->prodColorSelectedQuantity != NULL) {

                        if (Cart::where('user_id', auth()->user()->id)
                            ->where('product_id', $productId)
                            ->where('product_color_id', $this->productColorId)
                            ->exists()
                        ) {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product already added to cart',
                                'type' => 'info',
                                'status' => 401
                            ]);
                        } else {

                            $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                            if ($productColor->quantity > 0) {

                                if ($productColor->quantity > $this->qtyCount) {

                                    //insert to cart with color
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' =>  $this->qtyCount
                                    ]);
                                    $this->emit('CartAddedUpdated');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Product added to cart',
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                                } else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only ' . $productColor->quantity . ' Quantity Available!',
                                        'type' => 'info',
                                        'status' => 401
                                    ]);
                                }
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Out of Stock!',
                                    'type' => 'warning',
                                    'status' => 401
                                ]);
                            }
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select your product color!',
                            'type' => 'info',
                            'status' => 404
                        ]);
                    }
                } else {
                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product already added to cart',
                            'type' => 'info',
                            'status' => 401
                        ]);
                    } else {
                        // dd('Prdouct');
                        if ($this->product->quantity > 0) {

                            if ($this->product->quantity > $this->qtyCount) {

                                //insert to cart
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' =>  $this->qtyCount
                                ]);
                                $this->emit('CartAddedUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product added to cart',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only ' . $this->product->quantity . ' Quantity Available!',
                                    'type' => 'info',
                                    'status' => 401
                                ]);
                            }
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out of Stock!',
                                'type' => 'info',
                                'status' => 401
                            ]);
                        }
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Does not exists!',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to continue!',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
