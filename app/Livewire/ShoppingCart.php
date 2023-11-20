<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Shippingcart as Cart;

class ShoppingCart extends Component
{
    public function render()
    {

        return view('livewire.shoppingcart');
    }
}
