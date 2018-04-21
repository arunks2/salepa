<?php

namespace App\Http\Controllers;

use App\Product;
use App\Photo;
use App\Sale;
use App\Currency;
use Illuminate\Http\Request;
use App\AddPhotoToProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use File;


class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();

    }

    public function store(Request $request)
    {
        
        $sale_id=$request['sale_id'];
        $sale= Sale::find($sale_id);

        if($this->user->id==$sale->owner->id)
    	{

               $request['cost_price']=$request['short_symbol_cost'].'_'.$request['cost_price'];
               $request['sale_price']=$request['short_symbol_sell'].'_'.$request['sale_price'];
                $product= $this->user->publishProduct( 
                    new Product($request->all())
                    );
                
                $product->save();
                $product = Product::find($product->id);
                
                foreach ($request['photos'] as $file)
                {
                    (new AddPhotoToProduct($product,$file))->save();
               
                }
                $data['user'] = $this->user;
                $data['saleId'] = $product->sale->id;  
                $data['productCreated'] =true;
                return redirect()->route('sale_show', [$product->sale->slug])->with('product_created', '1');
                
        }
        else
        {
            return "not authorised page here";
        }
    }

    public function show($productId)
    {
        $product= Product::find($productId);

        if($this->user->id==$product->owner->id)
        {
            $data['product'] = $product;
            return view('products.show',$data);
        }
    }

    public function edit(Request $request,$productId)
    {
    
        $product=  Product::find($productId);
        if($this->user->id==$product->owner->id)
        {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->purchase_year = $request->purchase_year;
            $product->cost_price = $request->short_symbol_cost.'_'.$request['cost_price'];
            $product->sale_price = $request->short_symbol_sell.'_'.$request['sale_price'];
            $product->condition = $request->condition;
            $product->save();
    
            return redirect()->back();
        }
        else
        {
            return "Not authorised page here!";
        }
    }

    public function destroy($productId)
    {

        $product = Product::find($productId); 
        if($this->user->id==$product->owner->id)
        {
            
                foreach($product->photos as $photo)
                {
                    $photo = Photo::find($photo->id);
                        $file_path = public_path("{$photo->thumbnail_path}");
                        if(File::exists($file_path)) 
                        {
                            File::delete($file_path); 
                        }
                        $file_path = public_path("{$photo->path}");
                        if(File::exists($file_path)) 
                        {
        
                            File::delete($file_path);
                        
                        }
                    $photo->delete();
                }
                $product->delete();
        
                return redirect()->back();
        }
        else{
            return "Not authorsed to view this page!";
        }

    }

    public function getImages($productId)
    {
        $product = Product::find($productId);
        if($this->user->id == $product->owner->id)
        {
            
               
            return $product->photos;
        }
        else
        {
            return "Not authorised to view this page";
        }
    }

    public function changeStatus($productId)
    {
        $product=Product::find($productId);
        if($product->is_sold==0)
        {
            $product->is_sold=1;
            $product->save();
            return 1;
        }
    }

    public function allProducts()
    {
        $data['products']=$this->user->products;
        // $data['products'] = Product::all();
        return view('products.allproducts', $data);
    }
}
