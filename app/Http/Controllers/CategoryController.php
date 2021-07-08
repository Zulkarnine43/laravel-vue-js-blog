<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_category(Request $request){
		
        $this->validate($request,[
            'cat_name'=>'required|min:2|max:50'
        ]);
       $category = New Category();
       $category->cat_name = $request->cat_name;
       $category->save();
       return ['message'=>'successful'];
    }

    public function all_category(){
        $categories = Category::all();
        return $categories;
    }

    public function edit_category($id){
        return $category = Category::find($id);
    }


    public function update_category(Request $request,$id){
        $this->validate($request,[
            'cat_name'=>'required|min:2|max:50'
        ]);
        $category = Category::find($id);
        $category->cat_name = $request->cat_name;
        $category->save();
    }

    public function delete_category($id){
        $category = Category::find($id);
        $category->delete();
    }
}
