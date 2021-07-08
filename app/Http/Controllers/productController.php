<?php

namespace App\Http\Controllers;

use App\crop_import;
use Illuminate\Http\Request;

class productController extends Controller
{
    //
    public function add_product_db(Request $request){

        $addProducts = new crop_import();
        
        $productImage = $request->file('crop_image');
        if ($productImage) {

            $currentTimeinSeconds = time();  
            // converts the time in seconds to current date  
           // $currentDate = date('Y-m-d', $currentTimeinSeconds); 

            $imageName =  $currentTimeinSeconds.'.'.$productImage->getClientOriginalName();
            $directory = 'public/crop_images/';
            $imageUrl = $directory.$imageName;
            
            $productImage->move($directory, $imageName);
        }  

        $addProducts->username = $request->username;
        $addProducts->crop_name = $request->crop_name;
        $addProducts->crop_session = $request->crop_session;
        $addProducts->crop_type = $request->crop_type;
        $addProducts->crop_quantity = $request->crop_quantity;
        $addProducts->crop_location = $request->crop_location;
        $addProducts->bid_rate = $request->bid_rate;
        $addProducts->crop_description = $request->crop_description;
        $addProducts->last_date_bidding = $request->last_date_bidding;
        // $addProducts->crop_image = "ss.jpg";
        $addProducts->crop_image = $imageUrl;
        $addProducts->status =1;
        $addProducts->condition ="New";
        $addProducts->Action ="Unpublished";
        $addProducts->save();

        return add_product;
    }


    public function view(){
        $crops=crop_import::all();
        return  $crops;
    }

    public function destroy($id){
        $crops=crop_import::find($id);
        $crops->delete();
        return $crops;
    }

}
