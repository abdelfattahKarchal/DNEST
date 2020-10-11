<?php

namespace App\View\Components\front;

use App\Collection;
use Illuminate\View\Component;

class header extends Component
{
    public $collections;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->collections = Collection::all() ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.front.header');
    }
}
