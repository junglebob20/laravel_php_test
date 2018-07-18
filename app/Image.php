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
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopefilterById($query,$id)
    {
        return $query->where('id', 'like','%'.$id.'%');
    }
    public function scopefilterByName($query,$name)
    {
        return $query->where('name', 'like', '%'.$name.'%');
    }
    public function scopefilterByTag($query,$tag)
    {
        return $query->where('tag', 'like', '%'.$tag.'%');
    }
    public function scopefilterByPath($query,$path)
    {
        return $query->where('path', 'like', '%'.$path.'%');
    }
    public function scopefilterByExt($query,$ext)
    {
        return $query->where('ext', 'like', '%'.$ext.'%');
    }

    public function scopefilterByCreated_at($query,$created_at)
    {
        return $query->where('created_at', 'like', '%'.$created_at.'%');
    }

    public function scopefilterByUpdated_at($query,$updated_at)
    {
        return $query->where('updated_at', 'like', '%'.$updated_at.'%');
    }

    public function tag()
    {
        return $this->hasOne(Tag::class);
    }
    
}
