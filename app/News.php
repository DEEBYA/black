<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\News;
class News extends Model
{
     protected $guarded = [];

     protected $appends = ['favoritesCount','isFavorited'];

      public function hasUpdatesFor($user)
    {
        $key = $user->visitedThreadCacheKey($this);
        return $this->updated_at > cache($key);
    }

   public function favorites()
    {
        return $this->morphMany(NewsFavorite::class, 'favorited');
    }
    /**
     * Favorite the current reply.
     *
     * @return Model
     */
    public function favorite()
    {
        $attributes = ['user_id' => auth()->id()];
        if (! $this->favorites()->where($attributes)->exists()) {
            return $this->favorites()->create($attributes);
        }
    }
    /**
     * Unfavorite the current reply.
     */
    public function unfavorite()
    {
        $attributes = ['user_id' => auth()->id()];
        $this->favorites()->where($attributes)->delete();
    }
    /**
     * Determine if the current reply has been favorited.
     *
     * @return boolean
     */
    public function isFavorited()
    {
        return !! $this->favorites->where('user_id', auth()->id())->count();
    }
    /**
     * Fetch the favorited status as a property.
     *
     * @return bool
     */
    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }
    /**
     * Get the number of favorites for the reply.
     *
     * @return integer
     */
    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }

    //  public function path()
    // {
    //     return "/news/{$this->slug }";
    //     // return "/threads/{$this->channel->slug}/{$this->id}";
    // }

    //  public  function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    // /**
    //  * Set the proper slug attribute.
    //  *
    //  * @param string $value
    //  */
    // public function setSlugAttribute($value)
    // {
    //     if (static::whereSlug($slug = str_slug($value))->exists()) {
    //         $slug = "{$slug}-{$this->id}";
    //     }
    //     $this->attributes['slug'] = $slug;
    // }

    // public function incrementSlug($slug)
    // {
    // //Refrence  \Book::whereTitle('Help Me')->latest('id')->value('slug');

    //     $max = static::whereTitle($this->title)->latest('id')->value('slug');

    //     if(is_numeric($max[-1])){
    //         return preg_replace_callback('/(\d+)$/',function($matches){
    //             return $matches[1] + 1;
    //         },$max);
    //     }
    //     return "{$slug}-2";
    // }
}