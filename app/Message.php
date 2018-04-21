<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
     protected $table = 'messages';
     protected $fillable = ['text','ip','messenger_id','conversation_id'];

     public function owner()
     {
     	return $this->belongsTo('App\User');
     }

     public function conversation()
     {
          return $this->belongsTo(Conversation::class);
     }
}
