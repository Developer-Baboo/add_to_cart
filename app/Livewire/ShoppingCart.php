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
}

