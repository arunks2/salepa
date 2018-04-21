<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
   public function __construct()
   	{
   	    $this->middleware('auth');

   	    parent::__construct();

   	}

   	public function edit(Request $request)
   	{
   		$this->user->about_text = $request['about_text'];
   		$this->user->currency_id = $request['currency_id'];
   		$this->user->save();

   		return redirect()->back();
   	}

    public function saleView($userId)
      {  
         $user = User::find($userId);
         $count=0;
         if($user->sales):
         foreach($user->sales as $sale)
         {
            if($sale->salelogs):
            foreach($sale->salelogs as $log)
            {
               $count = $log->visited+$count;
            }
            endif;
         }
         endif;
         $newvisits =  $count - $user->salevisits;
         $user->salevisits = $count;
         $user->save();
         return $newvisits;
        
      }

}
