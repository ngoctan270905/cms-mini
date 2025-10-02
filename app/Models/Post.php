<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','slug','content'];

    // Use slug for route model binding
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
