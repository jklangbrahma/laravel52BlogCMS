<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{
    public function getSingle($slug){
    	
    	$post = Post::findBySlug($slug);
    	$labels = Post::orderBy('id', 'desc')->select('label')->distinct()->get();
       	return view('blog.single')->withPost($post)->withLabels($labels);
    }

    public function getIndex(){

    	$posts = Post::orderBy('id', 'desc')->paginate(4);
    	$labels = Post::orderBy('id', 'desc')->select('label')->distinct()->get();
    	return view('pages.home')->withPosts($posts)->withLabels($labels);
    }
}
