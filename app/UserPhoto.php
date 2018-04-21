<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class UsersPhoto extends Model
{
    protected $table = 'usersphoto';
    protected $fillable = ['path','name','thumbnail_path',];
    protected $file;


    public function owner()
        {
        	return $this->belongsTo('App\User');

        }
    public function baseDir()
    {
    	return 'images/user';
    }
     public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;

         $this->path = $this->baseDir().'/'.$name;

         $this->thumbnail_path =  $this->baseDir().'/tn-'.$name;

         
    }
}
