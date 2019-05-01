<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
use Validator;
use DB;

class PostController extends Controller
{
    public function index($postId = null){
    	if($postId != null){
    		return view('/editpost',[
    			'postId' => $postId,

    		]);
    	}
    	return view('/post',[
    		'user' => Auth::user()
    	]);
    }

    public function store(Request $request){
		$input = $request->all();
    	$validation = Validator::make($input, [
            'title' => 'required|unique:posts,title',
            'destination' => 'required',
        ]);
        if($validation->fails()){
        	return redirect('/post')
            ->withInput()
            ->withErrors($validation);
        }
        DB::table('posts')->insert([
            'title' => $request->title,
            'destination' => $request->destination,
            'userid' => Auth::user()->id
        ]);
        return redirect('/index');
    }

    public function show(){
    	$currUser = Auth::user();
    	$query1 = DB::table('posts')->select('posts.id AS PostId', 'posts.title AS PostTitle', 'posts.destination AS PostDest');
    	$query2 = $query1->where('posts.userid', '=', $currUser->id);
    	$posts = $query2->get();
    	return view('yourpost', [
    		'posts' => $posts
    	]);
    }

    public function storeEdit(Request $request, $postId = null){
    	$input = $request->all();
    	$validation = Validator::make($input, [
    		'title' => 'required|unique:posts,title',
            'destination' => 'required',
    	]);
    	if($validation->fails()){
        	return redirect('/post')
            ->withInput()
            ->withErrors($validation);
        }
    	DB::table('posts')->where('id', $postId)->update(['title' => $input['title'], 'destination' => $input['destination']]);
    	return redirect('/post/your-post');
    }

    public function delete($postId = null){
    	DB::table('posts')->where('id', $postId)->delete();
    	return redirect('/post/your-post');
    }
}
