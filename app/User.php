<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','email',
    ];

    protected $casts = [
        'confirmed' => 'boolean'
     ];

    public function getRouteKeyName()
    {
        return 'name';
    }
     /**
     * Mark the user's account as confirmed.
     */
    public function confirm()
    {
        $this->confirmed = true;
        $this->confirmation_token = null;
        $this->save();
    }

    public function books(){
        return $this->hasMany(Book ::class)->latest();
    }

     public function activity()
    {
      return $this->hasMany(Activity::class);
    }


      public function read($book)
    {
        cache()->forever(
            $this->visitedThreadCacheKey($book),
            Carbon::now()
        );
    }
    /**
     * Get the cache key for when a user reads a book.
     *
     * @param  Thread $book
     * @return string
     */
    public function visitedThreadCacheKey($book)
    {
        return sprintf("users.%s.visits.%s", $this->id, $book->id);
    }

    public function avatar() 
    {
        return asset($this->avatar_path ? : 'avatars/default.jpg');
    }
}
