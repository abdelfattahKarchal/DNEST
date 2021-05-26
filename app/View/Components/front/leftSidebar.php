<?php

namespace App\View\Components\front;

use Illuminate\View\Component;

class leftSidebar extends Component
{
    public $collections;
    public $collectionName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($collections, $collectionName = null)
    {
        $this->collections = $collections;
        $this->collectionName = $collectionName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.front.left-sidebar');
    }
}
