<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminFormRequest;
use App\Http\Requests\AdminLoginRequest;
use App\Models\Country;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectPath = '/admin';
    protected $loginPath = '/admin/login';
    protected $storagePath = '/public/upload/images/';

    public function __construct(){
        $this->middleware('admin',['except' => ['getLogin','postLogin','postAuth']]);
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

        $countrySelect = Country::lists('country_name','id');

        return view('admin.create',compact('countrySelect'));
    }


    /**
     * @param AdminFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postStore(AdminFormRequest $request)
    {


        $user = new User($request->all());
        //getting file
        $file = $request->file('image');
        if(!empty($file)){

            $extName = $file->getClientOriginalExtension();
            //Generating image name
            $imageName = uniqid(rand()) . ".{$extName}";
            $image = new Photo();
            $image->photo_name = $imageName;
            $image->save();
            //moving file
            $fullPath = base_path() . $this->storagePath;
            $file->move($fullPath, $imageName);

            //save all with relations
            if($image->users()->save($user)){
                Session::flash('message', 'User was saved');

            }else{
                Session::flash('message', 'Save user failed');
            }

        }else{

            if($user->save()){
                Session::flash('message', 'User was saved');

            }else{
                Session::flash('message', 'Save user failed');
            }

        }

        return redirect()->action('AdminController@getIndex');
    }



    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function getEdit($id){

        $countrySelect = Country::lists('country_name','id');

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
        $file = $request->file('image');
        $msg = 'Update user failed';

        if(!empty($file))
        {
            //deleting old file
            $objPhoto = Photo::find($user->photo_id);
            $photoName = base_path() . $this->storagePath . $objPhoto->photo_name;
            @unlink($photoName);
            $objPhoto->delete();

            //writing new file
            $extName = $file->getClientOriginalExtension();

            //Generating image name
            $imageName = uniqid(rand()) . ".{$extName}";
            $image = new Photo();
            $image->photo_name = $imageName;
            $image->save();

            //moving file
            $fullPath = base_path() . $this->storagePath;
            $file->move($fullPath, $imageName);

            //save all with relations
            if($image->users()->save($user)){
                $msg = 'User was update';
            }

        }else{
            $user->update($request->all());

            if($user->save()){

                $msg = 'User was updated';
            }
        }

        return redirect()->action('AdminController@getIndex')
            ->with('message',$msg);

    }//patchUpdate


    public function getDelete($id){

        $user = User::findOrFail($id);

        if(!empty($user->photo_id)){
            $photo = Photo::find($user->photo_id);
            $imgName = $photo->photo_name;
            $fullPath = base_path().$this->storagePath.$imgName;
            //deleting
            @unlink($fullPath);
            $photo->delete();
        }

        if($user->delete()){
            Session::flash('message', "User {$user->name} was deleted");
        }else{
            Session::flash('message', "To delete user {$user->name} failed");
        }

        return redirect()->action('AdminController@getIndex');
    }



    public function getLogin(){

        if(Auth::check()){
            return redirect()->action('AdminController@getIndex');
        }

        return view('admin.login');
    }


    public function getLogout(){
        Auth::logout();

        return redirect()->action('AdminController@getLogin');

    }


    /**
     * @param AdminFormRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLogin(AdminLoginRequest $request)
    {
        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return redirect()->intended($this->redirectPath());
        }

        return redirect($this->loginPath())
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => $this->getFailedLoginMessage(),
            ]);
    }


    /**
     * @param AdminLoginRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postAuth(AdminLoginRequest $request)
    {

        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended($this->redirectPath);
        }

        return redirect($this->loginPath())
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => $this->getFailedLoginMessage(),
            ]);

    }
}//end Class
