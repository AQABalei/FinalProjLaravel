<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    public function index(){
    	$query1 = DB::table('posts')->select('posts.id AS PostId', 'posts.title AS PostTitle', 'posts.destination AS PostDest', 'users.username AS UserName');
    	$query2 = $query1->join('users', 'posts.userid', '=', 'users.id');
    	$posts = $query2->get();
    	return view('index', [
    		'posts' => $posts
    	]);
    }

    public function show($userId){
    	
    }

    public function store(){
    	return view('/index/{id}/post');
    }
}
