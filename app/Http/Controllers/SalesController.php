<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Product;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use File;
use App;
use PDF;
use Mail;

class SalesController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');

	    parent::__construct();

	}

    public function create()
    {
    	$data['user'] = $this->user;
    	return view('sales.create',$data);
    }

    public function store(Request $request)
    {
            $this->validate($request, [
                    'name' => 'required|max:255',
                    'description' => 'required',
                    'starts_on' => 'required|date',
                    'ends_on' => 'date',
                    'is_private' => 'required|boolean',
                    'address' => 'required',
                    'pvt_address' => 'required',
                    'pvt_contact_info' => 'required',
                ]);
            $sale= $this->user->publish( 
                new Sale($request->all())
                );
            $sale->save();
            return redirect()->action('SalesController@show', [$sale->slug]);
        
    	
    }

    public function show($slug)
    {
         
         $sale=Sale::where('slug','=',$slug)->firstOrFail();
        if($this->user->id==$sale->owner->id)
        {
            $data['user'] = $this->user;
            $data['sale'] = $sale;  
            return view('sales.show',$data);
        }
        else
        {
            return "not authorise page here";
        }
    }

    public function showAfterProductCreate($data)
    {
        $id=$data['saleId'];
        $sale=Sale::find($id)->firstOrFail();
        if($this->user->id==$sale->owner->id)
        {
            $data['user'] = $this->user;
            $data['sale'] = $sale;  
            return view('sales.show',$data);
        }
        else
        {
            return "not authorise page here";
        }
    }
    // TODO : Change this completely - with this logic, we cannot put validation in. Any input we do anywhere, we need to put validation
    public function edit($saleId, Request $request)
    {

       $sale= Sale::find($saleId);
       if($sale->owner->id==$this->user->id)
       {
            
           if(isset($request->name))
               $sale->name= $request->name;

           if(isset($request->description))
               $sale->description= $request->description;

           if(isset($request->starts_on))
               $sale->starts_on = $request->starts_on;

           if(isset($request->ends_on))
               $sale->ends_on = $request->ends_on;

           // Your variable is incorrect here!! was in_private u wrote in_public.
           if(isset($request->is_private))
               $sale->is_private = $request->is_private;

           if(isset($request->contact_info))
               $sale->contact_info = $request->contact_info;

           if(isset($request->address))
               $sale->address= $request->address;

           if(isset($request->pvt_contact_info))
               $sale->pvt_contact_info = $request->pvt_contact_info;

           if(isset($request->pvt_address))
               $sale->pvt_address = $request->pvt_address;

           $sale->save();

           return redirect()->route('sale_show', [$sale->slug])->with('sale_edited', '1');
       }
    }

    public function destroy($slugId)
    {
        
        $sale = Sale::find($slugId);
        if($sale->owner->id== $this->user->id)
        {
            
            foreach($sale->products as $prod)
            {
                $product = Product::find($prod->id); 
        
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
        
            }
            $sale->delete();
        
            return redirect()->back();
        }
        
    }

  public function generatePdf($saleId)
  {

    $data['sale']=Sale::find($saleId);
    $data['user'] = $this->user;
    $user = $this->user;
    Mail::send('pdf.invoice', ['user' => $data['user'], 'sale' => $data['sale']], function ($m) use ($user) {
                $m->from('postmaster@salepa.com', 'Your Application');

                $m->to($user->email, $user->name)->subject('Your Reminder!');
            });



    $x= view('pdf.invoice', $data); 
    
    $x= (string)$x;

    $pdf = App::make('dompdf.wrapper');
    $pdf = PDF::loadHTML($x);
    return $pdf->download('salesinformation.pdf');
  }
}
