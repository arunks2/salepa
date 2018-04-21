<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Product;
use App\Photo;
use App\Message;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();

    }

    public function store(Request $request)
    {
    	$request['product_id']=1;
    	$sale= $this->user->publishComment( 
            new Message($request->all())
            );
        $sale->save();
        return redirect()->back();
    }
}
