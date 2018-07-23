<?php
namespace App;
use App\Filters\BookFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Book extends Model
{
    use RecordsActivity;

    protected $guarded = [];
    
    protected $with = ['creator','channel'];
    protected $appends = ['isSubscribedTo'];

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('replyCount', function($builder){
            $builder->withCount('replies');
        });
        static::deleting(function ($book){
            $book->replies->each->delete();
        });
    }

    public function path()
    {
        return "/books/{$this->channel->slug}/{$this->slug }";
        // return "/threads/{$this->channel->slug}/{$this->id}";
    }

    public function paths()
    {
        return "/books/{$this->channel->slug}/{$this->slug }/edit";
        // return "/threads/{$this->channel->slug}/{$this->id}";
    }

    public function replies()
    {
        return $this->hasMany(Reply::class)
            ->withCount('favorites');
                   
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function addReply($reply)
    {
        $reply = $this->replies()->create($reply);
        $this->subscriptions
            ->filter(function ($sub) use ($reply){
                return $sub->user_id != $reply->user_id;
            })
            ->each->notify($reply);         
                
        
        return $reply;
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
    
    public function scopeFilter($query, BookFilters $filters)
    {
        return $filters->apply($query);
    }
    // public function searchableAs()
    // {
    //     return 'books';
    // }
    public function subscribe($userId = null)
    {
        $this->subscriptions()->create([
            'user_id' => $userId ?: auth()->id()
        ]);
        return $this;
    }
     public function unsubscribe($userId = null)
      {
        $this->subscriptions()
            ->where('user_id', $userId ?: auth()->id())
            ->delete();
    }
    public function subscriptions()
    {
        return $this->hasMany(BookSubscription::class);     
    }
    public function getIsSubscribedToAttribute()
    {
        return $this->subscriptions()
            ->where('user_id', auth()->id())
            ->exists();    
    }
  public function hasUpdatesFor($user)
    {
        $key = $user->visitedThreadCacheKey($this);
        return $this->updated_at > cache($key);
    }

     public function visits()
    {
        return new Visits($this);
    }

    public  function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Set the proper slug attribute.
     *
     * @param string $value
     */
    public function setSlugAttribute($value)
    {
        if (static::whereSlug($slug = str_slug($value))->exists()) {
            $slug = "{$slug}-{$this->id}";
        }
        $this->attributes['slug'] = $slug;
    }

    public function incrementSlug($slug)
    {
    //Refrence  \Book::whereTitle('Help Me')->latest('id')->value('slug');

        $max = static::whereTitle($this->title)->latest('id')->value('slug');

        if(is_numeric($max[-1])){
            return preg_replace_callback('/(\d+)$/',function($matches){
                return $matches[1] + 1;
            },$max);
        }
        return "{$slug}-2";
    }
}