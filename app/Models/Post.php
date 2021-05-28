<?php

namespace App\Models;

use App\Events\PostCreated;
use App\Events\PostDeleted;
use App\Events\PostUpdated;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $dispatchesEvents = [
        'created' => PostCreated::class,
        'updated' => PostUpdated::class,
        'deleted' => PostDeleted::class,
    ];
}
