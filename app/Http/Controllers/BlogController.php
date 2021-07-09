<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function  get_all_blog_post(){
       return $posts = Post::all();
    }
    public function getpost_by_id($id){
      return $post = Post::where('id',$id)->first();

    }
    public function get_all_category(){
        $categories = Category::all();
        return $categories;
    }
    public function get_all_post_by_cat_id($id){
        $posts = Post::where('cat_id',$id)->get();
        return $posts;
    }
    public function search_post(){
        $search = \Request::get('s');
        if($search!=null){
            $posts = Post::orderBy('id', 'DESC')
                ->where('title','LIKE',"%$search%")
                ->orWhere('description','LIKE',"%$search%")
                ->get();
            return $posts;
        }else{
           return $this->get_all_blog_post();
        }
    }
    public function latest_post(){
        $posts = Post::all();
        return $posts;
    }
}
