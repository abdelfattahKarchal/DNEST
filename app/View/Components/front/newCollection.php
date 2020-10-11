<?php

namespace App\View\Components\front;

use Illuminate\View\Component;

class newCollection extends Component
{
    public $newCollections;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($newCollections)
    {
        $this->newCollections = $newCollections;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.front.new-collection');
    }
}
