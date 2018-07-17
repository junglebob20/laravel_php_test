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
}