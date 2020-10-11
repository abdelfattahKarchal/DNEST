<?php

namespace App\View\Components\front;

use Illuminate\View\Component;

class newProduct extends Component
{
    public $newProducts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($newProducts)
    {
        $this->newProducts = $newProducts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.front.new-product');
    }
}
