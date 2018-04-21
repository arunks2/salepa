<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Http\Requests;
use Request;
use App\Sale;
use App\Product;
use App\SaleIpLog;
use Illuminate\Support\Facades\Auth;
class PublicViewController extends Controller
{
    

    public function show()
    {
    	$data['sales'] = Sale::all();
    	return view('guest.show',$data);
    }

    public function showSale($slug)
    {
       $sale=Sale::where('slug','=',$slug)->firstOrFail();
       $data['sale'] = $sale;
        if(Auth::User())
        {
            $saleiplog = SaleIpLog::getActiveUserIpInformation(Auth::User()->id, $sale->id, Request::ip());

            if($saleiplog)
            {
                $saleiplog->visited = $saleiplog->visited+1;
                $saleiplog->save();
            }
            else
            {
                $saleip = SaleIpLog::getIpInformation($sale->id, Request::ip());
                 
                if($saleip)
                {
                    $saleip->client_id= Auth::User()->id;
                    $saleip->visited =$saleip->visited+1;
                    $saleip->save();
                    
                }
                else
                {
                    $ipaddress = SaleIpLog::create(['client_id' => 
                       Auth::User()->id,'ip' => Request::ip(),
                        'sale_id'=>$sale->id, 'visited' => 1]);
                }
            }
        }
        else{
            $saleiplog = SaleIpLog::getIpInformation($sale->id, 
                Request::ip());
            if($saleiplog)
            {
                $saleiplog->visited = $saleiplog->visited+1;
                $saleiplog->save();
            }
            else
            {
                $ipaddress = SaleIpLog::create(['ip' => Request::ip(),'sale_id'=>$sale->id, 
                    'visited' => 1]);
            }
        }   
       return view('guest.showsale',$data);
        
    }

    public function showProduct($slug, $productId)
    {
    	$data['product'] = Product::find($productId);
    	return view('guest.showproduct',$data);
    }
}
