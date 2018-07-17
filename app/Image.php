<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name','tag','path','ext'];

    /**
    * Get user for current image
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
