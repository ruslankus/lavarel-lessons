<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function about(){

        $data = 'Something to page';

        return view('pages.about',compact('data'));
    }
}
