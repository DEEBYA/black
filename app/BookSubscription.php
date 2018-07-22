<?php
namespace App;
use App\Notifications\BookWasUpdated;
use Illuminate\Database\Eloquent\Model;
class BookSubscription extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
     public function notify($reply)
    {
         $this->user->notify(new BookWasUpdated($this->book, $reply));
    }
}