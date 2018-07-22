<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Reply extends Model
{
    use Favoritable, RecordsActivity;
  protected $guarded = [];
    protected $with = ['owner', 'favorites'];
    protected $appends = ['favoritesCount', 'isFavorited'];
    public function owner()
    {
      return $this->belongsTo(User::class,'user_id');
    }
  public function book()
    {
        return $this->belongsTo(Book::class);
    }
    /**
     * Determine the path to the reply.
     *
     * @return string
     */
    public function path()
    {
        return $this->book->path() . "#reply-{$this->id}";
    }
  
}