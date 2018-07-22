<?php
namespace App;
use Illuminate\Support\Facades\Redis;

class Visits
{
	protected $book;

	public function __construct($book)
	{
		$this->book = $book;
	}

	public function record()
	{
		 Redis::incr($this->cacheKey()) ?? 0;

        return $this;
	}

	public function reset()
	{
		 Redis::del($this->cacheKey());

       return $this;
	}

	public function count()
	{
		return Redis::get($this->cacheKey()) ?? 0;
	}

	 protected function cacheKey()
    {
        return "books.{$this->book->id}.visits";
    }
    
}