<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table='conversations';
    protected $fillable= ['product_id','created_by'];

    public function messages(){
    	return $this->hasMany(Message::class);

    }

    public function owner()
    {
    	return $this->belongsTo(User::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
