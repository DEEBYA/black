<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Favorite extends Model
{
    protected $guarded = [];
    public function favorite()
    {
    	$this->favorites()->create(['user_id' =>auth()->id()]);
    }
  public function favorited()
    {
        return $this->morphTo();
    }
}