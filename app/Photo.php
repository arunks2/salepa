<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class Photo extends Model
{
    protected $table = 'product_photos';
    protected $fillable = ['path','full_size_path','name','thumbnail_path','medium_path'];
    protected $file;


    public function product()
        {
        	return $this->belongsTo('App\Product');

        }
    public function baseDir()
    {
    	return 'images/photos';
    }
     public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;

         $this->path = $this->baseDir().'/'.$name;

         $this->thumbnail_path =  $this->baseDir().'/tn-'.$name;

         $this->medium_path  = $this->baseDir().'/tn-'.'med'.$name;

         $this->full_size_path = $this->baseDir().'/tn-full'.$name;
    }
}
