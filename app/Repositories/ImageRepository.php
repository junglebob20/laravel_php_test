<?php

namespace App\Repositories;

use App\User;
use App\Image;

class ImageRepository
{
  protected $image;

	public function __construct(Image $image)
	{
	    $this->images = $image;
	}
  /**
   * Получить все задачи заданного пользователя.
   *
   * @return Collection
   */
  public function getItems()
  {
    return $this->images->orderBy('created_at', 'asc')->get();
  }
  public function getItemsBy($column,$option)
  {
    return $this->images->orderBy($column,$option)->get();
  }
  public function getItemsFiltr($request,$column,$option)
  {
    return $this->images->filterById($request->input('id'))->filterByName($request->input('name'))->filterByTag($request->input('tag'))->filterByPath($request->input('path'))->filterByExt($request->input('ext'))->filterByCreated_at($request->input('created_at'))->filterByUpdated_at($request->input('updated_at'))->orderBy($column,$option)->get();
  }
}