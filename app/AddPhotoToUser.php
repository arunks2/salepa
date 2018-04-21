<?php 
namespace App;

use symfony\Component\HttpFoundation\File\UploadedFile;


/**
* 
*/
class AddPhotoToUser
{
	protected $user;
	protected $file;

	public function __construct(User $user, uploadedFile $file, Thumbnail $thumbnail=null)
	{
		$this->user = $user;
		$this->file = $file;
		$this->thumbnail = $thumbnail ?: new Thumbnail;
		
	}

	public function save()
	{
		$userphoto = $this->user->addPhoto($this->makePhoto());

		$this->file->move($userphoto->baseDir(), $userphoto->name);
		
		$this->thumbnail->make($userphoto->path, $userphoto->thumbnail_path);

		
	}

	protected function makePhoto()
	{

		return new UserPhoto(['name' => $this->makeFileName()]);
	}

	protected function makeFileName()
	{
		$name = sha1(

    		time(). $this->file->getClientOriginalName()

    		);

    	$extension = $this->file->getClientOriginalExtension();

    	return "{$name}.{$extension}";
	}
}