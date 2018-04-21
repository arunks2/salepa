<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Requests;

use App\Conversation;

use App\Message;
class ConversationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();

    }

    public function store(Request $request)
    {
    	
    	if($request['conservation_id'])
    	{
    		$message = (new Message($request->all()
    	        ));
    	}
    	else
    	{	
			$this->validate($request, [
		                'product_id' => 'required',]);
    	    $request['created_by'] = $this->user->id;
    	    $conversation = ( 
    	     new Conversation($request->all())
    	      );
    	       $conversation->save();
    	       $request['conversation_id'] = $conversation->id;
    	       $request['messenger_id'] = $this->user->id;
    	       $message = (new Message($request->all()
    	        ));
    	       $message->save();

    	}
            return redirect()->back();
    }
}
