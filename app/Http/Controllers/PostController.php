<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Auth;
use Image;
class PostController extends Controller
{

    public function all_post(){
      return $posts = Post::all();
    }
    public function save_post(Request $request){

        $productImage = $request->file('photo');

        if ($productImage) {

            $currentTimeinSeconds = time();  
            // converts the time in seconds to current date  
           // $currentDate = date('Y-m-d', $currentTimeinSeconds); 
        //    $img = Image::make($request->photo)->resize(200, 200);

            $imageName =  $currentTimeinSeconds.'.'.$productImage->getClientOriginalName();
            $directory = 'public/product_images/';
            $imageUrl = $directory.$imageName;

            $productImage->move($directory, $imageName);
        }  
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->cat_id = $request->cat_id;
        $post->user_id = 1;
        $post->comment_id = 3;
        $post->photo =$imageUrl;
        $post->save();
        
    }
    
    public function delete_post($id){
        $post = Post::find($id);
        $image_path = public_path()."/uploadimage/";
        $image = $image_path. $post->photo;
        if(file_exists($image)){
            @unlink($image);
        }
        $post->delete();
    }


    public function edit_post($id){
        $post = Post::find($id);
        return $post;
    }


    public function update_post(Request $request, $id){
        $post = Post::find($id);

        // if($request->photo!=$post->photo){

        //     $productImage = $request->file('photo');
        //         if ($productImage) {
        //             $currentTimeinSeconds = time();  
        //             $imageName =  $currentTimeinSeconds.'.'.$productImage->getClientOriginalName();
        //             $directory = 'public/product_images/';
        //             $imageUrl = $directory.$imageName;
        //             $productImage->move($directory, $imageName);
        //         }  

        //     if(file_exists(imageUrl)){
        //         @unlink(imageUrl);
        //     }
        // }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->cat_id = $request->cat_id;
        $post->user_id = 1;
        $post->comment_id = 3;
        // $post->photo =$imageUrl;
        $post->save();
    }


}
