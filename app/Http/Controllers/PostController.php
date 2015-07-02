<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Mood;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models;
use Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Post $postModel)
    {

        //$post = Post::latest('id')->limit(1)->get()->shift();
        $post = $postModel->getLatestPost();

        //dd($post);

        return view('post.index', ['post' => $post]);
    }


    public function getIndex(){

    }


    public function getTest($id,Request $request){
        dd($request);
        echo "Controller Test = {$id}";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $citySelect = [];
        $moodSelect = [];

        $objCities = City::all();
        foreach($objCities as $obj){
            $citySelect[$obj->id] = $obj->city_name;
        }

        $objMoods = Mood::all();
        foreach($objMoods as $obj){
            $moodSelect[$obj->id] = $obj->mood_name;
        }



        return view('post.form', ['citySelect' => $citySelect,
            'moodSelect' => $moodSelect, 'request' => $request]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Post $postModel, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mail' => 'required|email',
            'content' => 'required'
        ]);

        if($validator->fails()){

            $citySelect = [];
            $moodSelect = [];

            $objCities = City::all();
            foreach($objCities as $obj){
                $citySelect[$obj->id] = $obj->city_name;
            }

            $objMoods = Mood::all();
            foreach($objMoods as $obj){
                $moodSelect[$obj->id] = $obj->mood_name;
            }

            return view('post.form', ['messages' => $validator->errors(),
                'citySelect' => $citySelect,
                'moodSelect' => $moodSelect ,
                'request' => $request
            ]);
        }else{

            $post = new Post();
            $post->name = $request->input('name');
            $post->email = $request->input('mail');
            $post->content = $request->input('content');
            $post->city = $request->input('city');
            $post->mood = $request->input('mood');
            $post->created_at  = time();

            if($post->save()){

                Session::flash('message', 'Feedback was added');

            }else{
                Session::flash('message', 'Add feeds failed');
            }

            return redirect()->route('post');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        //$posts = Post::all();
        $posts = Post::latest('id')->paginate(2);
        //$posts = DB::table('posts')->paginate(2);
        return view('post.list', array('posts' => $posts));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id = null)
    {
        echo "edit id = {$id}";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
