<?php 
namespace App;

use symfony\Component\HttpFoundation\File\UploadedFile;


/**
* 
*/
class AddPhotoToProduct
{
	protected $product;
	protected $file;

	public function __construct(Product $product, uploadedFile $file, Thumbnail $thumbnail=null, Medium $medium=null, Full $full=null)
	{
		$this->product = $product;
		$this->file = $file;
		$this->thumbnail = $thumbnail ?: new Thumbnail;
		$this->medium = $medium ?:new Medium;
		$this->full = $full ?: new Full;
	}

	public function save()
	{
		$photo = $this->product->addPhoto($this->makePhoto());

		$this->file->move($photo->baseDir(), $photo->name);
		
		$this->thumbnail->make($photo->path, $photo->thumbnail_path);

		$this->medium->make($photo->path, $photo->medium_path);

		$this->full->make($photo->path, $photo->full_size_path);
	}

	protected function makePhoto()
	{

		return new Photo(['name' => $this->makeFileName()]);
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