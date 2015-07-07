<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminFormRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        $users = User::visible()->get();

        return view('admin.list', compact('users'));
    }


    /**
     * @return \Illuminate\View\View
     */
    public function getCreate(){

        $countrySelect = [];

        $objCountries = Country::all();
        foreach($objCountries as $obj){
            $countrySelect[$obj->id] = $obj->country_name;
        }

        return view('admin.create',compact('countrySelect'));
    }


    /**
     * @param AdminFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postStore(AdminFormRequest $request)
    {
        $user = new User($request->all());
        $user->password = bcrypt($request->input('password'));
        if($user->save()){

            Session::flash('message', 'User was saved');

        }else{
            Session::flash('message', 'Save user failed');
        }

        return redirect()->action('AdminController@getIndex');
    }


    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function getEdit($id){

        $countrySelect = [];

        $objCountries = Country::all();
        foreach($objCountries as $obj){
            $countrySelect[$obj->id] = $obj->country_name;
        }

        $user = User::findOrFail($id);

        return view('admin.edit',compact('user','countrySelect'));
    }


    /**
     * @param $id
     * @param AdminFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function patchUpdate($id, AdminFormRequest $request){

        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->password = bcrypt($request->input('password'));

        if($user->save()){

            Session::flash('message', 'User was updated');

        }else{
            Session::flash('message', 'Update user failed');
        }

        return redirect()->action('AdminController@getIndex');

    }//patchUpdate


    public function getDelete($id){

        $user = User::findOrFail($id);

        if($user->delete()){
            Session::flash('message', "User {$user->name} was deleted");
        }else{
            Session::flash('message', "To delete user {$user->name} failed");
        }

        return redirect()->action('AdminController@getIndex');
    }
}
