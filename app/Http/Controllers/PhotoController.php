<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AddPhotoToProduct;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Photo;
use File;


class PhotoController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();

    }
    public function store($productId,Request $request)
    {        
        $product = Product::find($productId);

    	if($product->owner->id==$this->user->id)
    	{      
	        $photo = $request->file('photo');
	        
	        (new AddPhotoToProduct($product,$photo))->save();
            return $product->id;
    	}

    }  

 public function destroy($photoId)
    {
        
        $photo= Photo::find($photoId);
        $file_path = public_path("{$photo->thumbnail_path}");
        if(File::exists($file_path)) 
        {
            File::delete($file_path); 
        }
        $file_path = public_path("{$photo->photo_path}");
        if(File::exists($file_path)) 
        {
            File::delete($file_path); 
        }
        $photo->delete();
        return redirect()->back();
    }
    
}
