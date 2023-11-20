<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Shoppingcart;

class Productlist extends Component
{
    public function render()
    {
        $products = Product::get();
        return view('livewire.productlist', ['products' => $products]);
    }


    public function addToCart($id){
        // dd($id);


        if(auth()->user()){
            // Todo: add to  cart

            $data = [
                'user_id' => auth()->user()->id,
                'product_id' => $id,
            ];
            Shoppingcart::updateOrCreate($data);
            session()->flash('success', 'Product added to cart successfully');
        }else{
            return redirect(route('login'));
        }
    }
}
