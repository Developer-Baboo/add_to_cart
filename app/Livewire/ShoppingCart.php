<?php

// Livewire component
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Shoppingcart as ShoppingCartModel;

class ShoppingCart extends Component
{
    public $cartitems;

    public function render()
    {
        $this->cartitems = ShoppingCartModel::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('livewire.shoppingcart')->layout('layouts.app');
    }
    public function incrementQty($id)
    {
        $cart = ShoppingCartModel::whereId($id)->first();
        $cart->quantity += 1;
        $cart->save();

        session()->flash('success', 'Product quantity updated !!!');
    }

    public function decrementQty($id)
    {
        $cart = ShoppingCartModel::whereId($id)->first();
        if ($cart->quantity > 1) {
            $cart->quantity -= 1;
            $cart->save();
            session()->flash('success', 'Product quantity updated !!!');
        } else {
            session()->flash('info', 'You cannot have less than 1 quantity');
        }
    }


    public function removeItem($id)
    {
        $cart = ShoppingCartModel::whereId($id)->first();

        if ($cart) {
            $cart->delete();
            // $this->delete('updateCartCount');
        }
        session()->flash('success', 'Product removed from cart !!!');
    }

}

