<?php

namespace App\Http\ViewComposers;

use App\Collection;
use Illuminate\View\View;

class CollectionComposer{

    public function compose(View $view)
    {
        //if not admin => active = 1
       // $collections = Collection::where('active',1)->get();
        $collections = Collection::all();

        $view->with([
            'collections' => $collections
        ]);
    }
}