<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LangController extends Controller
{

    public function getIndex()
    {
        return view('lng.index');
    }


    public function getShow(){

        return view('lng.show');
    }


}
