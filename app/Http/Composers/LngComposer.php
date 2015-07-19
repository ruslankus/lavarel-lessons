<?php
namespace App\Http\Composers;

use App\Models\Languages;
use Illuminate\Support\Facades\Route;

class LngComposer
{
    public function LngCompose($view)
    {
        $arrLng = Languages::all()->toArray();

        $action = Route::currentRouteAction();
        $arrAction = explode("\\",$action);
        //dd($arrAction);
        $controller = array_pop($arrAction);

        $view->with(compact('arrLng','action','controller'));
    }
}