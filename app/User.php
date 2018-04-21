<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'fb_id', 'user_source', 'currency_id','salevisits'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function publish(Sale $sale)
    {
        $this->sales()->save($sale);
        
      return $this->sales()->save($sale);
    }

     public function publishProduct(Product $product)
    {
        $this->products()->save($product);
        
      return $this->products()->save($product);
    }

     public function publishMessage(Message $message)
    {
        
      return $this->messages()->save($message);
    }
     
    public function publishConversation(Conversation $conversation)
    {
        return $this->conversations()->save($conversation);
    } 

    public function sales()
    {   
        return $this->hasMany(Sale::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function addPhoto(UserPhoto $photo)
    {
         return $this->userphotos()->save($photo);

    }

     public function userphotos()
    {
        return $this->belongsTo('App\Photo');
    }

    public function visits()
    {
      return  $this->belongsTo(Ipaddress::class);
    }
}
