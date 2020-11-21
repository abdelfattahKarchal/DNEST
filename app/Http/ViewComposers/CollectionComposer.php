<?php

namespace App\Http\ViewComposers;

use App\Collection;
use Illuminate\View\View;

class CollectionComposer{

    public function compose(View $view)
    {
        $collections = Collection::all();

        $view->with([
            'collections' => $collections
        ]);
    }
}